<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'skin_type',
        'is_featured',
        'is_best_seller',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_featured' => 'boolean',
            'is_best_seller' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Register media collections and conversions.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
             ->useFallbackUrl(asset('images/product-placeholder.jpg'))
             ->useFallbackPath(public_path('images/product-placeholder.jpg'))
             ->registerMediaConversions(function (Media $media) {
                 // Thumbnail - instant generation
                 $this->addMediaConversion('thumb')
                      ->width(150)
                      ->height(150)
                      ->sharpen(10)
                      ->nonQueued();
                 
                 // Medium - instant generation
                 $this->addMediaConversion('medium')
                      ->width(500)
                      ->height(500)
                      ->sharpen(10)
                      ->nonQueued();
                 
                 // Large - queued (can be queued as it's less critical)
                 $this->addMediaConversion('large')
                      ->width(1200)
                      ->height(1200)
                      ->sharpen(5)
                      ->nonQueued();
             });

        // Results collection for product results images
        $this->addMediaCollection('results')
             ->useFallbackUrl(asset('images/product-placeholder.jpg'))
             ->useFallbackPath(public_path('images/product-placeholder.jpg'))
             ->registerMediaConversions(function (Media $media) {
                 // Thumbnail - instant generation
                 $this->addMediaConversion('thumb')
                      ->width(150)
                      ->height(150)
                      ->sharpen(10)
                      ->nonQueued();
                 
                 // Medium - instant generation
                 $this->addMediaConversion('medium')
                      ->width(500)
                      ->height(500)
                      ->sharpen(10)
                      ->nonQueued();
                 
                 // Large - instant generation
                 $this->addMediaConversion('large')
                      ->width(1200)
                      ->height(1200)
                      ->sharpen(5)
                      ->nonQueued();
             });
    }

    /**
     * Get main product image URL with optional conversion.
     *
     * @param string $conversion
     * @return string
     */
    public function getMainImageUrl(string $conversion = ''): string
    {
        $media = $this->getFirstMedia('images');
        
        if (!$media) {
            return asset('images/product-placeholder.jpg');
        }
        
        try {
            if ($conversion) {
                // Check if conversion exists
                $conversionPath = $media->getPath($conversion);
                if (file_exists($conversionPath)) {
                    // Use getFullUrl to ensure proper URL generation
                    return $media->getFullUrl($conversion);
                }
                // Fallback to original if conversion doesn't exist
                return $media->getFullUrl();
            }
            
            return $media->getFullUrl();
        } catch (\Exception $e) {
            // Fallback to original URL
            try {
                return $media->getFullUrl();
            } catch (\Exception $e2) {
                return asset('images/product-placeholder.jpg');
            }
        }
    }

    /**
     * Get all product images URLs.
     *
     * @param string $conversion
     * @return array
     */
    public function getAllImagesUrls(string $conversion = ''): array
    {
        return $this->getMedia('images')->map(function (Media $media) use ($conversion) {
            try {
                if ($conversion) {
                    $conversionPath = $media->getPath($conversion);
                    if (file_exists($conversionPath)) {
                        return $media->getFullUrl($conversion);
                    }
                    return $media->getFullUrl();
                }
                return $media->getFullUrl();
            } catch (\Exception $e) {
                try {
                    return $media->getFullUrl();
                } catch (\Exception $e2) {
                    return asset('images/product-placeholder.jpg');
                }
            }
        })->toArray();
    }

    /**
     * Get the category that owns the product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the order items for the product.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Scope a query to only include active products.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include featured products.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to only include best seller products.
     */
    public function scopeBestSeller($query)
    {
        return $query->where('is_best_seller', true);
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope a query to filter by skin type.
     */
    public function scopeBySkinType($query, $skinType)
    {
        return $query->where('skin_type', $skinType);
    }

    /**
     * Get all product results images URLs.
     *
     * @param string $conversion
     * @return array
     */
    public function getResultsUrls(string $conversion = ''): array
    {
        return $this->getMedia('results')->map(function (Media $media) use ($conversion) {
            try {
                if ($conversion) {
                    $conversionPath = $media->getPath($conversion);
                    if (file_exists($conversionPath)) {
                        return $media->getFullUrl($conversion);
                    }
                    return $media->getFullUrl();
                }
                return $media->getFullUrl();
            } catch (\Exception $e) {
                try {
                    return $media->getFullUrl();
                } catch (\Exception $e2) {
                    return asset('images/product-placeholder.jpg');
                }
            }
        })->toArray();
    }

    /**
     * Get the count of product results images.
     *
     * @return int
     */
    public function getResultsCount(): int
    {
        return $this->getMedia('results')->count();
    }
}
