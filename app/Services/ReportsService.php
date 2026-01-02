<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportsService
{
    /**
     * Get sales report with filters.
     *
     * @param array $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSalesReport(array $filters = [], int $perPage = 20)
    {
        $query = Order::with(['governorate', 'city', 'items.product']);

        // Filter by date range
        if (isset($filters['from_date']) && $filters['from_date']) {
            $query->whereDate('created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $query->whereDate('created_at', '<=', $filters['to_date']);
        }

        // Filter by status
        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $query->where('status', $filters['status']);
        }

        // Filter by payment method
        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $query->where('payment_method', $filters['payment_method']);
        }

        // Filter by governorate
        if (isset($filters['governorate_id']) && $filters['governorate_id'] !== '' && $filters['governorate_id'] !== null) {
            $query->where('governorate_id', $filters['governorate_id']);
        }

        // Filter by city
        if (isset($filters['city_id']) && $filters['city_id'] !== '' && $filters['city_id'] !== null) {
            $query->where('city_id', $filters['city_id']);
        }

        // Sort by date
        $query->orderBy('created_at', 'desc');

        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Get sales summary statistics.
     *
     * @param array $filters
     * @return array
     */
    public function getSalesSummary(array $filters = []): array
    {
        $query = Order::query();

        // Apply same filters as getSalesReport
        if (isset($filters['from_date']) && $filters['from_date']) {
            $query->whereDate('created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $query->whereDate('created_at', '<=', $filters['to_date']);
        }

        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $query->where('payment_method', $filters['payment_method']);
        }

        if (isset($filters['governorate_id']) && $filters['governorate_id'] !== '' && $filters['governorate_id'] !== null) {
            $query->where('governorate_id', $filters['governorate_id']);
        }

        if (isset($filters['city_id']) && $filters['city_id'] !== '' && $filters['city_id'] !== null) {
            $query->where('city_id', $filters['city_id']);
        }

        // Calculate statistics
        $totalSales = $query->where('status', '!=', 'cancelled')->sum('total');
        $totalOrders = $query->count();
        $averageOrderValue = $totalOrders > 0 ? $totalSales / $totalOrders : 0;

        // Count products sold
        $productsSoldQuery = OrderItem::query()
            ->join('orders', 'order_items.order_id', '=', 'orders.id');

        // Apply same filters
        if (isset($filters['from_date']) && $filters['from_date']) {
            $productsSoldQuery->whereDate('orders.created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $productsSoldQuery->whereDate('orders.created_at', '<=', $filters['to_date']);
        }

        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $productsSoldQuery->where('orders.status', $filters['status']);
        }

        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $productsSoldQuery->where('orders.payment_method', $filters['payment_method']);
        }

        if (isset($filters['governorate_id']) && $filters['governorate_id'] !== '' && $filters['governorate_id'] !== null) {
            $productsSoldQuery->where('orders.governorate_id', $filters['governorate_id']);
        }

        if (isset($filters['city_id']) && $filters['city_id'] !== '' && $filters['city_id'] !== null) {
            $productsSoldQuery->where('orders.city_id', $filters['city_id']);
        }

        $productsSoldQuery->where('orders.status', '!=', 'cancelled');
        $totalProductsSold = $productsSoldQuery->sum('order_items.quantity');

        return [
            'total_sales' => $totalSales,
            'total_orders' => $totalOrders,
            'average_order_value' => $averageOrderValue,
            'total_products_sold' => $totalProductsSold,
        ];
    }

    /**
     * Get chart data for different periods.
     *
     * @param array $filters
     * @param string $period (daily, weekly, monthly)
     * @return array
     */
    public function getChartData(array $filters = [], string $period = 'daily'): array
    {
        $query = Order::where('status', '!=', 'cancelled');

        // Apply filters
        if (isset($filters['from_date']) && $filters['from_date']) {
            $query->whereDate('created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $query->whereDate('created_at', '<=', $filters['to_date']);
        }

        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $query->where('payment_method', $filters['payment_method']);
        }

        if (isset($filters['governorate_id']) && $filters['governorate_id'] !== '' && $filters['governorate_id'] !== null) {
            $query->where('governorate_id', $filters['governorate_id']);
        }

        if (isset($filters['city_id']) && $filters['city_id'] !== '' && $filters['city_id'] !== null) {
            $query->where('city_id', $filters['city_id']);
        }

        switch ($period) {
            case 'daily':
                return $this->getDailyChartData($query);
            case 'weekly':
                return $this->getWeeklyChartData($query);
            case 'monthly':
                return $this->getMonthlyChartData($query);
            default:
                return $this->getDailyChartData($query);
        }
    }

    /**
     * Get daily chart data (last 30 days).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return array
     */
    private function getDailyChartData($query): array
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(29);

        $data = $query->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total_sales'),
            DB::raw('COUNT(*) as orders_count')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = [];
        $sales = [];
        $orders = [];

        // Fill all dates in range
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $dateStr = $currentDate->format('Y-m-d');
            $labels[] = $currentDate->format('d/m');
            
            $dayData = $data->firstWhere('date', $dateStr);
            $sales[] = $dayData ? (float) $dayData->total_sales : 0;
            $orders[] = $dayData ? (int) $dayData->orders_count : 0;
            
            $currentDate->addDay();
        }

        return [
            'labels' => $labels,
            'sales' => $sales,
            'orders' => $orders,
        ];
    }

    /**
     * Get weekly chart data (last 12 weeks).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return array
     */
    private function getWeeklyChartData($query): array
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subWeeks(11)->startOfWeek();

        // Get all orders in the date range
        $orders = $query->whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy(function ($order) {
                return $order->created_at->startOfWeek()->format('Y-W');
            });

        $labels = [];
        $sales = [];
        $ordersCount = [];

        $currentWeek = $startDate->copy();
        while ($currentWeek <= $endDate) {
            $weekKey = $currentWeek->format('Y-W');
            $weekStart = $currentWeek->copy()->startOfWeek();
            $weekEnd = $currentWeek->copy()->endOfWeek();
            
            $labels[] = 'أسبوع ' . $currentWeek->format('W');
            
            $weekOrders = $orders->get($weekKey, collect());
            $weekSales = $weekOrders->sum('total');
            $weekOrdersCount = $weekOrders->count();
            
            $sales[] = (float) $weekSales;
            $ordersCount[] = (int) $weekOrdersCount;
            
            $currentWeek->addWeek();
        }

        return [
            'labels' => $labels,
            'sales' => $sales,
            'orders' => $ordersCount,
        ];
    }

    /**
     * Get monthly chart data (last 12 months).
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return array
     */
    private function getMonthlyChartData($query): array
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(11)->startOfMonth();

        $data = $query->select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total) as total_sales'),
            DB::raw('COUNT(*) as orders_count')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $labels = [];
        $sales = [];
        $orders = [];

        $currentMonth = $startDate->copy();
        while ($currentMonth <= $endDate) {
            $year = $currentMonth->year;
            $month = $currentMonth->month;
            
            $labels[] = $currentMonth->format('M Y');
            
            $monthData = $data->first(function ($item) use ($year, $month) {
                return $item->year == $year && $item->month == $month;
            });
            
            $sales[] = $monthData ? (float) $monthData->total_sales : 0;
            $orders[] = $monthData ? (int) $monthData->orders_count : 0;
            
            $currentMonth->addMonth();
        }

        return [
            'labels' => $labels,
            'sales' => $sales,
            'orders' => $orders,
        ];
    }

    /**
     * Get sales by status distribution.
     *
     * @param array $filters
     * @return array
     */
    public function getSalesByStatus(array $filters = []): array
    {
        $query = Order::query();

        // Apply filters
        if (isset($filters['from_date']) && $filters['from_date']) {
            $query->whereDate('created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $query->whereDate('created_at', '<=', $filters['to_date']);
        }

        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $query->where('payment_method', $filters['payment_method']);
        }

        if (isset($filters['governorate_id']) && $filters['governorate_id'] !== '' && $filters['governorate_id'] !== null) {
            $query->where('governorate_id', $filters['governorate_id']);
        }

        if (isset($filters['city_id']) && $filters['city_id'] !== '' && $filters['city_id'] !== null) {
            $query->where('city_id', $filters['city_id']);
        }

        $data = $query->select(
            'status',
            DB::raw('SUM(total) as total_sales'),
            DB::raw('COUNT(*) as orders_count')
        )
            ->groupBy('status')
            ->get();

        $labels = [];
        $sales = [];
        $orders = [];

        $statusLabels = [
            'pending' => 'قيد الانتظار',
            'confirmed' => 'مؤكد',
            'completed' => 'مكتمل',
            'cancelled' => 'ملغي',
        ];

        foreach ($data as $item) {
            $labels[] = $statusLabels[$item->status] ?? $item->status;
            $sales[] = (float) $item->total_sales;
            $orders[] = (int) $item->orders_count;
        }

        return [
            'labels' => $labels,
            'sales' => $sales,
            'orders' => $orders,
        ];
    }

    /**
     * Get sales by governorate distribution.
     *
     * @param array $filters
     * @return array
     */
    public function getSalesByGovernorate(array $filters = []): array
    {
        $query = Order::query()
            ->join('governorates', 'orders.governorate_id', '=', 'governorates.id');

        // Apply filters
        if (isset($filters['from_date']) && $filters['from_date']) {
            $query->whereDate('orders.created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $query->whereDate('orders.created_at', '<=', $filters['to_date']);
        }

        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $query->where('orders.status', $filters['status']);
        }

        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $query->where('orders.payment_method', $filters['payment_method']);
        }

        $query->where('orders.status', '!=', 'cancelled');

        $data = $query->select(
            'governorates.name_ar',
            DB::raw('SUM(orders.total) as total_sales'),
            DB::raw('COUNT(*) as orders_count')
        )
            ->groupBy('governorates.id', 'governorates.name_ar')
            ->orderByDesc('total_sales')
            ->limit(10)
            ->get();

        $labels = [];
        $sales = [];
        $orders = [];

        foreach ($data as $item) {
            $labels[] = $item->name_ar;
            $sales[] = (float) $item->total_sales;
            $orders[] = (int) $item->orders_count;
        }

        return [
            'labels' => $labels,
            'sales' => $sales,
            'orders' => $orders,
        ];
    }

    /**
     * Get products sold data for export.
     *
     * @param array $filters
     * @return \Illuminate\Support\Collection
     */
    public function getProductsSoldData(array $filters = [])
    {
        $query = OrderItem::query()
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id');

        // Apply filters
        if (isset($filters['from_date']) && $filters['from_date']) {
            $query->whereDate('orders.created_at', '>=', $filters['from_date']);
        }

        if (isset($filters['to_date']) && $filters['to_date']) {
            $query->whereDate('orders.created_at', '<=', $filters['to_date']);
        }

        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $query->where('orders.status', $filters['status']);
        }

        if (isset($filters['payment_method']) && $filters['payment_method'] !== '' && $filters['payment_method'] !== null) {
            $query->where('orders.payment_method', $filters['payment_method']);
        }

        if (isset($filters['governorate_id']) && $filters['governorate_id'] !== '' && $filters['governorate_id'] !== null) {
            $query->where('orders.governorate_id', $filters['governorate_id']);
        }

        if (isset($filters['city_id']) && $filters['city_id'] !== '' && $filters['city_id'] !== null) {
            $query->where('orders.city_id', $filters['city_id']);
        }

        $query->where('orders.status', '!=', 'cancelled');

        return $query->select(
            'products.name as product_name',
            'categories.name as category_name',
            DB::raw('SUM(order_items.quantity) as total_quantity'),
            DB::raw('AVG(order_items.price) as average_price'),
            DB::raw('SUM(order_items.subtotal) as total_revenue'),
            DB::raw('COUNT(DISTINCT orders.id) as orders_count')
        )
            ->groupBy('products.id', 'products.name', 'categories.name')
            ->orderByDesc('total_quantity')
            ->get();
    }
}
