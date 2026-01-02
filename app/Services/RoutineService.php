<?php

namespace App\Services;

class RoutineService
{
    /**
     * Get all skin routines with hardcoded data.
     * In future, this can be migrated to database.
     *
     * @return array
     */
    public function getAllRoutines(): array
    {
        return [
            [
                'type' => 'دهنية',
                'slug' => 'oily',
                'morning' => [
                    [
                        'step' => 1,
                        'title' => 'غسول الوجه',
                        'description' => 'نظفي وجهك بغسول مناسب للبشرة الدهنية لإزالة الزيوت الزائدة',
                    ],
                    [
                        'step' => 2,
                        'title' => 'تونر',
                        'description' => 'استخدمي تونر لتصغير المسام وموازنة البشرة',
                    ],
                    [
                        'step' => 3,
                        'title' => 'سيروم',
                        'description' => 'ضعي سيروم فيتامين سي لتفتيح البشرة وحمايتها',
                    ],
                    [
                        'step' => 4,
                        'title' => 'واقي الشمس',
                        'description' => 'احمي بشرتك من أشعة الشمس الضارة',
                    ],
                ],
                'evening' => [
                    [
                        'step' => 1,
                        'title' => 'غسول الوجه',
                        'description' => 'نظفي وجهك جيداً لإزالة المكياج والشوائب',
                    ],
                    [
                        'step' => 2,
                        'title' => 'تونر',
                        'description' => 'استخدمي التونر لتنظيف المسام',
                    ],
                    [
                        'step' => 3,
                        'title' => 'سيروم',
                        'description' => 'ضعي السيروم لتغذية البشرة أثناء النوم',
                    ],
                ],
            ],
            [
                'type' => 'جافة',
                'slug' => 'dry',
                'morning' => [
                    [
                        'step' => 1,
                        'title' => 'غسول لطيف',
                        'description' => 'استخدمي غسول لطيف لا يجفف البشرة',
                    ],
                    [
                        'step' => 2,
                        'title' => 'سيروم مرطب',
                        'description' => 'ضعي سيروم يحتوي على حمض الهيالورونيك',
                    ],
                    [
                        'step' => 3,
                        'title' => 'كريم مرطب',
                        'description' => 'استخدمي كريم مرطب غني لترطيب عميق',
                    ],
                    [
                        'step' => 4,
                        'title' => 'واقي الشمس',
                        'description' => 'احمي بشرتك من الجفاف الناتج عن الشمس',
                    ],
                ],
                'evening' => [
                    [
                        'step' => 1,
                        'title' => 'غسول لطيف',
                        'description' => 'نظفي بشرتك بلطف',
                    ],
                    [
                        'step' => 2,
                        'title' => 'سيروم',
                        'description' => 'ضعي السيروم لتغذية البشرة',
                    ],
                    [
                        'step' => 3,
                        'title' => 'كريم ليلي',
                        'description' => 'استخدمي كريم مرطب غني للترطيب طوال الليل',
                    ],
                ],
            ],
            [
                'type' => 'مختلطة',
                'slug' => 'combination',
                'morning' => [
                    [
                        'step' => 1,
                        'title' => 'غسول متوازن',
                        'description' => 'نظفي وجهك بغسول يوازن بين الجفاف والدهون',
                    ],
                    [
                        'step' => 2,
                        'title' => 'تونر',
                        'description' => 'استخدمي تونر لتوازن البشرة',
                    ],
                    [
                        'step' => 3,
                        'title' => 'سيروم',
                        'description' => 'ضعي سيروم خفيف على كامل الوجه',
                    ],
                    [
                        'step' => 4,
                        'title' => 'واقي الشمس',
                        'description' => 'احمي بشرتك من أشعة الشمس',
                    ],
                ],
                'evening' => [
                    [
                        'step' => 1,
                        'title' => 'غسول الوجه',
                        'description' => 'نظفي وجهك جيداً',
                    ],
                    [
                        'step' => 2,
                        'title' => 'تونر',
                        'description' => 'استخدمي التونر',
                    ],
                    [
                        'step' => 3,
                        'title' => 'كريم مرطب',
                        'description' => 'رطبي المناطق الجافة فقط',
                    ],
                ],
            ],
            [
                'type' => 'حساسة',
                'slug' => 'sensitive',
                'morning' => [
                    [
                        'step' => 1,
                        'title' => 'غسول لطيف',
                        'description' => 'استخدمي غسول خالي من العطور والمواد القاسية',
                    ],
                    [
                        'step' => 2,
                        'title' => 'سيروم مهدئ',
                        'description' => 'ضعي سيروم يحتوي على مكونات مهدئة',
                    ],
                    [
                        'step' => 3,
                        'title' => 'كريم مرطب',
                        'description' => 'استخدمي كريم مرطب مهدئ للبشرة الحساسة',
                    ],
                    [
                        'step' => 4,
                        'title' => 'واقي شمس معدني',
                        'description' => 'احمي بشرتك بواقي شمس مناسب للبشرة الحساسة',
                    ],
                ],
                'evening' => [
                    [
                        'step' => 1,
                        'title' => 'غسول لطيف',
                        'description' => 'نظفي بشرتك بلطف شديد',
                    ],
                    [
                        'step' => 2,
                        'title' => 'سيروم',
                        'description' => 'ضعي سيروم مهدئ',
                    ],
                    [
                        'step' => 3,
                        'title' => 'كريم مرطب',
                        'description' => 'رطبي بشرتك بكريم غني',
                    ],
                ],
            ],
        ];
    }

    /**
     * Get routine by skin type.
     *
     * @param string $skinType
     * @return array|null
     */
    public function getRoutineBySkinType(string $skinType): ?array
    {
        $routines = $this->getAllRoutines();
        
        foreach ($routines as $routine) {
            if ($routine['slug'] === $skinType) {
                return $routine;
            }
        }

        return null;
    }
}

