@extends('front.layouts.app')

@section('title', 'Ghada Beauty - منتجات عناية بالبشرة أصلية 100% | تفتيح - ترطيب - نضارة')

@section('content')
{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-pink-50 via-purple-50 to-teal-50 py-20 md:py-32 overflow-hidden">
    <div class="container">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="inline-block bg-white px-5 py-2.5 rounded-full shadow-lg border border-pink-100 animate-bounce">
                    <span class="text-pink-600 text-sm">✨ منتجات أصلية 100%</span>
                </div>
                
                <h1 class="text-gray-800">
                    Ghada Beauty
                    <br />
                    <span class="text-pink-600 bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">منتجات أصلية 100% لبشرة صحية ونضرة</span>
                </h1>
                
                <p class="text-gray-600 text-lg leading-relaxed">
                    اكتشفي عالماً من العناية بالبشرة والشعر مع منتجاتنا الأصلية 100%. 
                    نوفر لكِ أفضل المنتجات للتفتيح والترطيب والعلاج والنضارة.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('products.index') }}" aria-label="تصفح جميع المنتجات" class="btn-primary inline-block hover:scale-105 transform transition-all min-h-[48px] px-6 py-3 flex items-center justify-center touch-manipulation">
                        شوفي المنتجات
                    </a>
                    <a href="{{ route('routine') }}" aria-label="اختيار روتين البشرة المناسب" class="btn-secondary inline-block hover:scale-105 transform transition-all min-h-[48px] px-6 py-3 flex items-center justify-center touch-manipulation">
                        اختاري روتين بشرتك
                    </a>
                </div>

                <div class="flex flex-wrap gap-6 pt-4">
                    <div class="flex items-center gap-2 text-gray-600 hover:text-teal-600 transition-colors">
                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                        </div>
                        <span class="text-sm">منتجات أصلية</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-600 hover:text-teal-600 transition-colors">
                        <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-500" fill="currentColor" viewBox="0 0 20 20"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/></svg>
                        </div>
                        <span class="text-sm">توصيل لجميع المحافظات</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-shadow duration-500">
                    <img
                        src="https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBjb3NtZXRpY3MlMjBib3R0bGV6JTIwcGlua3xlbnwxfHx8fDE3NjUzOTgzMTN8MA&ixlib=rb-4.1.0&q=80&w=1080"
                        alt="منتجات Ghada Beauty - منتجات عناية بالبشرة أصلية 100%"
                        width="1080"
                        height="1080"
                        class="w-full h-auto"
                        loading="eager"
                        onerror="this.src='{{ asset('images/hero-placeholder.jpg') }}'; this.onerror=null;"
                    />
                </div>
                <div class="absolute top-10 -right-10 w-48 h-48 bg-pink-300 rounded-full blur-3xl opacity-40 animate-pulse" aria-hidden="true"></div>
                <div class="absolute bottom-10 -left-10 w-48 h-48 bg-teal-300 rounded-full blur-3xl opacity-40 animate-pulse" aria-hidden="true"></div>
            </div>
        </div>
    </div>
</section>

