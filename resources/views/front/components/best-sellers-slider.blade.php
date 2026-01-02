{{-- Best Sellers Slider Component --}}
@if(isset($products) && $products && is_countable($products) && count($products) > 0)
<div class="relative px-4" x-data="bestSellersSlider({{ count($products) }})">
    {{-- Slider Container --}}
    <div class="overflow-hidden">
        <div class="flex transition-transform duration-700 ease-in-out" :style="`transform: translateX(${currentSlide * (100 / slidesToShow)}%)`">
            @foreach($products as $product)
            <div class="flex-shrink-0 px-3" :style="`width: ${100 / slidesToShow}%`">
                <div class="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-pink-100 hover:border-pink-300">
                    <a href="{{ route('products.show', $product->slug) }}">
                        <div class="relative overflow-hidden aspect-square bg-gradient-to-br from-pink-50 to-purple-50">
                            <img src="{{ $product->getMainImageUrl('medium') }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            
                            {{-- Best Seller Tag --}}
                            <div class="absolute top-4 left-4">
                                <span class="bg-gradient-to-r from-orange-500 to-pink-500 text-white text-xs px-4 py-2 rounded-full shadow-lg flex items-center gap-1.5 animate-pulse">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"/></svg>
                                    الأكثر مبيعًا
                                </span>
                            </div>

                            {{-- Skin Type Tag --}}
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

    {{-- Navigation Arrows - Hidden on mobile --}}
    <template x-if="slidesToShow < {{ count($products) }}">
        <div>
            <button @click="prevSlide()" class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-12 h-12 bg-white rounded-full shadow-xl items-center justify-center text-pink-500 hover:bg-pink-500 hover:text-white transition-all hover:scale-110 border-2 border-pink-100" aria-label="التالي">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
            
            <button @click="nextSlide()" class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 w-12 h-12 bg-white rounded-full shadow-xl items-center justify-center text-pink-500 hover:bg-pink-500 hover:text-white transition-all hover:scale-110 border-2 border-pink-100" aria-label="السابق">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
        </div>
    </template>

    {{-- Dots Indicator --}}
    <div class="flex justify-center gap-2.5 mt-10">
        <template x-for="i in Math.ceil({{ count($products) }} - slidesToShow + 1)" :key="i">
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
