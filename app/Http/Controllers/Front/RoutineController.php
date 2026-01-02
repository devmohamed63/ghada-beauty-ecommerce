<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\RoutineService;

class RoutineController extends Controller
{
    public function __construct(
        private RoutineService $routineService
    ) {}

    /**
     * Display skin routine page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $routines = $this->routineService->getAllRoutines();
        
        // Get all products for JavaScript
        $products = Product::where('is_active', true)
            ->get(['id', 'name', 'slug', 'description', 'price'])
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'description' => $product->description,
                    'price' => number_format($product->price, 0),
                    'image' => $product->getMainImageUrl('medium'),
                ];
            });

        return view('front.routine.index', [
            'skinRoutines' => $routines,
            'products' => $products
        ]);
    }
}
