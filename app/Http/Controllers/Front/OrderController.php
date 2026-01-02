<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Product;
use App\Services\CartService;
use App\Services\LocationService;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private CartService $cartService,
        private LocationService $locationService,
        private ProductService $productService
    ) {}

    /**
     * Display checkout page.
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request)
    {
        if ($this->cartService->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'السلة فارغة. من فضلك أضيفي منتجات للسلة أولاً');
        }

        $cartSummary = $this->cartService->getSummary();
        $governorates = $this->locationService->getAllGovernorates();

        return view('front.checkout', compact('cartSummary', 'governorates'));
    }

    /**
     * Store new order.
     *
     * @param CreateOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateOrderRequest $request)
    {
        try {
            $order = $this->orderService->createOrderFromCart($request->validated());

            return redirect()->route('order.success', $order->id)
                ->with('success', 'تم إنشاء الطلب بنجاح');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Display order success page.
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
    public function success(int $orderId)
    {
        $order = $this->orderService->getOrderById($orderId);

        if (!$order) {
            abort(404, 'الطلب غير موجود');
        }

        return view('front.order-success', compact('order'));
    }
}
