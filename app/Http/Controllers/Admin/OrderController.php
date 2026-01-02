<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $filters = [
            'status' => $request->input('status', ''),
            'search' => $request->input('search', ''),
        ];
        
        $query = Order::with(['governorate', 'city']);

        // Filter by status
        if (!empty($filters['status']) && $filters['status'] !== '') {
            $query->where('status', $filters['status']);
        }

        // Search by customer name or phone (case-insensitive)
        if (!empty($filters['search']) && trim($filters['search']) !== '') {
            $search = trim($filters['search']);
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(customer_name) LIKE ?', ['%' . strtolower($search) . '%'])
                  ->orWhereRaw('LOWER(customer_phone) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        // Sort by date (newest first)
        $query->orderBy('created_at', 'desc');

        // Paginate with query string to preserve filters
        $orders = $query->paginate(20)->withQueryString();
        
        // Get all orders for export (without pagination)
        $allOrders = $query->get();
        
        // Get order counts by status
        $statusCounts = Order::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        
        $statusLabels = [
            'pending' => 'قيد الانتظار',
            'confirmed' => 'مؤكد',
            'shipped' => 'تم الشحن',
            'delivered' => 'تم التسليم',
            'cancelled' => 'ملغي',
        ];
        
        return view('admin.orders.index', compact('orders', 'filters', 'allOrders', 'statusCounts', 'statusLabels'));
    }

    public function export(Request $request)
    {
        $filters = [
            'status' => $request->input('status', ''),
            'search' => $request->input('search', ''),
        ];
        
        $query = Order::with(['governorate', 'city', 'items.product']);

        // Apply same filters as index
        if (!empty($filters['status']) && $filters['status'] !== '') {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search']) && trim($filters['search']) !== '') {
            $search = trim($filters['search']);
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(customer_name) LIKE ?', ['%' . strtolower($search) . '%'])
                  ->orWhereRaw('LOWER(customer_phone) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        $query->orderBy('created_at', 'desc');
        $orders = $query->get();
        
        $fileName = 'orders_' . date('Y-m-d_His') . '.xlsx';
        
        return Excel::download(new OrdersExport($orders), $fileName);
    }

    public function show(Order $order)
    {
        $order->load(['items.product', 'governorate', 'city']);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled'
        ]);
        
        $order->update(['status' => $request->input('status')]);
        
        // Redirect back to orders index with filters preserved
        $redirectUrl = route('admin.orders.index');
        if ($request->has('status_filter')) {
            $redirectUrl .= '?status=' . $request->input('status_filter');
        }
        if ($request->has('search_filter')) {
            $redirectUrl .= (strpos($redirectUrl, '?') !== false ? '&' : '?') . 'search=' . urlencode($request->input('search_filter'));
        }
        
        return redirect($redirectUrl)->with('success', 'تم تحديث حالة الطلب بنجاح');
    }
}
