<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        private CartService $cartService,
        private ProductService $productService
    ) {}

    /**
     * Display cart page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cartSummary = $this->cartService->getSummary();

        return view('front.cart.index', compact('cartSummary'));
    }

    /**
     * Add product to cart.
     *
     * @param Request $request
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request, int $productId)
    {
        $product = $this->productService->getProductById($productId);

        if (!$product || !$product->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'المنتج غير متوفر'
            ], 404);
        }

        $quantity = $request->input('quantity', 1);

        if (!$this->productService->isAvailable($product, $quantity)) {
            return response()->json([
                'success' => false,
                'message' => 'الكمية المطلوبة غير متوفرة في المخزون'
            ], 400);
        }

        $cartItem = $this->cartService->addProduct($product, $quantity);

        return response()->json([
            'success' => true,
            'message' => 'تم إضافة المنتج إلى السلة بنجاح',
            'cart' => $this->cartService->getSummary(),
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'image' => $product->getMainImageUrl('thumb'),
            ]
        ]);
    }

    /**
     * Update cart item quantity.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $success = $this->cartService->updateQuantity($productId, $quantity);

        if (!$success) {
            return response()->json([
                'success' => false,
                'message' => 'فشل في تحديث السلة'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث السلة',
            'cart' => $this->cartService->getSummary()
        ]);
    }

    /**
     * Remove product from cart.
     *
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove(int $productId)
    {
        $success = $this->cartService->removeProduct($productId);

        if (!$success) {
            return response()->json([
                'success' => false,
                'message' => 'فشل في حذف المنتج'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'تم حذف المنتج من السلة',
            'cart' => $this->cartService->getSummary()
        ]);
    }

    /**
     * Clear cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function clear()
    {
        $this->cartService->clear();

        return response()->json([
            'success' => true,
            'message' => 'تم تفريغ السلة'
        ]);
    }

    /**
     * Get cart summary (for AJAX).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function summary()
    {
        return response()->json([
            'success' => true,
            'cart' => $this->cartService->getSummary()
        ]);
    }
}
