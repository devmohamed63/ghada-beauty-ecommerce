@extends('front.layouts.app')

@php
$skinTypeText = '';
if($product->skin_type) {
    $skinTypeText = match($product->skin_type) {
        'oily' => 'بشرة دهنية',
        'dry' => 'بشرة جافة',
        'combination' => 'بشرة مختلطة',
        'sensitive' => 'بشرة حساسة',
        default => ''
    };
}
$productDescription = Str::limit(strip_tags($product->description), 155);
$productImage = $product->getMainImageUrl('large');
@endphp

@section('title', $product->name . ($skinTypeText ? ' - ' . $skinTypeText : '') . ' | Ghada Beauty')

@section('description', $productDescription . ' - ' . $product->name . ' من Ghada Beauty. منتج أصلي 100% - ' . number_format($product->price, 0) . ' جنيه. توصيل لجميع المحافظات.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
    <div class="container py-12">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-600 mb-8">
            <a href="{{ route('home') }}" class="hover:text-pink-500 transition-colors">الرئيسية</a>
            <span>/</span>
            <a href="{{ route('products.index') }}" class="hover:text-pink-500 transition-colors">المنتجات</a>
            <span>/</span>
            <span class="text-pink-600 font-medium">{{ $product->name }}</span>
        </div>

        {{-- Product Details --}}
        <div class="grid md:grid-cols-2 gap-12 mb-20">
            {{-- Image Gallery --}}
            <div>
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg mb-4">
                    <img src="{{ $product->getMainImageUrl('large') }}" alt="{{ $product->name }} - منتج عناية بالبشرة من Ghada Beauty" width="800" height="800" class="w-full aspect-square object-cover" loading="eager">
                </div>
                
                {{-- Multiple images thumbnails can be added here if available --}}
                @if($product->getMedia('images')->count() > 1)
                <div class="flex gap-4">
                    @foreach($product->getMedia('images')->take(4) as $index => $media)
                    <div class="flex-1 rounded-xl overflow-hidden border-2 {{ $index === 0 ? 'border-pink-500' : 'border-transparent hover:border-pink-200' }} transition-all cursor-pointer">
                        <img src="{{ $media->getFullUrl('medium') }}" alt="{{ $product->name }} - صورة {{ $index + 1 }}" width="200" height="200" class="w-full aspect-square object-cover" loading="lazy">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">{{ $product->name }}</h1>
                    <p class="text-gray-500 text-sm mb-4">{{ $product->category->name }}</p>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @if($product->skin_type)
                        <span class="bg-teal-100 text-teal-700 px-3 py-1 rounded-full text-sm font-medium">
                            @switch($product->skin_type)
                                @case('oily') بشرة دهنية @break
                                @case('dry') بشرة جافة @break
                                @case('combination') بشرة مختلطة @break
                                @case('sensitive') بشرة حساسة @break
                            @endswitch
                        </span>
                        @endif
                        
                        @if($product->is_featured)
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">مميز</span>
                        @endif
                        
                        @if($product->is_best_seller)
                        <span class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-medium">الأكثر مبيعًا</span>
                        @endif
                    </div>
                    
                    <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                </div>

                <div class="border-t border-b border-gray-200 py-6">
                    <div class="flex items-baseline gap-3">
                        <span class="text-4xl font-bold text-pink-600">{{ number_format($product->price, 0) }}</span>
                        <span class="text-xl text-gray-600">جنيه</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">الكمية المتاحة: {{ $product->stock }} قطعة</p>
                </div>

                <button onclick="addToCart({{ $product->id }}, 1, event)" aria-label="أضيفي {{ $product->name }} للسلة" class="w-full bg-gradient-to-r from-pink-500 to-teal-500 text-white px-8 py-4 rounded-full hover:shadow-xl transition-all flex items-center justify-center gap-3 text-lg group min-h-[56px] touch-manipulation">
                    <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                    <span>أضيفي للسلة</span>
                </button>

                <div class="bg-pink-50 rounded-2xl p-6 border border-pink-100">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        لماذا تختارين هذا المنتج؟
                    </h4>
                    <ul class="space-y-2">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">منتج أصلي 100% ومضمون</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">توصيل لجميع المحافظات</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">الدفع عند الاستلام</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pink-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span class="text-gray-700">نتائج مضمونة وسريعة</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Product Results --}}
        @if($product->getResultsCount() > 0)
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                شاهد النتائج
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($product->getMedia('results') as $result)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-pink-50 hover:border-pink-200">
                        <div class="relative aspect-square overflow-hidden">
                            <img 
                                src="{{ $result->getFullUrl('large') }}" 
                                alt="نتيجة {{ $product->name }}" 
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                loading="lazy"
                                onclick="openLightbox('{{ $result->getFullUrl() }}')"
                                style="cursor: pointer;"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <div class="absolute bottom-3 left-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 text-center">
                                    <span class="text-sm font-semibold text-gray-800">انقري للتكبير</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Related Products --}}
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-8">منتجات مشابهة</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    @include('front.components.product-card', ['product' => $relatedProduct])
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4" onclick="closeLightbox()">
    <div class="relative max-w-7xl max-h-full">
        <button onclick="closeLightbox()" class="absolute -top-12 right-0 text-white hover:text-pink-300 transition-colors text-2xl font-bold" aria-label="إغلاق">
            ✕
        </button>
        <img id="lightbox-image" src="" alt="نتيجة المنتج" class="max-w-full max-h-[90vh] object-contain rounded-lg">
    </div>
</div>

<script>
function openLightbox(imageUrl) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    lightboxImage.src = imageUrl;
    lightbox.classList.remove('hidden');
    lightbox.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.add('hidden');
    lightbox.classList.remove('flex');
    document.body.style.overflow = '';
}

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});
</script>
@endsection