{{-- Best Selling Products --}}
<section class="py-20 bg-gradient-to-br from-pink-50 via-white to-purple-50">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">🔥 المنتجات الأكثر مبيعًا</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">اكتشفي المنتجات الأعلى طلبًا من عملائنا</p>
        </div>

        @php
            $bestSellersProducts = $bestSellers ?? collect();
            $hasBestSellers = isset($bestSellersProducts) && $bestSellersProducts && is_countable($bestSellersProducts) && count($bestSellersProducts) > 0;
        @endphp
        @if($hasBestSellers)
        <div class="relative px-4" x-data="bestSellersSlider({{ count($bestSellersProducts) }})">
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-700 ease-in-out" :style="`transform: translateX(${currentSlide * (100 / slidesToShow)}%)`">
                    @foreach($bestSellersProducts as $product)
                    <div class="flex-shrink-0 px-3" :style="`width: ${100 / slidesToShow}%`">
                        <div class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-pink-100 hover:border-pink-300">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <div class="relative overflow-hidden aspect-square bg-gradient-to-br from-pink-50 to-purple-50">
                                    <img src="{{ $product->getMainImageUrl('medium') }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-gradient-to-r from-orange-500 to-pink-500 text-white text-xs px-4 py-2 rounded-full shadow-lg flex items-center gap-1.5 animate-pulse">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/></svg>
                                            الأكثر مبيعًا
                                        </span>
                                    </div>
                                    @if($product->skin_type)
                                    <div class="absolute top-4 right-4">
                                        <span class="bg-teal-500 text-white text-xs px-4 py-2 rounded-full shadow-lg backdrop-blur-sm">
                                            @switch($product->skin_type)
                                                @case('oily') بشرة دهنية @break
                                                @case('dry') بشرة جافة @break
                                                @case('combination') بشرة مختلطة @break
                                                @case('sensitive') بشرة حساسة @break
                                            @endswitch
                                        </span>
                                    </div>
                                    @endif
                                </div>
                            </a>
                            <div class="p-6">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-3 group-hover:text-pink-500 transition-colors min-h-[3rem] line-clamp-2">
                                        {{ $product->name }}
                                    </h4>
                                </a>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2 min-h-[2.5rem]">
                                    {{ Str::limit($product->description, 80) }}
                                </p>
                                <div class="flex items-center justify-between pt-2 border-t border-pink-50">
                                    <div>
                                        <span class="text-pink-600 text-2xl font-bold">{{ number_format($product->price, 0) }}</span>
                                        <span class="text-gray-500 text-sm mr-1">جنيه</span>
                                    </div>
                                    <button onclick="addToCart({{ $product->id }}, 1, event)" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-5 py-2.5 rounded-full text-sm hover:shadow-xl transition-all flex items-center gap-2 group-hover:scale-110 hover:from-pink-600 hover:to-teal-600">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                        <span>أضيفي للسلة</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center gap-2.5 mt-10">
                <template x-for="i in Math.ceil({{ count($bestSellersProducts) }} - slidesToShow + 1)" :key="i">
                    <button @click="goToSlide(i - 1)" :class="`h-2.5 rounded-full transition-all duration-300 ${currentSlide === (i - 1) ? 'w-8 bg-gradient-to-r from-pink-500 to-teal-500 shadow-md' : 'w-2.5 bg-gray-300 hover:bg-pink-300 hover:w-4'}`" :aria-label="`الذهاب إلى الشريحة ${i}`"></button>
                </template>
            </div>
        </div>
        <script>
        function bestSellersSlider(totalProducts) {
            return {
                currentSlide: 0,
                slidesToShow: 4,
                totalProducts: totalProducts,
                autoplayInterval: null,
                init() {
                    this.handleResize();
                    window.addEventListener('resize', () => this.handleResize());
                    this.startAutoplay();
                },
                handleResize() {
                    if (window.innerWidth < 480) {
                        this.slidesToShow = 1;
                    } else if (window.innerWidth < 768) {
                        this.slidesToShow = 2;
                    } else if (window.innerWidth < 1024) {
                        this.slidesToShow = 3;
                    } else {
                        this.slidesToShow = 4;
                    }
                },
                nextSlide() {
                    this.currentSlide = this.currentSlide >= this.totalProducts - this.slidesToShow ? 0 : this.currentSlide + 1;
                },
                prevSlide() {
                    this.currentSlide = this.currentSlide <= 0 ? this.totalProducts - this.slidesToShow : this.currentSlide - 1;
                },
                goToSlide(index) {
                    this.currentSlide = index;
                },
                startAutoplay() {
                    this.autoplayInterval = setInterval(() => {
                        this.nextSlide();
                    }, 3000);
                },
                stopAutoplay() {
                    clearInterval(this.autoplayInterval);
                }
            }
        }
        </script>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600">لا توجد منتجات متاحة حالياً</p>
        </div>
        @endif

        <div class="text-center mt-12">
            <a href="{{ route('products.index') }}" class="btn-primary inline-block">شوفي جميع المنتجات</a>
        </div>
    </div>
</section>

{{-- Why Choose Us --}}
<section class="py-20 bg-white">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">ليه تختاري Ghada Beauty؟</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">نوفر لكِ تجربة شراء آمنة ومريحة مع منتجات عالية الجودة</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">منتجات أصلية</h4>
                <p class="text-gray-600 text-sm">جميع منتجاتنا أصلية 100% ومضمونة</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">الدفع عند الاستلام</h4>
                <p class="text-gray-600 text-sm">ادفعي بعد ما توصلك المنتجات</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/></svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">توصيل سريع</h4>
                <p class="text-gray-600 text-sm">نوصل لجميع المحافظات في أسرع وقت</p>
            </div>

            <div class="text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-10 h-10 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-800 mb-2">استشارة قبل الشراء</h4>
                <p class="text-gray-600 text-sm">نساعدك في اختيار المنتجات المناسبة لبشرتك</p>
            </div>
        </div>
    </div>
</section>

