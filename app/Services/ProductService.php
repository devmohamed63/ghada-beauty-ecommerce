<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * Get featured products.
     *
     * @param int $limit
     * @return Collection
     */
    public function getFeaturedProducts(int $limit = 8): Collection
    {
        return Product::with('category')
            ->active()
            ->featured()
            ->limit($limit)
            ->get();
    }

    /**
     * Get best seller products.
     *
     * @param int $limit
     * @return Collection
     */
    public function getBestSellers(int $limit = 8): Collection
    {
        return Product::with('category')
            ->active()
            ->bestSeller()
            ->limit($limit)
            ->get();
    }

    /**
     * Get all products with filters and pagination.
     *
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getProducts(array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $query = Product::with('category')->active();

        // Filter by category
        if (!empty($filters['category_id'])) {
            $query->byCategory($filters['category_id']);
        }

        // Filter by skin type
        if (!empty($filters['skin_type'])) {
            $query->bySkinType($filters['skin_type']);
        }

        // Search by name or description
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $filters['sort_by'] ?? 'created_at';
        $sortOrder = $filters['sort_order'] ?? 'desc';
        $query->orderBy($sortBy, $sortOrder);

        return $query->paginate($perPage);
    }

    /**
     * Get product by slug.
     *
     * @param string $slug
     * @return Product|null
     */
    public function getProductBySlug(string $slug): ?Product
    {
        return Product::with(['category', 'media'])
            ->active()
            ->where('slug', $slug)
            ->first();
    }

    /**
     * Get product by ID.
     *
     * @param int $id
     * @return Product|null
     */
    public function getProductById(int $id): ?Product
    {
        return Product::with(['category', 'media'])
            ->find($id);
    }

    /**
     * Get related products based on category and skin type.
     *
     * @param Product $product
     * @param int $limit
     * @return Collection
     */
    public function getRelatedProducts(Product $product, int $limit = 4): Collection
    {
        return Product::active()
            ->where('id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                $query->where('category_id', $product->category_id)
                      ->orWhere('skin_type', $product->skin_type);
            })
            ->limit($limit)
            ->get();
    }

    /**
     * Get products by skin type.
     *
     * @param string $skinType
     * @param int $limit
     * @return Collection
     */
    public function getProductsBySkinType(string $skinType, int $limit = 8): Collection
    {
        return Product::with('category')
            ->active()
            ->where(function ($query) use ($skinType) {
                $query->bySkinType($skinType)
                      ->orWhere('skin_type', 'all');
            })
            ->limit($limit)
            ->get();
    }

    /**
     * Check if product is available in stock.
     *
     * @param Product $product
     * @param int $quantity
     * @return bool
     */
    public function isAvailable(Product $product, int $quantity = 1): bool
    {
        return $product->stock >= $quantity;
    }

    /**
     * Decrease product stock.
     *
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function decreaseStock(Product $product, int $quantity): void
    {
        $product->decrement('stock', $quantity);
    }

    /**
     * Increase product stock.
     *
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function increaseStock(Product $product, int $quantity): void
    {
        $product->increment('stock', $quantity);
    }
}

