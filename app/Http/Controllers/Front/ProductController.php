<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    /**
     * Display products listing page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filters = [
            'category_id' => $request->input('category'),
            'skin_type' => $request->input('skin_type'),
            'search' => $request->input('search'),
            'sort_by' => $request->input('sort_by', 'created_at'),
            'sort_order' => $request->input('sort_order', 'desc'),
        ];

        $products = $this->productService->getProducts($filters, 12);
        $categories = Category::active()->get();

        return view('front.products.index', compact('products', 'categories', 'filters'));
    }

    /**
     * Display product details page.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show(string $slug)
    {
        $product = $this->productService->getProductBySlug($slug);

        if (!$product) {
            abort(404, 'المنتج غير موجود');
        }

        $relatedProducts = $this->productService->getRelatedProducts($product, 4);

        return view('front.products.show', compact('product', 'relatedProducts'));
    }
}
