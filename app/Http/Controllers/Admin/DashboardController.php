<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Services\ProductService;

class DashboardController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private ProductService $productService
    ) {}

    public function index()
    {
        $statistics = $this->orderService->getStatistics();
        $bestSellers = $this->productService->getBestSellers(5);

        return view('admin.dashboard', compact('statistics', 'bestSellers'));
    }
}