{{-- Skin Routine CTA --}}
<section class="py-20 bg-white">
    <div class="container">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                <img src="https://images.unsplash.com/photo-1616750819574-7e38aa8046fa?w=800" alt="روتين العناية بالبشرة - اختاري الروتين المناسب لنوع بشرتك" width="800" height="600" class="w-full h-auto group-hover:scale-105 transition-transform duration-700" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-pink-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>

            <div class="space-y-6">
                <div class="inline-block bg-gradient-to-r from-pink-100 to-purple-100 px-4 py-2 rounded-full">
                    <span class="text-pink-600 text-sm">🌸 روتين مخصص</span>
                </div>

                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">اختاري روتين العناية المناسب لبشرتك</h2>
                
                <p class="text-gray-600 leading-relaxed">كل نوع بشرة له احتياجاته الخاصة. اكتشفي الروتين المثالي لبشرتك سواء كانت دهنية، جافة، مختلطة أو حساسة.</p>

                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('routine') }}" class="bg-gradient-to-br from-pink-50 to-pink-100 hover:from-pink-100 hover:to-pink-200 border-2 border-pink-200 hover:border-pink-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group">
                        <span class="text-3xl mb-2 block group-hover:scale-110 transition-transform">💧</span>
                        <span class="text-gray-700 font-medium">بشرة دهنية</span>
                    </a>
                    <a href="{{ route('routine') }}" class="bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 border-2 border-purple-200 hover:border-purple-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group">
                        <span class="text-3xl mb-2 block group-hover:scale-110 transition-transform">🌸</span>
                        <span class="text-gray-700 font-medium">بشرة جافة</span>
                    </a>
                    <a href="{{ route('routine') }}" class="bg-gradient-to-br from-teal-50 to-teal-100 hover:from-teal-100 hover:to-teal-200 border-2 border-teal-200 hover:border-teal-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group">
                        <span class="text-3xl mb-2 block group-hover:scale-110 transition-transform">✨</span>
                        <span class="text-gray-700 font-medium">بشرة مختلطة</span>
                    </a>
                    <a href="{{ route('routine') }}" class="bg-gradient-to-br from-pink-50 to-pink-100 hover:from-pink-100 hover:to-pink-200 border-2 border-pink-200 hover:border-pink-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group">
                        <span class="text-3xl mb-2 block group-hover:scale-110 transition-transform">🌿</span>
                        <span class="text-gray-700 font-medium">بشرة حساسة</span>
                    </a>
                </div>

                <a href="{{ route('routine') }}" class="btn-primary inline-block hover:scale-105 transform transition-all">شوفي جميع الروتينات</a>
            </div>
        </div>
    </div>
</section>

{{-- Customer Reviews --}}
<section class="py-20 bg-gradient-to-br from-pink-50 via-purple-50 to-teal-50">
    <div class="container">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">⭐ آراء عملائنا</h2>
            <p class="text-gray-600">شوفي تجارب العملاء مع منتجاتنا</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'سارة محمد', 'review' => 'منتجات رائعة وأصلية! بشرتي تحسنت كتير بعد استخدام السيروم والكريم المرطب.'],
                ['name' => 'نور أحمد', 'review' => 'خدمة ممتازة وتوصيل سريع. المنتجات جت في حالة ممتازة والدفع عند الاستلام ريحني كتير.'],
                ['name' => 'ياسمين علي', 'review' => 'أفضل منتجات عناية بالبشرة جربتها! النتائج ظهرت بسرعة والأسعار معقولة جداً.']
            ] as $review)
            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-pink-100 hover:border-pink-300 hover:-translate-y-2 group">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 fill-yellow-400 text-yellow-400 group-hover:scale-125 transition-transform" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 mb-6 leading-relaxed">"{{ $review['review'] }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-pink-50">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-purple-400 rounded-full flex items-center justify-center text-white font-bold">
                        {{ mb_substr($review['name'], 0, 1) }}
                    </div>
                    <p class="text-pink-600 font-medium">{{ $review['name'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA Banner --}}
<section class="py-20 bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500">
    <div class="container">
        <div class="text-center text-white space-y-6 max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white">مش عارفة تختاري إيه؟</h2>
            <p class="text-lg text-white/90">كلمينا على الواتساب وهنساعدك تختاري الروتين المناسب لبشرتك</p>
            <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="inline-block bg-white text-pink-600 px-8 py-4 rounded-full hover:bg-pink-50 transition-all shadow-xl hover:scale-105 font-semibold">
                تواصلي معنا الآن
            </a>
        </div>
    </div>
</section>
@endsection

