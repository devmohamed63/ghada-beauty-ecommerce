<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = base_path('egypt.json');
        
        if (!File::exists($jsonPath)) {
            $this->command->error('egypt.json file not found!');
            return;
        }

        $egyptData = json_decode(File::get($jsonPath), true);
        
        if (!isset($egyptData['Egypt'])) {
            $this->command->error('Invalid egypt.json structure!');
            return;
        }

        $governorates = $egyptData['Egypt'];

        foreach ($governorates as $governorateNameEn => $cities) {
            // Create governorate
            $governorate = Governorate::create([
                'name_en' => $governorateNameEn,
                'name_ar' => $this->getGovernorateArabicName($governorateNameEn),
            ]);

            $this->command->info("Created governorate: {$governorateNameEn}");

            // Create cities for this governorate
            foreach ($cities as $cityNameEn => $cityNameAr) {
                City::create([
                    'governorate_id' => $governorate->id,
                    'name_en' => $cityNameEn,
                    'name_ar' => $cityNameAr,
                ]);
            }

            $this->command->info("  Added " . count($cities) . " cities");
        }

        $this->command->info('Governorates and cities seeded successfully!');
    }

    /**
     * Get Arabic name for governorate.
     * Maps English governorate names to their Arabic equivalents.
     *
     * @param string $englishName
     * @return string
     */
    private function getGovernorateArabicName(string $englishName): string
    {
        $mapping = [
            'Cairo' => 'القاهرة',
            'Giza' => 'الجيزة',
            'Alexandria' => 'الإسكندرية',
            'Al Beheira' => 'البحيرة',
            'Al Daqahliya' => 'الدقهلية',
            'Al Fayoum' => 'الفيوم',
            'Al Gharbia' => 'الغربية',
            'Al Meniya' => 'المنيا',
            'Al Monufia' => 'المنوفية',
            'Al Sharqia' => 'الشرقية',
            'Aswan' => 'أسوان',
            'Asyut' => 'أسيوط',
            'Bani Souaif' => 'بني سويف',
            'Damietta' => 'دمياط',
            'Ismailia' => 'الإسماعيلية',
            'Kafr El Sheikh' => 'كفر الشيخ',
            'Luxor' => 'الأقصر',
            'Matrooh' => 'مطروح',
            'New Valley' => 'الوادي الجديد',
            'Port Said' => 'بورسعيد',
            'Qalyubia' => 'القليوبية',
            'Qena' => 'قنا',
            'Red Sea' => 'البحر الأحمر',
            'Sohag' => 'سوهاج',
            'Suez' => 'السويس',
            'North Sinai' => 'شمال سيناء',
            'South Sinai' => 'جنوب سيناء',
        ];

        return $mapping[$englishName] ?? $englishName;
    }
}
