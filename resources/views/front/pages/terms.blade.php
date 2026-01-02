@extends('front.layouts.app')

@section('title', 'الشروط والأحكام - Ghada Beauty')

@section('description', 'الشروط والأحكام لاستخدام موقع Ghada Beauty - تعرفي على شروط الشراء والاستخدام')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div class="container">
            <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-4">الشروط والأحكام</h1>
            <p class="text-white/90 text-center text-lg">شروط استخدام موقعنا وشراء منتجاتنا</p>
        </div>
    </div>

    <div class="container py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12">
            <div class="prose prose-lg max-w-none text-gray-700 space-y-8">
                
                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">1. القبول بالشروط</h2>
                    <p class="leading-relaxed mb-4">
                        مرحباً بك في <strong>Ghada Beauty</strong>. باستخدامك لموقعنا الإلكتروني أو شرائك لمنتجاتنا، فإنك توافقين على الالتزام بهذه الشروط والأحكام. إذا كنت لا توافقين على أي من هذه الشروط، يرجى عدم استخدام موقعنا.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">2. معلومات عنا</h2>
                    <p class="leading-relaxed mb-4">
                        <strong>Ghada Beauty</strong> هو متجر إلكتروني متخصص في بيع منتجات العناية بالبشرة والشعر الأصلية 100%.
                    </p>
                    <div class="bg-teal-50 rounded-xl p-6 mt-4">
                        <p class="mb-2"><strong>الهاتف:</strong> <a href="tel:01067565298" class="text-teal-600 hover:underline">01067565298</a></p>
                        <p class="mb-2"><strong>واتساب:</strong> <a href="https://wa.me/201067565298" target="_blank" class="text-teal-600 hover:underline">01067565298</a></p>
                        <p><strong>الموقع:</strong> القاهرة – مصر</p>
                    </div>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">3. المنتجات والأسعار</h2>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">أ. جودة المنتجات</h3>
                    <p class="leading-relaxed mb-4">
                        نضمن أن جميع منتجاتنا أصلية 100% ومختارة بعناية. نحن ملتزمون بتقديم منتجات عالية الجودة وآمنة للاستخدام.
                    </p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ب. الأسعار</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>جميع الأسعار معروضة بالجنيه المصري</li>
                        <li>نحتفظ بالحق في تعديل الأسعار في أي وقت دون إشعار مسبق</li>
                        <li>الأسعار المعروضة على الموقع هي الأسعار النهائية (شاملة الضرائب إن وجدت)</li>
                        <li>في حالة وجود خطأ في السعر، سنتواصل معك لإبلاغك بالتصحيح</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ج. توفر المنتجات</h3>
                    <p class="leading-relaxed mb-4">
                        نحاول الحفاظ على توفر جميع المنتجات، لكن قد ينفد المخزون أحياناً. إذا كان المنتج غير متوفر، سنخطرك في أقرب وقت ممكن.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">4. الطلبات والدفع</h2>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">أ. تقديم الطلب</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>عند تقديم طلب، يجب تقديم معلومات دقيقة وكاملة</li>
                        <li>أنت مسؤولة عن التأكد من صحة معلومات الشحن</li>
                        <li>نحتفظ بالحق في رفض أو إلغاء أي طلب لأي سبب</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ب. طرق الدفع</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li><strong>الدفع عند الاستلام:</strong> نقدم خدمة الدفع عند الاستلام لجميع المحافظات</li>
                        <li>يجب دفع المبلغ كاملاً عند استلام الطلب</li>
                        <li>في حالة رفض استلام الطلب، قد يتم تطبيق رسوم إضافية</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ج. تأكيد الطلب</h3>
                    <p class="leading-relaxed mb-4">
                        بعد تقديم الطلب، سنرسل لك رسالة تأكيد عبر الهاتف أو الواتساب. هذا التأكيد لا يعني قبول طلبك، بل مجرد استلامه. نحتفظ بالحق في قبول أو رفض طلبك.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">5. الشحن والتوصيل</h2>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>نوصل لجميع محافظات مصر</li>
                        <li>مدة التوصيل عادة من 2-7 أيام عمل حسب الموقع</li>
                        <li>رسوم الشحن قد تطبق حسب الموقع (سيتم إبلاغك بها عند الطلب)</li>
                        <li>نحاول توصيل الطلب في الوقت المحدد، لكن قد تحدث تأخيرات بسبب ظروف خارجة عن إرادتنا</li>
                        <li>أنت مسؤولة عن التأكد من وجود شخص لاستلام الطلب في العنوان المحدد</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">6. الإرجاع والاستبدال</h2>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">أ. حق الإرجاع</h3>
                    <p class="leading-relaxed mb-4">
                        يمكنك إرجاع المنتج خلال 7 أيام من تاريخ الاستلام في الحالات التالية:
                    </p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>إذا كان المنتج تالفاً أو معيباً</li>
                        <li>إذا كان المنتج مختلفاً عما طلبته</li>
                        <li>إذا كان المنتج غير صالح للاستخدام</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ب. شروط الإرجاع</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>يجب أن يكون المنتج في حالته الأصلية (غير مستخدم)</li>
                        <li>يجب الاحتفاظ بالعبوة الأصلية والفواتير</li>
                        <li>يجب التواصل معنا قبل إرجاع المنتج</li>
                        <li>رسوم الشحن للإرجاع قد تطبق حسب الحالة</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ج. الاستبدال</h3>
                    <p class="leading-relaxed mb-4">
                        يمكن استبدال المنتج بمنتج آخر بنفس القيمة أو أعلى (مع دفع الفرق). الاستبدال متاح خلال 7 أيام من الاستلام.
                    </p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">د. استرداد الأموال</h3>
                    <p class="leading-relaxed mb-4">
                        في حالة الموافقة على الإرجاع، سيتم استرداد المبلغ خلال 5-10 أيام عمل من تاريخ استلام المنتج المرتجع.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">7. استخدام الموقع</h2>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>يجب استخدام الموقع للأغراض القانونية فقط</li>
                        <li>يُمنع استخدام الموقع لأي غرض غير قانوني أو ضار</li>
                        <li>يُمنع محاولة الوصول غير المصرح به إلى الموقع أو أنظمته</li>
                        <li>نحتفظ بالحق في منع الوصول لأي مستخدم ينتهك هذه الشروط</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">8. الملكية الفكرية</h2>
                    <p class="leading-relaxed mb-4">
                        جميع المحتويات الموجودة على الموقع (النصوص، الصور، الشعارات، التصاميم) هي ملك لـ <strong>Ghada Beauty</strong> ومحمية بموجب قوانين الملكية الفكرية. يُمنع نسخ أو استخدام أي من هذه المحتويات دون إذن كتابي منا.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">9. المسؤولية</h2>
                    <p class="leading-relaxed mb-4">
                        نحن نبذل قصارى جهدنا لضمان دقة المعلومات على الموقع، لكننا لا نضمن خلو الموقع من الأخطاء. نحن غير مسؤولين عن:
                    </p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>أي أضرار ناتجة عن استخدام أو عدم القدرة على استخدام الموقع</li>
                        <li>أي أضرار غير مباشرة أو تبعية</li>
                        <li>أي تأخير في التوصيل بسبب ظروف خارجة عن إرادتنا</li>
                        <li>أي مشاكل ناتجة عن استخدام المنتجات بشكل غير صحيح</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">10. الحساسية والاستخدام الآمن</h2>
                    <p class="leading-relaxed mb-4">
                        <strong>تنبيه مهم:</strong> قبل استخدام أي منتج، يرجى:
                    </p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>قراءة التعليمات والتحذيرات على العبوة</li>
                        <li>إجراء اختبار حساسية على منطقة صغيرة من الجلد</li>
                        <li>استشارة طبيب الجلدية إذا كان لديك أي حالة جلدية</li>
                        <li>التوقف عن الاستخدام فوراً في حالة حدوث أي تهيج أو رد فعل</li>
                    </ul>
                    <p class="leading-relaxed">
                        نحن غير مسؤولين عن أي ردود فعل تحسسية أو مشاكل صحية ناتجة عن استخدام المنتجات.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">11. التعديلات على الشروط</h2>
                    <p class="leading-relaxed mb-4">
                        نحتفظ بالحق في تعديل هذه الشروط والأحكام في أي وقت. سيتم نشر التعديلات على هذه الصفحة. استمرارك في استخدام الموقع بعد التعديلات يعني موافقتك على الشروط الجديدة.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">12. القانون الحاكم</h2>
                    <p class="leading-relaxed mb-4">
                        تخضع هذه الشروط والأحكام للقوانين المصرية. أي نزاع ينشأ عن هذه الشروط سيتم حله في المحاكم المختصة في مصر.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">13. التواصل معنا</h2>
                    <p class="leading-relaxed mb-4">
                        إذا كان لديك أي أسئلة حول هذه الشروط والأحكام، يرجى التواصل معنا:
                    </p>
                    <div class="bg-pink-50 rounded-xl p-6 mt-4">
                        <p class="mb-2"><strong>الهاتف:</strong> <a href="tel:01067565298" class="text-pink-600 hover:underline">01067565298</a></p>
                        <p class="mb-2"><strong>واتساب:</strong> <a href="https://wa.me/201067565298" target="_blank" class="text-pink-600 hover:underline">01067565298</a></p>
                        <p><strong>الموقع:</strong> القاهرة – مصر</p>
                    </div>
                </section>

                <div class="border-t border-gray-200 pt-6 mt-8">
                    <p class="text-sm text-gray-500">
                        <strong>آخر تحديث:</strong> {{ date('Y-m-d') }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

