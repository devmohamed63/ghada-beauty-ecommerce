@extends('front.layouts.app')

@section('title', 'السلة - Ghada Beauty')

@section('noindex', true)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50 py-12">
    <div class="container max-w-6xl">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-8">سلة التسوق</h1>

        @if(count($cartSummary['items']) > 0)
        <div class="grid md:grid-cols-3 gap-8">
            {{-- Cart Items --}}
            <div class="md:col-span-2 space-y-4">
                @foreach($cartSummary['items'] as $item)
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-pink-50 hover:shadow-md transition-all" data-product-id="{{ $item['id'] }}">
                    <div class="flex gap-4">
                        <a href="{{ route('products.show', $item['slug']) }}" class="flex-shrink-0">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }} - منتج عناية بالبشرة" width="128" height="128" class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-xl" loading="lazy">
                        </a>
                        
                        <div class="flex-1">
                            <a href="{{ route('products.show', $item['slug']) }}">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2 hover:text-pink-500 transition-colors">{{ $item['name'] }}</h3>
                            </a>
                            <p class="text-pink-600 text-xl font-bold mb-4">{{ number_format($item['price'], 0) }} جنيه</p>
                            
                            <div class="flex items-center gap-4">
                                <div class="flex items-center gap-2 border border-gray-200 rounded-lg">
                                    <button onclick="updateCartQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})" aria-label="تقليل الكمية" class="px-4 py-2.5 text-gray-600 hover:text-pink-500 transition-colors min-w-[44px] min-h-[44px] touch-manipulation">−</button>
                                    <input type="number" value="{{ $item['quantity'] }}" min="1" max="99" aria-label="الكمية" class="w-16 text-center border-0 focus:ring-2 focus:ring-pink-300 rounded min-h-[44px]" onchange="updateCartQuantity({{ $item['id'] }}, this.value)">
                                    <button onclick="updateCartQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})" aria-label="زيادة الكمية" class="px-4 py-2.5 text-gray-600 hover:text-pink-500 transition-colors min-w-[44px] min-h-[44px] touch-manipulation">+</button>
                                </div>
                                
                                <button onclick="removeFromCart({{ $item['id'] }})" aria-label="حذف {{ $item['name'] }} من السلة" class="text-red-500 hover:text-red-700 transition-colors flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-red-50 min-h-[44px] touch-manipulation">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                    <span>حذف</span>
                                </button>
                            </div>
                            
                            <p class="text-gray-600 mt-3">
                                <span class="font-medium">الإجمالي:</span>
                                <span class="text-pink-600 font-bold">{{ number_format($item['price'] * $item['quantity'], 0) }} جنيه</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Order Summary --}}
            <div class="md:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-pink-50 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">ملخص الطلب</h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>عدد المنتجات:</span>
                            <span class="font-medium">{{ $cartSummary['count'] }} منتج</span>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-800">الإجمالي:</span>
                                <span class="text-2xl font-bold text-pink-600">{{ $cartSummary['formatted_total'] }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('checkout') }}" aria-label="إتمام الطلب" class="block w-full bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-4 rounded-full text-center font-semibold hover:shadow-lg transition-all mb-4 min-h-[56px] flex items-center justify-center touch-manipulation">
                        إتمام الطلب
                    </a>
                    
                    <a href="{{ route('products.index') }}" aria-label="متابعة التسوق" class="block w-full text-center text-gray-600 hover:text-pink-500 transition-colors py-3 min-h-[44px] flex items-center justify-center touch-manipulation">
                        ← متابعة التسوق
                    </a>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-2xl shadow-sm p-12 text-center max-w-md mx-auto">
            <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">السلة فارغة</h2>
            <p class="text-gray-600 mb-6">لم تقومي بإضافة أي منتجات للسلة بعد</p>
            <a href="{{ route('products.index') }}" class="btn-primary inline-block">تصفح المنتجات</a>
        </div>
        @endif
    </div>
</div>

{{-- JavaScript functions are now unified in app.js --}}
@endsection
