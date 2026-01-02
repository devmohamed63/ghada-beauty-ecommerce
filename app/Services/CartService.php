<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    private const CART_SESSION_KEY = 'cart';

    /**
     * Add product to cart.
     *
     * @param Product $product
     * @param int $quantity
     * @return array
     */
    public function addProduct(Product $product, int $quantity = 1): array
    {
        $cart = $this->getCart();
        $productId = $product->id;

        if (isset($cart[$productId])) {
            // Update quantity if product already in cart
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Add new product to cart
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) $product->price,
                'quantity' => $quantity,
                'image' => $product->getMainImageUrl('thumb'),
            ];
        }

        $this->saveCart($cart);

        return $cart[$productId];
    }

    /**
     * Update product quantity in cart.
     *
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public function updateQuantity(int $productId, int $quantity): bool
    {
        $cart = $this->getCart();

        if (!isset($cart[$productId])) {
            return false;
        }

        if ($quantity <= 0) {
            return $this->removeProduct($productId);
        }

        $cart[$productId]['quantity'] = $quantity;
        $this->saveCart($cart);

        return true;
    }

    /**
     * Remove product from cart.
     *
     * @param int $productId
     * @return bool
     */
    public function removeProduct(int $productId): bool
    {
        $cart = $this->getCart();

        if (!isset($cart[$productId])) {
            return false;
        }

        unset($cart[$productId]);
        $this->saveCart($cart);

        return true;
    }

    /**
     * Get cart items.
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->getCart();
    }

    /**
     * Get cart items count.
     *
     * @return int
     */
    public function getItemsCount(): int
    {
        $cart = $this->getCart();
        return array_sum(array_column($cart, 'quantity'));
    }

    /**
     * Get cart total.
     *
     * @return float
     */
    public function getTotal(): float
    {
        $cart = $this->getCart();
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    /**
     * Clear cart.
     *
     * @return void
     */
    public function clear(): void
    {
        Session::forget(self::CART_SESSION_KEY);
    }

    /**
     * Check if cart is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->getCart());
    }

    /**
     * Get cart from session.
     *
     * @return array
     */
    private function getCart(): array
    {
        return Session::get(self::CART_SESSION_KEY, []);
    }

    /**
     * Save cart to session.
     *
     * @param array $cart
     * @return void
     */
    private function saveCart(array $cart): void
    {
        Session::put(self::CART_SESSION_KEY, $cart);
    }

    /**
     * Get cart summary for display.
     *
     * @return array
     */
    public function getSummary(): array
    {
        $items = $this->getItems();
        $total = $this->getTotal();
        $count = $this->getItemsCount();

        return [
            'items' => $items,
            'total' => $total,
            'count' => $count,
            'formatted_total' => number_format($total, 2) . ' جنيه',
        ];
    }
}

