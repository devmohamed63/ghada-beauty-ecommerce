@extends('front.layouts.app')

@section('title', 'سياسة الخصوصية - Ghada Beauty')

@section('description', 'سياسة الخصوصية لموقع Ghada Beauty - تعرفي على كيفية حماية بياناتك الشخصية ومعلوماتك')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
    {{-- Page Header --}}
    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div class="container">
            <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-4">سياسة الخصوصية</h1>
            <p class="text-white/90 text-center text-lg">حماية خصوصيتك وبياناتك الشخصية</p>
        </div>
    </div>

    <div class="container py-12">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-12">
            <div class="prose prose-lg max-w-none text-gray-700 space-y-8">
                
                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">1. مقدمة</h2>
                    <p class="leading-relaxed mb-4">
                        نحن في <strong>Ghada Beauty</strong> نلتزم بحماية خصوصيتك وبياناتك الشخصية. تشرح هذه السياسة كيفية جمع واستخدام وحماية المعلومات التي تقدمينها لنا عند استخدام موقعنا الإلكتروني أو خدماتنا.
                    </p>
                    <p class="leading-relaxed">
                        باستخدامك لموقعنا، فإنك توافقين على ممارسات جمع واستخدام المعلومات الموضحة في هذه السياسة.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">2. المعلومات التي نجمعها</h2>
                    <p class="leading-relaxed mb-4">نجمع الأنواع التالية من المعلومات:</p>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">أ. المعلومات الشخصية</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>الاسم الكامل</li>
                        <li>رقم الهاتف</li>
                        <li>عنوان البريد الإلكتروني (إذا قدمتيه)</li>
                        <li>عنوان الشحن والتوصيل</li>
                        <li>المحافظة والمدينة</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ب. معلومات الطلب</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>تفاصيل المنتجات التي تطلبينها</li>
                        <li>معلومات الدفع (نحن لا نخزن بيانات بطاقات الائتمان)</li>
                        <li>تاريخ الطلب وحالته</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-6">ج. معلومات الاستخدام</h3>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>عنوان IP</li>
                        <li>نوع المتصفح</li>
                        <li>صفحات الموقع التي تزورينها</li>
                        <li>وقت ومدة الزيارة</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">3. كيفية استخدام المعلومات</h2>
                    <p class="leading-relaxed mb-4">نستخدم المعلومات التي نجمعها للأغراض التالية:</p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>معالجة وتنفيذ طلباتك</li>
                        <li>التواصل معك بخصوص طلباتك واستفساراتك</li>
                        <li>تحسين خدماتنا وتجربة المستخدم</li>
                        <li>إرسال تحديثات حول المنتجات والعروض (بموافقتك فقط)</li>
                        <li>منع الاحتيال وحماية أمن الموقع</li>
                        <li>الامتثال للقوانين واللوائح المعمول بها</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">4. حماية المعلومات</h2>
                    <p class="leading-relaxed mb-4">
                        نطبق تدابير أمنية مناسبة لحماية معلوماتك الشخصية من الوصول غير المصرح به أو التغيير أو الكشف أو التدمير. تشمل هذه التدابير:
                    </p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>استخدام تقنيات التشفير الآمنة</li>
                        <li>الوصول المحدود للمعلومات الشخصية للموظفين المصرح لهم فقط</li>
                        <li>مراجعة دورية لأنظمة جمع وتخزين ومعالجة البيانات</li>
                        <li>حماية الخوادم والأنظمة من التهديدات الأمنية</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">5. مشاركة المعلومات</h2>
                    <p class="leading-relaxed mb-4">
                        نحن لا نبيع أو نؤجر معلوماتك الشخصية لأطراف ثالثة. قد نشارك معلوماتك فقط في الحالات التالية:
                    </p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li><strong>مقدمي الخدمات:</strong> مع شركات الشحن وخدمات الدفع التي تساعدنا في تشغيل أعمالنا</li>
                        <li><strong>الامتثال القانوني:</strong> عندما يتطلب القانون ذلك أو للاستجابة لطلب قانوني</li>
                        <li><strong>حماية الحقوق:</strong> لحماية حقوقنا وممتلكاتنا وأمن عملائنا</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">6. ملفات تعريف الارتباط (Cookies)</h2>
                    <p class="leading-relaxed mb-4">
                        نستخدم ملفات تعريف الارتباط لتحسين تجربتك على موقعنا. تساعدنا هذه الملفات في:
                    </p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>تذكر تفضيلاتك</li>
                        <li>تحليل كيفية استخدام الموقع</li>
                        <li>تحسين أداء الموقع</li>
                    </ul>
                    <p class="leading-relaxed">
                        يمكنك تعطيل ملفات تعريف الارتباط من إعدادات المتصفح، لكن قد يؤثر ذلك على وظائف الموقع.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">7. حقوقك</h2>
                    <p class="leading-relaxed mb-4">لديك الحق في:</p>
                    <ul class="list-disc list-inside space-y-2 mb-4 mr-4">
                        <li>الوصول إلى معلوماتك الشخصية</li>
                        <li>تصحيح أي معلومات غير دقيقة</li>
                        <li>طلب حذف معلوماتك الشخصية</li>
                        <li>الاعتراض على معالجة معلوماتك</li>
                        <li>طلب نقل بياناتك</li>
                        <li>سحب موافقتك في أي وقت</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">8. الاحتفاظ بالبيانات</h2>
                    <p class="leading-relaxed mb-4">
                        نحتفظ بمعلوماتك الشخصية طالما كانت ضرورية لتحقيق الأغراض الموضحة في هذه السياسة، أو كما يتطلب القانون. عند حذف معلوماتك، سنتخذ خطوات معقولة لحذفها من أنظمتنا.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">9. التغييرات على السياسة</h2>
                    <p class="leading-relaxed mb-4">
                        قد نحدث هذه السياسة من وقت لآخر. سنخطرك بأي تغييرات جوهرية عن طريق نشر السياسة الجديدة على هذه الصفحة وتحديث تاريخ "آخر تحديث" في الأسفل.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-pink-600">10. التواصل معنا</h2>
                    <p class="leading-relaxed mb-4">
                        إذا كان لديك أي أسئلة أو مخاوف بشأن سياسة الخصوصية هذه، يرجى التواصل معنا:
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

