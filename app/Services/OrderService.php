<?php

namespace App\Services;

use App\Mail\NewOrderNotification;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderService
{
    public function __construct(
        private CartService $cartService,
        private ProductService $productService
    ) {}

    /**
     * Create order from cart.
     *
     * @param array $data
     * @return Order
     * @throws \Exception
     */
    public function createOrderFromCart(array $data): Order
    {
        $cartItems = $this->cartService->getItems();

        if (empty($cartItems)) {
            throw new \Exception('السلة فارغة');
        }

        return DB::transaction(function () use ($data, $cartItems) {
            // Create order
            $order = Order::create([
                'customer_name' => $data['customer_name'],
                'customer_phone' => $data['customer_phone'],
                'governorate_id' => $data['governorate_id'],
                'city_id' => $data['city_id'],
                'address' => $data['address'],
                'notes' => $data['notes'] ?? null,
                'total' => $this->cartService->getTotal(),
                'status' => 'pending',
                'payment_method' => $data['payment_method'] ?? 'cod',
                'payment_status' => 'pending',
            ]);

            // Create order items
            foreach ($cartItems as $item) {
                $product = Product::find($item['id']);

                if (!$product) {
                    throw new \Exception("المنتج {$item['name']} غير موجود");
                }

                // Check stock availability
                if (!$this->productService->isAvailable($product, $item['quantity'])) {
                    throw new \Exception("المنتج {$item['name']} غير متوفر بالكمية المطلوبة");
                }

                // Create order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'subtotal' => $product->price * $item['quantity'],
                ]);

                // Decrease stock
                $this->productService->decreaseStock($product, $item['quantity']);
            }

            // Send email notification to admin
            try {
                Mail::to(config('mail.admin_email', 'admin@ghadabeauty.test'))
                    ->send(new NewOrderNotification($order));
            } catch (\Exception $e) {
                // Log error but don't fail the order
                logger()->error('Failed to send order notification email: ' . $e->getMessage());
            }

            // Clear cart
            $this->cartService->clear();

            return $order;
        });
    }

    /**
     * Get order by ID with relationships.
     *
     * @param int $id
     * @return Order|null
     */
    public function getOrderById(int $id): ?Order
    {
        return Order::with(['items.product', 'governorate', 'city'])
            ->find($id);
    }

    /**
     * Update order status.
     *
     * @param Order $order
     * @param string $status
     * @return bool
     */
    public function updateStatus(Order $order, string $status): bool
    {
        return $order->update(['status' => $status]);
    }

    /**
     * Get orders with pagination and filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getOrders(array $filters = [], int $perPage = 20)
    {
        $query = Order::with(['governorate', 'city']);

        // Filter by status
        if (isset($filters['status']) && $filters['status'] !== '' && $filters['status'] !== null) {
            $query->where('status', $filters['status']);
        }

        // Search by customer name or phone
        if (isset($filters['search']) && $filters['search'] !== '' && $filters['search'] !== null) {
            $search = trim($filters['search']);
            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('customer_name', 'like', "%{$search}%")
                      ->orWhere('customer_phone', 'like', "%{$search}%");
                });
            }
        }

        // Sort by date
        $query->orderBy('created_at', 'desc');

        // Paginate with query string to preserve filters
        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Get order statistics for dashboard.
     *
     * @return array
     */
    public function getStatistics(): array
    {
        return [
            'total_orders' => Order::count(),
            'pending_orders' => Order::pending()->count(),
            'confirmed_orders' => Order::confirmed()->count(),
            'total_revenue' => Order::where('status', '!=', 'cancelled')->sum('total'),
            'today_orders' => Order::whereDate('created_at', today())->count(),
            'today_revenue' => Order::whereDate('created_at', today())
                ->where('status', '!=', 'cancelled')
                ->sum('total'),
        ];
    }

    /**
     * Cancel order and restore stock.
     *
     * @param Order $order
     * @return bool
     */
    public function cancelOrder(Order $order): bool
    {
        return DB::transaction(function () use ($order) {
            // Restore stock for each item
            foreach ($order->items as $item) {
                $this->productService->increaseStock($item->product, $item->quantity);
            }

            // Update order status
            return $order->update(['status' => 'cancelled']);
        });
    }
}

