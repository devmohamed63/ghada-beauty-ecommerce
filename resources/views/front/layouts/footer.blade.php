{{-- Footer Component --}}
<footer class="bg-gradient-to-br from-pink-50 via-purple-50 to-teal-50 pt-16 pb-8 mt-20">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            {{-- Brand Info --}}
            <div>
                <h4 class="text-xl font-bold text-pink-600 mb-4">Ghada Beauty</h4>
                <p class="text-gray-600 mb-4 leading-relaxed text-sm">
                    منتجات أصلية 100% للعناية بالبشرة والشعر. تفتيح – ترطيب – علاج – نضارة
                </p>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/share/1H6JY4fnzh/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-pink-500 hover:bg-pink-500 hover:text-white transition-all shadow-sm" aria-label="Facebook">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-teal-500 hover:bg-teal-500 hover:text-white transition-all shadow-sm" aria-label="WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-lg font-bold text-gray-800 mb-4">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-pink-500 transition-colors text-sm">الرئيسية</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-pink-500 transition-colors text-sm">المنتجات</a></li>
                    <li><a href="{{ route('routine') }}" class="text-gray-600 hover:text-pink-500 transition-colors text-sm">روتين البشرة</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-pink-500 transition-colors text-sm">من نحن</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-pink-500 transition-colors text-sm">تواصل معنا</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="text-lg font-bold text-gray-800 mb-4">تواصل معنا</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2 text-gray-600 text-sm">
                        <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                        <div>
                            <a href="tel:01067565298" class="hover:text-pink-500 transition-colors">01067565298</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-2 text-gray-600 text-sm">
                        <svg class="w-5 h-5 text-teal-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        <div>
                            <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="hover:text-teal-500 transition-colors">واتساب: 01067565298</a>
                        </div>
                    </li>
                    <li class="flex items-start gap-2 text-gray-600 text-sm">
                        <svg class="w-5 h-5 text-pink-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span>القاهرة – مصر</span>
                    </li>
                </ul>
            </div>

            {{-- Policies --}}
            <div>
                <h4 class="text-lg font-bold text-gray-800 mb-4">معلومات مهمة</h4>
                <ul class="space-y-2">
                    <li class="text-gray-600 text-sm flex items-center gap-2">
                        <span class="text-teal-500 font-bold">✓</span>
                        <span>منتجات أصلية 100%</span>
                    </li>
                    <li class="text-gray-600 text-sm flex items-center gap-2">
                        <span class="text-teal-500 font-bold">✓</span>
                        <span>الدفع عند الاستلام</span>
                    </li>
                    <li class="text-gray-600 text-sm flex items-center gap-2">
                        <span class="text-teal-500 font-bold">✓</span>
                        <span>توصيل لجميع المحافظات</span>
                    </li>
                    <li class="text-gray-600 text-sm flex items-center gap-2">
                        <span class="text-teal-500 font-bold">✓</span>
                        <span>استشارة مجانية</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-pink-100 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-gray-600 text-center md:text-right text-sm">
                &copy; {{ date('Y') }} Ghada Beauty - جميع الحقوق محفوظة
            </p>
            <div class="flex gap-4 text-sm">
                <a href="{{ route('privacy') }}" class="text-gray-600 hover:text-pink-500 transition-colors">سياسة الخصوصية</a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('terms') }}" class="text-gray-600 hover:text-pink-500 transition-colors">الشروط والأحكام</a>
            </div>
        </div>
    </div>
</footer>
