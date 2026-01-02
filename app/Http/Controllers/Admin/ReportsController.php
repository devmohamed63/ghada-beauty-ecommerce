<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SalesReportExport;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Services\ReportsService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function __construct(
        private ReportsService $reportsService
    ) {}

    /**
     * Display the reports page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filters = $request->only(['from_date', 'to_date', 'status', 'payment_method', 'governorate_id', 'city_id']);
        
        // Get sales report
        $orders = $this->reportsService->getSalesReport($filters, 15);
        
        // Get summary statistics
        $summary = $this->reportsService->getSalesSummary($filters);
        
        // Get governorates for filter
        $governorates = Governorate::orderBy('name_ar')->get();
        
        // Get cities if governorate is selected
        $cities = collect();
        if (isset($filters['governorate_id']) && $filters['governorate_id']) {
            $cities = \App\Models\City::where('governorate_id', $filters['governorate_id'])
                ->orderBy('name_ar')
                ->get();
        }

        return view('admin.reports.index', compact('orders', 'summary', 'governorates', 'cities', 'filters'));
    }

    /**
     * Export sales report to Excel.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        $filters = $request->only(['from_date', 'to_date', 'status', 'payment_method', 'governorate_id', 'city_id']);
        
        $fileName = 'sales_report_' . date('Y-m-d_His') . '.xlsx';
        
        return Excel::download(new SalesReportExport($filters, $this->reportsService), $fileName);
    }

    /**
     * Get chart data as JSON.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChartData(Request $request)
    {
        $filters = $request->only(['from_date', 'to_date', 'status', 'payment_method', 'governorate_id', 'city_id']);
        $period = $request->get('period', 'daily');
        $chartType = $request->get('chart_type', 'sales');

        switch ($chartType) {
            case 'daily':
            case 'weekly':
            case 'monthly':
                $data = $this->reportsService->getChartData($filters, $chartType);
                break;
            case 'status':
                $data = $this->reportsService->getSalesByStatus($filters);
                break;
            case 'governorate':
                $data = $this->reportsService->getSalesByGovernorate($filters);
                break;
            default:
                $data = $this->reportsService->getChartData($filters, 'daily');
        }

        return response()->json($data);
    }
}
