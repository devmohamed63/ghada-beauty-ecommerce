<?php

namespace App\Exports;

use App\Models\Order;
use App\Services\ReportsService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SalesReportExport implements WithMultipleSheets
{
    public function __construct(
        private array $filters,
        private ReportsService $reportsService
    ) {}

    /**
     * @return array
     */
    public function sheets(): array
    {
        return [
            new SummarySheet($this->filters, $this->reportsService),
            new OrdersSheet($this->filters, $this->reportsService),
            new ProductsSheet($this->filters, $this->reportsService),
        ];
    }
}

class SummarySheet implements FromCollection, WithHeadings, WithStyles, WithTitle, WithColumnWidths, WithEvents
{
    public function __construct(
        private array $filters,
        private ReportsService $reportsService
    ) {}

    public function collection()
    {
        $summary = $this->reportsService->getSalesSummary($this->filters);
        
        $fromDate = $this->filters['from_date'] ?? 'الكل';
        $toDate = $this->filters['to_date'] ?? 'الكل';
        
        return collect([
            [
                'الفترة من' => $fromDate,
                'الفترة إلى' => $toDate,
                'إجمالي المبيعات' => $summary['total_sales'],
                'عدد الطلبات' => $summary['total_orders'],
                'متوسط قيمة الطلب' => $summary['average_order_value'],
                'عدد المنتجات المباعة' => $summary['total_products_sold'],
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'الفترة من',
            'الفترة إلى',
            'إجمالي المبيعات',
            'عدد الطلبات',
            'متوسط قيمة الطلب',
            'عدد المنتجات المباعة',
        ];
    }

    public function title(): string
    {
        return 'ملخص المبيعات';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Insert title row at the top
                $sheet->insertNewRowBefore(1, 1);
                $sheet->mergeCells('A1:F1');
                $sheet->setCellValue('A1', 'تقرير ملخص المبيعات - Ghada Beauty');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F2937']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(30);
                
                // Insert date info row
                $sheet->insertNewRowBefore(2, 1);
                $fromDate = $this->filters['from_date'] ?? 'الكل';
                $toDate = $this->filters['to_date'] ?? 'الكل';
                $sheet->mergeCells('A2:F2');
                $sheet->setCellValue('A2', "الفترة: من {$fromDate} إلى {$toDate}");
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['size' => 12, 'bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(2)->setRowHeight(25);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 18,
            'E' => 20,
            'F' => 22,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header row (row 3 after insertions)
        $sheet->getStyle('A3:F3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'EC4899'], // Pink
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
            ],
        ]);
        $sheet->getRowDimension(3)->setRowHeight(25);

        // Data row (row 4 after insertions)
        $dataRow = 4;
        $sheet->getStyle("A{$dataRow}:F{$dataRow}")->applyFromArray([
            'font' => [
                'size' => 11,
                'bold' => true,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'F3F4F6'], // Light gray
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'D1D5DB'],
                ],
            ],
        ]);

        // Format numbers
        $sheet->getStyle("C{$dataRow}")->getNumberFormat()->setFormatCode('#,##0.00 "جنيه"');
        $sheet->getStyle("E{$dataRow}")->getNumberFormat()->setFormatCode('#,##0.00 "جنيه"');

        // Footer row
        $lastRow = $sheet->getHighestRow() + 2;
        $sheet->mergeCells("A{$lastRow}:F{$lastRow}");
        $sheet->setCellValue("A{$lastRow}", 'تم إنشاء التقرير في: ' . date('Y-m-d H:i:s'));
        $sheet->getStyle("A{$lastRow}")->applyFromArray([
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
}

class OrdersSheet implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, WithColumnWidths, WithEvents
{
    public function __construct(
        private array $filters,
        private ReportsService $reportsService
    ) {}

    public function collection()
    {
        $orders = $this->reportsService->getSalesReport($this->filters, 10000);
        return $orders->getCollection();
    }

    public function headings(): array
    {
        return [
            'رقم الطلب',
            'اسم العميل',
            'رقم الهاتف',
            'المحافظة',
            'المدينة',
            'العنوان',
            'التاريخ',
            'المبلغ الإجمالي',
            'الحالة',
            'طريقة الدفع',
        ];
    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->customer_name,
            $order->customer_phone,
            $order->governorate?->name_ar ?? '-',
            $order->city?->name_ar ?? '-',
            $order->address,
            $order->created_at->format('Y-m-d H:i'),
            $order->total,
            $this->getStatusLabel($order->status),
            $this->getPaymentMethodLabel($order->payment_method),
        ];
    }

    public function title(): string
    {
        return 'تفاصيل الطلبات';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Insert title row at the top
                $sheet->insertNewRowBefore(1, 1);
                $sheet->mergeCells('A1:J1');
                $sheet->setCellValue('A1', 'تفاصيل الطلبات - Ghada Beauty');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F2937']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(30);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 12,
            'B' => 20,
            'C' => 15,
            'D' => 18,
            'E' => 18,
            'F' => 30,
            'G' => 18,
            'H' => 18,
            'I' => 15,
            'J' => 20,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header row (row 2 after title insertion)
        $sheet->getStyle('A2:J2')->applyFromArray([
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
        $sheet->getRowDimension(2)->setRowHeight(30);

        // Style data rows with alternating colors
        $lastRow = $sheet->getHighestRow();
        if ($lastRow > 2) {
            for ($row = 3; $row <= $lastRow; $row++) {
                $fillColor = ($row % 2 == 0) ? 'FFFFFF' : 'F9FAFB';
                
                $sheet->getStyle("A{$row}:J{$row}")->applyFromArray([
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

                // Format total column
                $sheet->getStyle("H{$row}")->getNumberFormat()->setFormatCode('#,##0.00 "جنيه"');
            }
        }

        // Footer with summary
        $summaryRow = $lastRow + 2;
        $sheet->mergeCells("A{$summaryRow}:G{$summaryRow}");
        $sheet->setCellValue("A{$summaryRow}", 'الإجمالي:');
        $sheet->getStyle("A{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
        ]);

        $sheet->setCellValue("H{$summaryRow}", "=SUM(H3:H{$lastRow})");
        $sheet->getStyle("H{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FEF3C7'],
            ],
            'numberFormat' => [
                'formatCode' => '#,##0.00 "جنيه"',
            ],
        ]);

        return $sheet;
    }

    private function getStatusLabel(string $status): string
    {
        return match ($status) {
            'pending' => 'قيد الانتظار',
            'confirmed' => 'مؤكد',
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
            default => $method,
        };
    }
}

class ProductsSheet implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, WithColumnWidths, WithEvents
{
    public function __construct(
        private array $filters,
        private ReportsService $reportsService
    ) {}

    public function collection()
    {
        return $this->reportsService->getProductsSoldData($this->filters);
    }

    public function headings(): array
    {
        return [
            'اسم المنتج',
            'الفئة',
            'الكمية المباعة',
            'متوسط السعر',
            'الإجمالي',
            'عدد الطلبات',
        ];
    }

    public function map($product): array
    {
        return [
            $product->product_name,
            $product->category_name ?? '-',
            $product->total_quantity,
            $product->average_price,
            $product->total_revenue,
            $product->orders_count,
        ];
    }

    public function title(): string
    {
        return 'المنتجات المباعة';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Insert title row at the top
                $sheet->insertNewRowBefore(1, 1);
                $sheet->mergeCells('A1:F1');
                $sheet->setCellValue('A1', 'المنتجات المباعة - Ghada Beauty');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 16, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '1F2937']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(30);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 20,
            'C' => 18,
            'D' => 18,
            'E' => 18,
            'F' => 15,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header row (row 2 after title insertion)
        $sheet->getStyle('A2:F2')->applyFromArray([
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
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_MEDIUM,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
            ],
        ]);
        $sheet->getRowDimension(2)->setRowHeight(30);

        // Style data rows with alternating colors
        $lastRow = $sheet->getHighestRow();
        if ($lastRow > 2) {
            for ($row = 3; $row <= $lastRow; $row++) {
                $fillColor = ($row % 2 == 0) ? 'FFFFFF' : 'F9FAFB';
                
                $sheet->getStyle("A{$row}:F{$row}")->applyFromArray([
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

                // Format price columns
                $sheet->getStyle("D{$row}")->getNumberFormat()->setFormatCode('#,##0.00 "جنيه"');
                $sheet->getStyle("E{$row}")->getNumberFormat()->setFormatCode('#,##0.00 "جنيه"');
            }
        }

        // Footer with totals
        $summaryRow = $lastRow + 2;
        $sheet->mergeCells("A{$summaryRow}:C{$summaryRow}");
        $sheet->setCellValue("A{$summaryRow}", 'الإجمالي:');
        $sheet->getStyle("A{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_RIGHT],
        ]);

        $sheet->setCellValue("C{$summaryRow}", "=SUM(C3:C{$lastRow})");
        $sheet->setCellValue("E{$summaryRow}", "=SUM(E3:E{$lastRow})");
        
        $sheet->getStyle("C{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FEF3C7'],
            ],
        ]);
        
        $sheet->getStyle("E{$summaryRow}")->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FEF3C7'],
            ],
            'numberFormat' => [
                'formatCode' => '#,##0.00 "جنيه"',
            ],
        ]);

        return $sheet;
    }
}
