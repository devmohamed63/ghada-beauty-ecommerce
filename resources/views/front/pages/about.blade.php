@extends('front.layouts.app')

@section('title', 'من نحن - Ghada Beauty | قصتنا ورؤيتنا')

@section('description', 'تعرفي على Ghada Beauty - متخصصون في توفير أفضل منتجات العناية بالبشرة والشعر الأصلية 100%. منتجات مصرية أصلية بأسعار مناسبة.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div class="container">
            <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-4">من نحن</h1>
            <p class="text-white/90 text-center text-lg">تعرفي على قصتنا ورؤيتنا</p>
        </div>
    </div>

    <div class="container py-12">
        {{-- About Section --}}
        <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
            <div class="relative rounded-3xl overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1618478122572-6f943315c08c?w=800" alt="Ghada Beauty - منتجات عناية بالبشرة أصلية 100%" width="800" height="600" class="w-full h-auto" loading="lazy">
            </div>

            <div class="space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Ghada Beauty
                    <br />
                    <span class="text-pink-600">Ghada Beauty</span>
                </h2>
                
                <p class="text-gray-600 leading-relaxed">
                    نحن متخصصون في توفير أفضل منتجات العناية بالبشرة والشعر الأصلية 100%. 
                    نؤمن بأن كل امرأة تستحق الحصول على بشرة صحية ونضرة وشعر قوي وجميل.
                </p>

                <p class="text-gray-600 leading-relaxed">
                    بدأت رحلتنا من شغفنا بعالم التجميل والعناية بالبشرة، ومن رغبتنا في مساعدة 
                    النساء على الشعور بالثقة والجمال. نختار منتجاتنا بعناية فائقة لضمان الجودة 
                    والفعالية، ونوفرها بأسعار مناسبة للجميع.
                </p>

                <p class="text-gray-600 leading-relaxed">
                    نفخر بتقديم خدمة عملاء متميزة، حيث نساعد كل عميلة في اختيار المنتجات 
                    المناسبة لنوع بشرتها واحتياجاتها الخاصة. رضاكم هو نجاحنا.
                </p>
            </div>
        </div>

        {{-- Values --}}
        <div class="mb-20">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12">قيمنا ومبادئنا</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-pink-50 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">الأصالة والجودة</h4>
                    <p class="text-gray-600 text-sm">جميع منتجاتنا أصلية 100% من مصادر موثوقة</p>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-teal-50 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">الأمان والثقة</h4>
                    <p class="text-gray-600 text-sm">نوفر تجربة شراء آمنة مع الدفع عند الاستلام</p>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-purple-50 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">الاهتمام بالعملاء</h4>
                    <p class="text-gray-600 text-sm">نقدم استشارات مجانية ودعم مستمر لكل عميلة</p>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-pink-50 hover:shadow-lg transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">المصداقية</h4>
                    <p class="text-gray-600 text-sm">نبني علاقات طويلة الأمد مع عملائنا بالصدق والشفافية</p>
                </div>
            </div>
        </div>

        {{-- Why Trust Us --}}
        <div class="bg-gradient-to-br from-pink-100 via-purple-100 to-teal-100 rounded-3xl p-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12">ليه تثقي في Ghada Beauty؟</h2>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold">✓</div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">منتجات أصلية مضمونة</h4>
                        <p class="text-gray-600 text-sm">نتعامل مع موزعين معتمدين ونضمن أصالة كل منتج</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center text-white text-xl font-bold">✓</div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">خدمة عملاء متميزة</h4>
                        <p class="text-gray-600 text-sm">فريق متخصص جاهز لمساعدتك في أي وقت</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white text-xl font-bold">✓</div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">توصيل سريع وآمن</h4>
                        <p class="text-gray-600 text-sm">نوصل لجميع المحافظات بأسرع وقت ممكن</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center text-white text-xl font-bold">✓</div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">أسعار منافسة</h4>
                        <p class="text-gray-600 text-sm">أفضل الأسعار مع ضمان الجودة العالية</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center text-white text-xl font-bold">✓</div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">استشارات مجانية</h4>
                        <p class="text-gray-600 text-sm">نساعدك في اختيار الروتين المناسب لبشرتك</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white text-xl font-bold">✓</div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">راحة بالك مضمونة</h4>
                        <p class="text-gray-600 text-sm">الدفع عند الاستلام - ادفعي لما توصلك المنتجات</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="mt-16 text-center">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">جاهزة تبدأي رحلتك معانا؟</h3>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">اكتشفي منتجاتنا واختاري الروتين المناسب لبشرتك</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="btn-primary">تصفح المنتجات</a>
                <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="btn-secondary">تواصلي معنا</a>
            </div>
        </div>
    </div>
</div>
@endsection

