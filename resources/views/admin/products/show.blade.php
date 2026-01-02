@extends('admin.layouts.app')

@section('title', 'عرض المنتج - ' . $product->name)

@section('content')
<div class="space-y-6 md:space-y-8">
    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="{{ route('admin.products.index') }}" class="text-gray-500 hover:text-pink-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800">عرض المنتج</h1>
            </div>
            <p class="text-gray-600">تفاصيل المنتج الكاملة</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.products.edit', $product) }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                <span>تعديل</span>
            </a>
            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 2 10 2s8.268 3.943 9.542 8c-1.274 4.057-5.064 8-9.542 8S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                <span>عرض في الموقع</span>
            </a>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 md:gap-8">
        {{-- Product Images --}}
        <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">صور المنتج</h2>
            
            {{-- Main Image --}}
            <div class="mb-6">
                <div class="relative rounded-2xl overflow-hidden border-2 border-pink-100 bg-gradient-to-br from-pink-50 to-purple-50">
                    <img src="{{ $product->getMainImageUrl('large') }}" alt="{{ $product->name }}" class="w-full aspect-square object-cover" loading="eager" onerror="this.src='{{ asset('images/product-placeholder.jpg') }}'; this.onerror=null;">
                </div>
            </div>

            {{-- Additional Images --}}
            @php
                $allImages = $product->getMedia('images');
            @endphp
            @if($allImages->count() > 1)
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-3">صور إضافية</h3>
                <div class="grid grid-cols-4 gap-3">
                    @foreach($allImages->skip(1) as $image)
                    <div class="relative rounded-xl overflow-hidden border-2 border-gray-200 hover:border-pink-300 transition-colors cursor-pointer group">
                        <img src="{{ $image->getFullUrl('medium') }}" alt="{{ $product->name }} - صورة {{ $loop->iteration + 1 }}" class="w-full aspect-square object-cover group-hover:scale-110 transition-transform" loading="lazy">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        {{-- Product Details --}}
        <div class="space-y-6">
            {{-- Basic Information --}}
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">المعلومات الأساسية</h2>
                
                <div class="space-y-4">
                    <div>
                        <label class="text-sm font-semibold text-gray-500 block mb-1">اسم المنتج</label>
                        <p class="text-lg font-bold text-gray-800">{{ $product->name }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-500 block mb-1">الفئة</label>
                        <p class="text-gray-800">{{ $product->category->name ?? 'بدون فئة' }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-500 block mb-1">الوصف</label>
                        <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-semibold text-gray-500 block mb-1">السعر</label>
                            <p class="text-2xl font-bold text-pink-600">{{ number_format($product->price, 0) }} <span class="text-base text-gray-500">جنيه</span></p>
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-500 block mb-1">المخزون</label>
                            <p class="text-xl font-bold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock }} <span class="text-base text-gray-500">قطعة</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Product Attributes --}}
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">خصائص المنتج</h2>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">نوع البشرة</span>
                        <span class="font-semibold text-gray-800">
                            @if($product->skin_type)
                                @switch($product->skin_type)
                                    @case('oily') بشرة دهنية @break
                                    @case('dry') بشرة جافة @break
                                    @case('combination') بشرة مختلطة @break
                                    @case('sensitive') بشرة حساسة @break
                                    @default {{ $product->skin_type }}
                                @endswitch
                            @else
                                <span class="text-gray-400">غير محدد</span>
                            @endif
                        </span>
                    </div>

                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">الحالة</span>
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $product->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $product->is_active ? 'نشط' : 'غير نشط' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">مميز</span>
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $product->is_featured ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $product->is_featured ? 'نعم' : 'لا' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <span class="text-gray-600">الأكثر مبيعاً</span>
                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $product->is_best_seller ? 'bg-orange-100 text-orange-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $product->is_best_seller ? 'نعم' : 'لا' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <span class="text-gray-600">تاريخ الإنشاء</span>
                        <span class="font-semibold text-gray-800">{{ $product->created_at->format('Y-m-d H:i') }}</span>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <span class="text-gray-600">آخر تحديث</span>
                        <span class="font-semibold text-gray-800">{{ $product->updated_at->format('Y-m-d H:i') }}</span>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl border border-pink-100 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">إجراءات سريعة</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.products.edit', $product) }}" class="flex-1 bg-white text-blue-600 px-4 py-3 rounded-xl hover:bg-blue-50 transition-colors font-semibold text-center border border-blue-200">
                        تعديل المنتج
                    </a>
                    <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="flex-1 bg-white text-teal-600 px-4 py-3 rounded-xl hover:bg-teal-50 transition-colors font-semibold text-center border border-teal-200">
                        عرض في الموقع
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
