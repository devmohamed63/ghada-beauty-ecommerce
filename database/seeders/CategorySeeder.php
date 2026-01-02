<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'غسول', 'slug' => 'cleanser'],
            ['name' => 'سيروم', 'slug' => 'serum'],
            ['name' => 'كريم', 'slug' => 'cream'],
            ['name' => 'تونر', 'slug' => 'toner'],
            ['name' => 'واقي شمس', 'slug' => 'sunscreen'],
            ['name' => 'ماسك', 'slug' => 'mask'],
            ['name' => 'مرطب', 'slug' => 'moisturizer'],
            ['name' => 'مقشر', 'slug' => 'exfoliator'],
        ];

        foreach ($categories as $category) {
            $existing = Category::where('slug', $category['slug'])->first();
            
            if ($existing) {
                $this->command->info("Category already exists: {$category['name']}");
            } else {
                Category::create([
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                    'is_active' => true,
                ]);
                $this->command->info("Created category: {$category['name']}");
            }
        }

        $this->command->info('Categories seeded successfully!');
    }
}
