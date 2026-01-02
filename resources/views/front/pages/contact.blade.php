@extends('front.layouts.app')

@section('title', 'تواصل معنا - Ghada Beauty | واتساب - تليجرام - فيسبوك')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div class="container">
            <h1 class="text-white text-center mb-4">تواصل معنا</h1>
            <p class="text-white/90 text-center text-lg">نحن هنا للإجابة على جميع استفساراتك</p>
        </div>
    </div>

    <div class="container py-12">
        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            {{-- Contact Info --}}
            <div class="space-y-8">
                <div>
                    <h2 class="text-gray-800 mb-6">كلمينا بأي طريقة تناسبك</h2>
                    <p class="text-gray-600 leading-relaxed">
                        فريقنا جاهز لمساعدتك في اختيار المنتجات المناسبة لبشرتك والإجابة على جميع استفساراتك. تواصلي معنا الآن!
                    </p>
                </div>

                {{-- Contact Methods --}}
                <div class="space-y-6">
                    {{-- Phone --}}
                    <a href="tel:01067565298" class="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-pink-50 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 mb-1">اتصلي بنا</h4>
                            <p class="text-pink-600 mb-1 dir-ltr text-right">01067565298</p>
                            <p class="text-gray-500 text-sm">متاحين للرد على مكالماتك</p>
                        </div>
                    </a>

                    {{-- WhatsApp --}}
                    <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-teal-50 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-teal-600" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 mb-1">واتساب</h4>
                            <p class="text-teal-600 mb-1 dir-ltr text-right">01067565298</p>
                            <p class="text-gray-500 text-sm">راسلينا في أي وقت</p>
                        </div>
                    </a>

                    {{-- Telegram --}}
                    <a href="https://t.me/kayancosmatics1" target="_blank" rel="noopener noreferrer" class="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-purple-50 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 mb-1">تيليجرام</h4>
                            <p class="text-purple-600 mb-1">@kayancosmatics1</p>
                            <p class="text-gray-500 text-sm">تواصلي معنا على تيليجرام</p>
                        </div>
                    </a>

                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/share/1H6JY4fnzh/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-pink-50 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-100 to-purple-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-pink-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 mb-1">فيسبوك</h4>
                            <p class="text-pink-600 mb-1">Ghada Beauty</p>
                            <p class="text-gray-500 text-sm">تابعينا على فيسبوك</p>
                        </div>
                    </a>

                    {{-- Location --}}
                    <div class="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-teal-50">
                        <div class="w-14 h-14 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-7 h-7 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 mb-1">موقعنا</h4>
                            <p class="text-gray-600">القاهرة – مصر</p>
                            <p class="text-gray-500 text-sm mt-2">نوصل لجميع المحافظات</p>
                        </div>
                    </div>
                </div>

                {{-- Website Link --}}
                <div class="bg-gradient-to-br from-pink-100 to-purple-100 rounded-2xl p-6 border border-pink-200">
                    <h4 class="text-gray-800 mb-2">موقعنا الإلكتروني</h4>
                    <a href="https://0.yallashop.co/ar/home" target="_blank" rel="noopener noreferrer" class="text-pink-600 hover:text-pink-700 underline break-all">
                        https://0.yallashop.co/ar/home
                    </a>
                </div>
            </div>

            {{-- Image & CTA --}}
            <div class="space-y-8">
                <div class="relative rounded-3xl overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBjb3NtZXRpY3MlMjBib3R0bGVzJTIwcGlua3xlbnwxfHx8fDE3NjUzOTgzMTN8MA&ixlib=rb-4.1.0&q=80&w=1080" alt="تواصل معنا - Ghada Beauty" width="1080" height="720" class="w-full h-auto" loading="lazy">
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-sm border border-pink-50">
                    <h3 class="text-gray-800 mb-4">ساعات العمل</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">السبت - الخميس</span>
                            <span class="text-gray-800">9:00 ص - 9:00 م</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">الجمعة</span>
                            <span class="text-gray-800">2:00 م - 9:00 م</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 rounded-2xl p-8 text-white text-center">
                    <h3 class="text-white mb-3">عايزة تعرفي إيه المناسب لبشرتك؟</h3>
                    <p class="text-white/90 mb-6 text-sm">كلمينا على الواتساب واحصلي على استشارة مجانية</p>
                    <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="inline-block bg-white text-pink-600 px-6 py-3 rounded-full hover:bg-pink-50 transition-all shadow-lg hover:scale-105">
                        تواصلي معنا الآن
                    </a>
                </div>

                <div class="bg-teal-50 rounded-2xl p-6 border border-teal-100">
                    <h4 class="text-gray-800 mb-3">ليه تختاري Ghada Beauty؟</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-teal-500">✓</span>
                            منتجات أصلية 100%
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-teal-500">✓</span>
                            الدفع عند الاستلام
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-teal-500">✓</span>
                            توصيل لجميع المحافظات
                        </li>
                        <li class="flex items-center gap-2 text-gray-700">
                            <span class="text-teal-500">✓</span>
                            استشارة مجانية
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
