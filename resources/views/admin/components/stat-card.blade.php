@php
    $color = $color ?? 'pink';
    $colors = [
        'pink' => 'from-pink-500 to-pink-600',
        'teal' => 'from-teal-500 to-teal-600',
        'purple' => 'from-purple-500 to-purple-600',
        'orange' => 'from-orange-500 to-orange-600',
        'blue' => 'from-blue-500 to-blue-600',
    ];
    $bgColors = [
        'pink' => 'bg-gradient-to-br from-pink-100 to-pink-200',
        'teal' => 'bg-gradient-to-br from-teal-100 to-teal-200',
        'purple' => 'bg-gradient-to-br from-purple-100 to-purple-200',
        'orange' => 'bg-gradient-to-br from-orange-100 to-orange-200',
        'blue' => 'bg-gradient-to-br from-blue-100 to-blue-200',
    ];
    $textColors = [
        'pink' => 'text-pink-600',
        'teal' => 'text-teal-600',
        'purple' => 'text-purple-600',
        'orange' => 'text-orange-600',
        'blue' => 'text-blue-600',
    ];
    $gradient = $colors[$color] ?? $colors['pink'];
    $bgColor = $bgColors[$color] ?? $bgColors['pink'];
    $textColor = $textColors[$color] ?? $textColors['pink'];
@endphp

<div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 hover:shadow-lg transition-all duration-300 hover:scale-105">
    <div class="flex items-center justify-between mb-4">
        <div class="w-14 h-14 {{ $bgColor }} rounded-2xl flex items-center justify-center shadow-sm">
            <div class="text-2xl">
                {!! $icon ?? '' !!}
            </div>
        </div>
    </div>
    <h3 class="text-gray-600 text-sm font-medium mb-2">{{ $title ?? '' }}</h3>
    <p class="text-3xl font-bold {{ $textColor }}">{{ $value ?? '0' }}</p>
</div>

