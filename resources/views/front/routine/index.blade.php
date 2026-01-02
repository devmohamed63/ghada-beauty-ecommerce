@extends('front.layouts.app')

@section('title', 'روتين العناية بالبشرة - اختاري الروتين المناسب لنوع بشرتك | Ghada Beauty')

@section('description', 'اكتشفي الروتين المثالي للعناية بالبشرة حسب نوع بشرتك. روتين صباحي ومسائي مخصص للبشرة الدهنية، الجافة، المختلطة والحساسة. منتجات أصلية 100% من Ghada Beauty.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50" x-data="skinRoutine()">
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div class="container">
            <h1 class="text-white text-center mb-4 text-4xl md:text-5xl font-bold">روتين العناية بالبشرة</h1>
            <p class="text-white/90 text-center text-lg">اختاري الروتين المثالي لنوع بشرتك</p>
        </div>
    </div>

    <div class="container py-12">
        {{-- Skin Type Selection --}}
        <div class="bg-white rounded-2xl shadow-sm p-6 mb-8 border border-pink-50">
            <h3 class="text-gray-800 mb-4">اختاري نوع بشرتك</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $skinTypeImages = [
                        'دهنية' => 'https://images.unsplash.com/photo-1556229010-aa3f7ff66b24?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmYWNpYWwlMjBjbGVhbnNlciUyMGJvdHRsZXxlbnwxfHx8fDE3NjUzMzE4OTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
                        'جافة' => 'https://images.unsplash.com/photo-1519668963014-2308b08e5e9b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxoeWRyYXRpbmclMjBjcmVhbSUyMG1vaXN0dXJpemVyfGVufDF8fHx8MTc2NTM5OTA0MXww&ixlib=rb-4.1.0&q=80&w=1080',
                        'مختلطة' => 'https://images.unsplash.com/photo-1642505172812-15cf294b1212?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMGNvc21ldGljcyUyMHBpbmslMjBjcmVhbXxlbnwxfHx8fDE3NjUzOTkwNDF8MA&ixlib=rb-4.1.0&q=80&w=1080',
                        'حساسة' => 'https://images.unsplash.com/photo-1643747394944-89b11e7fb616?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnZW50bGUlMjBza2luY2FyZSUyMHNlcnVtfGVufDF8fHx8MTc2NTM5OTA0Mnww&ixlib=rb-4.1.0&q=80&w=1080'
                    ];
                @endphp
                @if(isset($skinRoutines) && $skinRoutines && is_array($skinRoutines) && count($skinRoutines) > 0)
                @foreach($skinRoutines as $routine)
                <button @click="selectSkinType('{{ $routine['type'] }}')" :class="selectedType === '{{ $routine['type'] }}' ? 'border-pink-500 shadow-lg scale-105' : 'border-gray-200 hover:border-pink-300'" class="relative overflow-hidden rounded-xl text-center transition-all border-2 group">
                    {{-- Background Image --}}
                    <div class="relative h-48">
                        <img src="{{ $skinTypeImages[$routine['type']] ?? '' }}" alt="روتين العناية بالبشرة {{ $routine['type'] }} - منتجات Ghada Beauty" width="400" height="300" class="w-full h-full object-cover" loading="lazy">
                        <div :class="selectedType === '{{ $routine['type'] }}' ? 'bg-gradient-to-t from-pink-600/90 via-purple-500/80 to-pink-400/60' : 'bg-gradient-to-t from-gray-900/70 via-gray-900/50 to-gray-900/30 group-hover:from-pink-600/70 group-hover:via-purple-500/60 group-hover:to-pink-400/40'" class="absolute inset-0 transition-all"></div>
                    </div>
                    
                    {{-- Text Overlay --}}
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <div class="text-4xl mb-2 drop-shadow-lg">
                            @if($routine['type'] === 'دهنية') 💧
                            @elseif($routine['type'] === 'جافة') 🌸
                            @elseif($routine['type'] === 'مختلطة') ✨
                            @elseif($routine['type'] === 'حساسة') 🌿
                            @endif
                        </div>
                        <span class="text-white drop-shadow-lg">بشرة {{ $routine['type'] }}</span>
                    </div>
                </button>
                @endforeach
                @else
                <div class="col-span-4 text-center py-8">
                    <p class="text-gray-600">لا توجد روتينات متاحة حالياً</p>
                </div>
                @endif
            </div>
        </div>

        {{-- Morning/Evening Toggle --}}
        <div class="flex justify-center mb-8">
            <div class="bg-white rounded-full shadow-sm p-2 inline-flex border border-pink-100">
                <button @click="activeTime = 'morning'" :class="activeTime === 'morning' ? 'bg-gradient-to-r from-yellow-400 to-orange-400 text-white shadow-md' : 'text-gray-600 hover:text-gray-800'" class="flex items-center gap-2 px-6 py-3 rounded-full transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"/></svg>
                    <span>الروتين الصباحي</span>
                </button>
                <button @click="activeTime = 'evening'" :class="activeTime === 'evening' ? 'bg-gradient-to-r from-purple-500 to-indigo-500 text-white shadow-md' : 'text-gray-600 hover:text-gray-800'" class="flex items-center gap-2 px-6 py-3 rounded-full transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/></svg>
                    <span>الروتين المسائي</span>
                </button>
            </div>
        </div>

        {{-- Routine Steps --}}
        <div class="space-y-6">
            <template x-if="currentSteps && currentSteps.length > 0">
                <template x-for="(step, index) in currentSteps" :key="index">
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-pink-50 hover:shadow-lg transition-all">
                        <div class="grid md:grid-cols-3 gap-6 p-6">
                            {{-- Step Info --}}
                            <div class="md:col-span-2 space-y-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-purple-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-xl" x-text="step.step"></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-800" x-text="step.title"></h4>
                                        <p class="text-gray-500 text-sm" x-text="step.description"></p>
                                    </div>
                                </div>

                                <template x-if="step.productId">
                                    <div class="pr-15 space-y-2">
                                        <p class="text-pink-600">
                                            المنتج المقترح: <span x-text="step.productName || 'منتج مقترح'"></span>
                                        </p>
                                        <p class="text-gray-600 text-sm line-clamp-2" x-text="step.productDescription || ''"></p>
                                        <div class="flex items-center gap-4">
                                            <span class="text-pink-600 text-xl" x-text="(step.productPrice || 0) + ' جنيه'"></span>
                                            <a :href="'/products/' + (step.productSlug || '')" class="text-teal-600 hover:text-teal-700 text-sm underline">تفاصيل المنتج</a>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            {{-- Product Image & CTA --}}
                            <template x-if="step.productId">
                                <div class="flex flex-col items-center justify-center gap-4">
                                    <div class="w-32 h-32 rounded-xl overflow-hidden shadow-md">
                                        <img :src="step.productImage || '/images/product-placeholder.jpg'" :alt="step.productName || 'منتج عناية بالبشرة'" width="128" height="128" class="w-full h-full object-cover" loading="lazy">
                                    </div>
                                    <a :href="'/checkout?product=' + step.productId" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-4 py-2 rounded-full text-sm hover:shadow-lg transition-all flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                        <span>اطلبي الآن</span>
                                    </a>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </template>

            <template x-if="!currentSteps || currentSteps.length === 0">
                <div class="bg-white rounded-2xl shadow-sm p-12 text-center border border-pink-50">
                    <p class="text-gray-500 text-lg">اختاري نوع بشرتك لعرض الروتين المناسب</p>
                </div>
            </template>
        </div>

        {{-- Tips Section --}}
        <div class="mt-12 bg-gradient-to-br from-teal-50 to-pink-50 rounded-2xl p-8 border border-teal-100">
            <h3 class="text-gray-800 mb-4">نصائح مهمة</h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <span class="text-teal-500 text-xl flex-shrink-0">✓</span>
                    <span class="text-gray-700">استخدمي المنتجات بانتظام للحصول على أفضل النتائج</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-teal-500 text-xl flex-shrink-0">✓</span>
                    <span class="text-gray-700">احرصي على استخدام واقي الشمس يومياً حتى في الأيام الغائمة</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-teal-500 text-xl flex-shrink-0">✓</span>
                    <span class="text-gray-700">اشربي كمية كافية من الماء يومياً للحفاظ على ترطيب البشرة</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-teal-500 text-xl flex-shrink-0">✓</span>
                    <span class="text-gray-700">في حالة الحساسية أو التهيج، توقفي عن الاستخدام واستشيري طبيب الجلدية</span>
                </li>
            </ul>
        </div>

        {{-- CTA --}}
        <div class="mt-12 text-center bg-white rounded-2xl p-8 shadow-sm border border-pink-50">
            <h3 class="text-gray-800 mb-3">محتاجة مساعدة في اختيار المنتجات؟</h3>
            <p class="text-gray-600 mb-6">تواصلي معنا على الواتساب وهنساعدك تختاري الروتين المناسب لبشرتك</p>
            <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="btn-primary inline-block">تواصلي معنا الآن</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
window.productsData = @json($products);
</script>
@endpush

<script>
function skinRoutine() {
    return {
        selectedType: '{{ $skinRoutines[0]['type'] ?? 'دهنية' }}',
        activeTime: 'morning',
        
        routines: @json($skinRoutines),
        
        get currentRoutine() {
            return this.routines.find(r => r.type === this.selectedType) || this.routines[0];
        },
        
        get currentSteps() {
            if (!this.currentRoutine) return [];
            
            const steps = this.currentRoutine[this.activeTime] || [];
            
            // Enhance steps with product data if productId exists
            return steps.map(step => {
                if (step.productId) {
                    const product = window.productsData?.find(p => p.id == step.productId);
                    if (product) {
                        return {
                            ...step,
                            productName: product.name,
                            productDescription: product.description,
                            productPrice: product.price,
                            productImage: product.image,
                            productSlug: product.slug
                        };
                    }
                }
                return step;
            });
        },
        
        selectSkinType(type) {
            this.selectedType = type;
        }
    }
}
</script>
@endsection
