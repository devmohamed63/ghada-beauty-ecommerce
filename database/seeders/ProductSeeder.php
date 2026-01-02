<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'سيروم فيتامين سي',
                'slug' => 'vitamin-c-serum',
                'description' => 'سيروم مركز بفيتامين سي النقي يساعد على توحيد لون البشرة وتقليل علامات التقدم في السن. يحتوي على مضادات أكسدة قوية تحمي البشرة من العوامل البيئية الضارة.',
                'price' => 499,
                'stock' => 50,
                'category' => 'serum',
                'skin_type' => 'all',
                'is_featured' => true,
                'is_best_seller' => true,
                'image_url' => 'https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBjb3NtZXRpY3MlMjBib3R0bGV6JTIwcGlua3xlbnwxfHx8fDE3NjUzOTgzMTN8MA&ixlib=rb-4.1.0&q=80&w=1080',
            ],
            [
                'name' => 'غسول منقي للبشرة الدهنية',
                'slug' => 'purifying-cleanser-oily-skin',
                'description' => 'غسول لطيف ينظف البشرة بعمق ويزيل الدهون الزائدة والشوائب. مناسب للبشرة الدهنية والمعرضة لحب الشباب.',
                'price' => 299,
                'stock' => 75,
                'category' => 'cleanser',
                'skin_type' => 'oily',
                'is_featured' => false,
                'is_best_seller' => true,
                'image_url' => 'https://images.unsplash.com/photo-1629198713100-4192b022270f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'كريم مرطب للبشرة الجافة',
                'slug' => 'moisturizing-cream-dry-skin',
                'description' => 'كريم غني بالترطيب العميق يعيد الحيوية للبشرة الجافة. يحتوي على حمض الهيالورونيك وزبدة الشيا لترطيب يدوم طوال اليوم.',
                'price' => 399,
                'stock' => 60,
                'category' => 'cream',
                'skin_type' => 'dry',
                'is_featured' => true,
                'is_best_seller' => false,
                'image_url' => 'https://images.unsplash.com/photo-1643379850623-7eb6442cd262?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'واقي شمس SPF 50',
                'slug' => 'sunscreen-spf-50',
                'description' => 'واقي شمس واسع الطيف بعامل حماية 50 يحمي البشرة من الأشعة فوق البنفسجية الضارة. تركيبة خفيفة لا تترك آثاراً بيضاء.',
                'price' => 349,
                'stock' => 100,
                'category' => 'sunscreen',
                'skin_type' => 'all',
                'is_featured' => true,
                'is_best_seller' => true,
                'image_url' => 'https://images.unsplash.com/photo-1620740304097-a0111972111f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'تونر مهدئ للبشرة الحساسة',
                'slug' => 'soothing-toner-sensitive-skin',
                'description' => 'تونر لطيف يهدئ ويرطب البشرة الحساسة. غني بخلاصة الألوفيرا والبابونج لتهدئة التهيجات والاحمرار.',
                'price' => 279,
                'stock' => 45,
                'category' => 'toner',
                'skin_type' => 'sensitive',
                'is_featured' => false,
                'is_best_seller' => false,
                'image_url' => 'https://images.unsplash.com/photo-1556228852-80024e49c5db?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'ماسك الطين المنقي',
                'slug' => 'purifying-clay-mask',
                'description' => 'ماسك بالطين الطبيعي ينظف المسام بعمق ويمتص الزيوت الزائدة. مثالي للاستخدام الأسبوعي للحصول على بشرة نقية ومشرقة.',
                'price' => 329,
                'stock' => 40,
                'category' => 'mask',
                'skin_type' => 'oily',
                'is_featured' => false,
                'is_best_seller' => true,
                'image_url' => 'https://images.unsplash.com/photo-1629198713100-4192b022270f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'سيروم حمض الهيالورونيك',
                'slug' => 'hyaluronic-acid-serum',
                'description' => 'سيروم مرطب مكثف يحتوي على حمض الهيالورونيك النقي يساعد على ترطيب البشرة وملء الخطوط الدقيقة.',
                'price' => 549,
                'stock' => 35,
                'category' => 'serum',
                'skin_type' => 'dry',
                'is_featured' => true,
                'is_best_seller' => true,
                'image_url' => 'https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBjb3NtZXRpY3MlMjBib3R0bGV6JTIwcGlua3xlbnwxfHx8fDE3NjUzOTgzMTN8MA&ixlib=rb-4.1.0&q=80&w=1080',
            ],
            [
                'name' => 'كريم ليلي مضاد للشيخوخة',
                'slug' => 'anti-aging-night-cream',
                'description' => 'كريم ليلي فاخر يحتوي على الريتينول وفيتامين E لمكافحة علامات الشيخوخة وتجديد البشرة أثناء النوم.',
                'price' => 599,
                'stock' => 30,
                'category' => 'cream',
                'skin_type' => 'all',
                'is_featured' => true,
                'is_best_seller' => true,
                'image_url' => 'https://images.unsplash.com/photo-1643379850623-7eb6442cd262?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'غسول للبشرة المختلطة',
                'slug' => 'cleanser-combination-skin',
                'description' => 'غسول متوازن ينظف البشرة المختلطة بلطف، يزيل الدهون من المنطقة الدهنية ويرطب المناطق الجافة.',
                'price' => 319,
                'stock' => 55,
                'category' => 'cleanser',
                'skin_type' => 'combination',
                'is_featured' => false,
                'is_best_seller' => false,
                'image_url' => 'https://images.unsplash.com/photo-1556228852-80024e49c5db?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
            [
                'name' => 'مقشر لطيف للوجه',
                'slug' => 'gentle-face-exfoliator',
                'description' => 'مقشر بحبيبات دقيقة ينعم البشرة ويزيل خلايا الجلد الميتة. مناسب للاستخدام مرتين في الأسبوع.',
                'price' => 269,
                'stock' => 50,
                'category' => 'exfoliator',
                'skin_type' => 'all',
                'is_featured' => false,
                'is_best_seller' => false,
                'image_url' => 'https://images.unsplash.com/photo-1629198713100-4192b022270f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHNraW4lMjBjYXJlJTIwcHJvZHVjdHN8ZW58MHx8MHx8fDA%3D&ixlib=rb-4.0.3&q=80&w=1080',
            ],
        ];

        foreach ($products as $productData) {
            $category = Category::where('slug', $productData['category'])->first();
            
            if (!$category) {
                $this->command->warn("Category {$productData['category']} not found for product {$productData['name']}");
                continue;
            }

            // Check if product already exists
            $existing = Product::where('slug', $productData['slug'])->first();
            if ($existing) {
                // Check if product has images, if not, add one
                if ($existing->getMedia('images')->count() === 0) {
                    $this->command->info("Product exists but has no images: {$productData['name']} - Adding image...");
                    $this->addImageToProduct($existing, $productData['image_url']);
                } else {
                    $this->command->info("Product already exists: {$productData['name']}");
                }
                continue;
            }

            $imageUrl = $productData['image_url'];
            unset($productData['image_url'], $productData['category']);

            $product = Product::create([
                'category_id' => $category->id,
                'name' => $productData['name'],
                'slug' => $productData['slug'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'stock' => $productData['stock'],
                'skin_type' => $productData['skin_type'],
                'is_featured' => $productData['is_featured'],
                'is_best_seller' => $productData['is_best_seller'],
                'is_active' => true,
            ]);

            // Download and attach image
            $this->addImageToProduct($product, $imageUrl);
        }

        $this->command->info('Products seeded successfully!');
    }

    /**
     * Add image to product with fallback options
     *
     * @param \App\Models\Product $product
     * @param string $primaryImageUrl
     * @return void
     */
    private function addImageToProduct(Product $product, string $primaryImageUrl): void
    {
        // Fallback images that are more reliable
        $fallbackImages = [
            'https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?w=1080&h=1080&fit=crop',
            'https://images.unsplash.com/photo-1643379850623-7eb6442cd262?w=1080&h=1080&fit=crop',
            'https://images.unsplash.com/photo-1612817288484-6f916006741a?w=1080&h=1080&fit=crop',
            'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=1080&h=1080&fit=crop',
            'https://images.unsplash.com/photo-1571875257727-256c39da42af?w=1080&h=1080&fit=crop',
        ];

        $imageUrls = array_merge([$primaryImageUrl], $fallbackImages);
        $imageAdded = false;

        foreach ($imageUrls as $index => $imageUrl) {
            try {
                $product->addMediaFromUrl($imageUrl)
                        ->toMediaCollection('images');
                
                if ($index === 0) {
                    $this->command->info("Created product: {$product->name} with image");
                } else {
                    $this->command->info("Created product: {$product->name} with fallback image #{$index}");
                }
                
                $imageAdded = true;
                break;
            } catch (\Exception $e) {
                if ($index === 0) {
                    $this->command->warn("Failed to download primary image for {$product->name}, trying fallback...");
                }
                continue;
            }
        }

        if (!$imageAdded) {
            $this->command->error("Failed to add any image for {$product->name} after trying all options");
        }
    }
}
