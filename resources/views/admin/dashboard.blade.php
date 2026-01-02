@extends('admin.layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="space-y-6 md:space-y-8">
    {{-- Page Header --}}
    <div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">لوحة التحكم</h1>
        <p class="text-gray-600">نظرة عامة على المتجر والإحصائيات</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        @include('admin.components.stat-card', [
            'title' => 'إجمالي الطلبات',
            'value' => $statistics['total_orders'],
            'color' => 'pink',
            'icon' => '<svg class="w-7 h-7 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'title' => 'طلبات قيد الانتظار',
            'value' => $statistics['pending_orders'],
            'color' => 'orange',
            'icon' => '<svg class="w-7 h-7 text-orange-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'title' => 'إجمالي المبيعات',
            'value' => number_format($statistics['total_revenue'], 2) . ' جنيه',
            'color' => 'teal',
            'icon' => '<svg class="w-7 h-7 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'title' => 'طلبات اليوم',
            'value' => $statistics['today_orders'],
            'color' => 'purple',
            'icon' => '<svg class="w-7 h-7 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>'
        ])
    </div>
    
    {{-- Best Sellers Section --}}
    <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 md:p-8">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">الأكثر مبيعاً</h2>
            <a href="{{ route('admin.products.index') }}" class="text-pink-600 hover:text-pink-700 text-sm font-medium">
                عرض الكل →
            </a>
        </div>
        
        @if($bestSellers->count() > 0)
            <div class="space-y-4">
                @foreach($bestSellers as $product)
                    <div class="flex items-center gap-4 p-4 rounded-xl hover:bg-pink-50 transition-colors border-b border-gray-100 last:border-0">
                        <img src="{{ $product->getMainImageUrl('thumb') }}" alt="{{ $product->name }}" class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-xl shadow-sm">
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-gray-800 mb-1 line-clamp-1">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ $product->category->name ?? 'بدون فئة' }}</p>
                            <div class="flex items-center gap-3">
                                <span class="text-lg font-bold text-pink-600">{{ number_format($product->price, 2) }} جنيه</span>
                                @if($product->is_best_seller)
                                    <span class="px-2 py-1 bg-orange-500 text-white text-xs rounded-full">الأكثر مبيعاً</span>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('admin.products.edit', $product) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors flex-shrink-0">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8 text-gray-500">
                <p>لا توجد منتجات مبيعة بعد</p>
            </div>
        @endif
    </div>
</div>
@endsection
