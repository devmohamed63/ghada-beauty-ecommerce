<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class OrdersExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, WithColumnWidths, WithCustomStartCell, WithEvents
{
    protected $orders;
    protected $dataStartRow = 4; // Data starts at row 4 (after title, info, and headers)

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        // Ensure we return a collection
        if ($this->orders instanceof \Illuminate\Support\Collection) {
            return $this->orders;
        }
        
        // If it's not a collection, convert it
        return collect($this->orders);
    }

    public function headings(): array
    {
        return [
            'رقم الطلب',
            'اسم العميل',
            'رقم الهاتف',
            'المحافظة',
            'المدينة',
            'العنوان الكامل',
            'ملاحظات',
            'تاريخ الطلب',
            'المبلغ الإجمالي',
            'الحالة',
            'طريقة الدفع',
            'حالة الدفع',
            'عدد المنتجات',
            'تفاصيل المنتجات',
        ];
    }

    public function map($order): array
    {
        // Ensure items are loaded
        if (!$order->relationLoaded('items')) {
            $order->load('items.product');
        }
        
        $itemsDetails = $order->items && $order->items->count() > 0 
            ? $order->items->map(function ($item) {
                $productName = $item->product ? $item->product->name : 'منتج محذوف';
                return "{$productName} (الكمية: {$item->quantity} × {$item->price} جنيه = {$item->subtotal} جنيه)";
            })->implode(' | ')
            : 'لا توجد منتجات';

        return [
            $order->id,
            $order->customer_name ?? '-',
            $order->customer_phone ?? '-',
            $order->governorate?->name_ar ?? '-',
            $order->city?->name_ar ?? '-',
            $order->address ?? '-',
            $order->notes ?? '-',
            $order->created_at ? $order->created_at->format('Y-m-d H:i:s') : '-',
            $order->total ?? 0,
            $this->getStatusLabel($order->status ?? 'pending'),
            $this->getPaymentMethodLabel($order->payment_method ?? 'cod'),
            $this->getPaymentStatusLabel($order->payment_status ?? 'pending'),
            $order->items ? $order->items->sum('quantity') : 0,
            $itemsDetails,
        ];
    }

    public function title(): string
    {
        return 'الطلبات';
    }

    public function startCell(): string
    {
        return 'A4';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Move headers from row 4 to row 3
                $headers = $this->headings();
                foreach ($headers as $index => $header) {
                    $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($index + 1);
                    $sheet->setCellValue($column . '3', $header);
                }
                
                // Clear row 4 (where headers were auto-placed)
                for ($col = 1; $col <= 14; $col++) {
                    $column = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);
                    $cellValue = $sheet->getCell($column . '4')->getValue();
                    if ($cellValue && in_array($cellValue, $headers)) {
                        $sheet->setCellValue($column . '4', '');
                    }
                }
                
                // Insert title row at the top
                $sheet->insertNewRowBefore(1, 1);
                $sheet->mergeCells('A1:N1');
                $sheet->setCellValue('A1', 'تقرير الطلبات - Ghada Beauty');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F2937']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(35);
                
                // Insert info row
                $sheet->insertNewRowBefore(2, 1);
                $sheet->mergeCells('A2:N2');
                $sheet->setCellValue('A2', 'تقرير شامل لجميع الطلبات مع تفاصيل العملاء والمنتجات');
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['size' => 12, 'bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(2)->setRowHeight(25);
                
                // Auto-size columns based on content
                $columns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N'];
                $dataRowCount = $this->orders->count();
                $lastDataRow = $dataRowCount > 0 ? ($this->dataStartRow + $dataRowCount - 1) : $this->dataStartRow;
                
                foreach ($columns as $column) {
                    $maxLength = 0;
                    
                    // Check header row (row 3)
                    $headerValue = $sheet->getCell($column . '3')->getValue();
                    if ($headerValue) {
                        $maxLength = max($maxLength, mb_strlen($headerValue, 'UTF-8'));
                    }
                    
                    // Check data rows (starting from row 4)
                    if ($dataRowCount > 0) {
                        for ($row = $this->dataStartRow; $row <= $lastDataRow; $row++) {
                            $cellValue = $sheet->getCell($column . $row)->getValue();
                            if ($cellValue) {
                                $cellLength = mb_strlen((string)$cellValue, 'UTF-8');
                                $maxLength = max($maxLength, $cellLength);
                            }
                        }
                    }
                    
                    // Set column width (add some padding, min 10, max 80)
                    $width = min(max($maxLength + 3, 10), 80);
                    $sheet->getColumnDimension($column)->setWidth($width);
                }
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 12,  // رقم الطلب
            'B' => 20,  // اسم العميل
            'C' => 15,  // رقم الهاتف
            'D' => 18,  // المحافظة
            'E' => 18,  // المدينة
            'F' => 35,  // العنوان
            'G' => 30,  // الملاحظات
            'H' => 20,  // التاريخ
            'I' => 18,  // المبلغ
            'J' => 15,  // الحالة
            'K' => 20,  // طريقة الدفع
            'L' => 15,  // حالة الدفع
            'M' => 15,  // عدد المنتجات
            'N' => 60,  // تفاصيل المنتجات
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header row (row 3 after title and info insertions)
        $sheet->getStyle('A3:N3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 11,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'EC4899'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
            ],
        ]);
        $sheet->getRowDimension(3)->setRowHeight(35);

        // Calculate last row based on actual data
        // Data starts at row 4, so last row = dataStartRow + count - 1
        $dataRowCount = $this->orders->count();
        $lastDataRow = $dataRowCount > 0 ? ($this->dataStartRow + $dataRowCount - 1) : $this->dataStartRow;
        
        // Style data rows with alternating colors (starting from row 4)
        if ($dataRowCount > 0) {
            for ($row = $this->dataStartRow; $row <= $lastDataRow; $row++) {
                $fillColor = ($row % 2 == 0) ? 'FFFFFF' : 'F9FAFB';
                
                $sheet->getStyle("A{$row}:N{$row}")->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => $fillColor],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                        'wrapText' => true,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'E5E7EB'],
                        ],
                    ],
                ]);

                // Left align for text columns
                $sheet->getStyle("B{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle("F{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle("G{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                $sheet->getStyle("N{$row}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

                // Format total column
                $sheet->getStyle("I{$row}")->getNumberFormat()->setFormatCode('#,##0.00 "جنيه"');
            }
        }

        // Summary row
        $summaryRow = $lastDataRow + 2;
        $sheet->mergeCells("A{$summaryRow}:H{$summaryRow}");
        $sheet->setCellValue("A{$summaryRow}", 'الإجمالي:');
        $sheet->getStyle("A{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
        ]);

        // Calculate total from orders collection
        $totalAmount = $this->orders->sum('total');
        $sheet->setCellValue("I{$summaryRow}", $totalAmount);
        $sheet->getStyle("I{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FEF3C7'],
            ],
            'numberFormat' => [
                'formatCode' => '#,##0.00 "جنيه"',
            ],
        ]);

        // Count row
        $countRow = $summaryRow + 1;
        $sheet->mergeCells("A{$countRow}:H{$countRow}");
        $sheet->setCellValue("A{$countRow}", 'عدد الطلبات:');
        $sheet->getStyle("A{$countRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
        ]);

        // Calculate count from orders collection
        $ordersCount = $this->orders->count();
        $sheet->setCellValue("I{$countRow}", $ordersCount);
        $sheet->getStyle("I{$countRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'DBEAFE'],
            ],
        ]);

        // Footer row
        $footerRow = $countRow + 2;
        $sheet->mergeCells("A{$footerRow}:N{$footerRow}");
        $sheet->setCellValue("A{$footerRow}", 'تم إنشاء التقرير في: ' . date('Y-m-d H:i:s'));
        $sheet->getStyle("A{$footerRow}")->applyFromArray([
            'font' => [
                'size' => 10,
                'italic' => true,
                'color' => ['rgb' => '6B7280'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ]);

        return $sheet;
    }

    private function getStatusLabel(string $status): string
    {
        return match ($status) {
            'pending' => 'قيد الانتظار',
            'confirmed' => 'مؤكد',
            'shipped' => 'تم الشحن',
            'delivered' => 'تم التسليم',
            'completed' => 'مكتمل',
            'cancelled' => 'ملغي',
            default => $status,
        };
    }

    private function getPaymentMethodLabel(string $method): string
    {
        return match ($method) {
            'cod' => 'الدفع عند الاستلام',
            'bank_transfer' => 'تحويل بنكي',
            'credit_card' => 'بطاقة ائتمانية',
            default => $method,
        };
    }

    private function getPaymentStatusLabel(string $status): string
    {
        return match ($status) {
            'pending' => 'قيد الانتظار',
            'paid' => 'مدفوع',
            'failed' => 'فشل',
            'refunded' => 'مسترد',
            default => $status,
        };
    }
}
