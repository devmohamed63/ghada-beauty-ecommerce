<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\RoutineService;

class HomeController extends Controller
{
    public function __construct(
        private ProductService $productService,
        private RoutineService $routineService
    ) {}

    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featuredProducts = $this->productService->getFeaturedProducts(8);
        $bestSellers = $this->productService->getBestSellers(8);
        $skinRoutines = $this->routineService->getAllRoutines();

        return view('front.home', compact('featuredProducts', 'bestSellers', 'skinRoutines'));
    }
}
