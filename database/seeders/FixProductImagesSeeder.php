<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class FixProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        
        // Default placeholder image URLs from Unsplash
        $defaultImages = [
            'https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.1.0&q=80&w=1080',
            'https://images.unsplash.com/photo-1643379850623-7eb6442cd262?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=1080',
            'https://images.unsplash.com/photo-1612817288484-6f916006741a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixlib=rb-4.0.3&q=80&w=1080',
        ];
        
        $imageIndex = 0;
        
        foreach ($products as $product) {
            $imageCount = $product->getMedia('images')->count();
            
            if ($imageCount === 0) {
                $this->command->info("Adding image to product: {$product->name}");
                
                try {
                    $imageUrl = $defaultImages[$imageIndex % count($defaultImages)];
                    $product->addMediaFromUrl($imageUrl)
                            ->toMediaCollection('images');
                    $this->command->info("  ✓ Image added successfully");
                } catch (\Exception $e) {
                    $this->command->warn("  ✗ Failed to add image: " . $e->getMessage());
                }
                
                $imageIndex++;
            } else {
                $this->command->info("Product '{$product->name}' already has {$imageCount} image(s)");
            }
        }
        
        $this->command->info('Finished fixing product images!');
    }
}

