import { Heart, Shield, Sparkles, Users } from 'lucide-react';

export function AboutPage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
      {/* Page Header */}
      <div className="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div className="container">
          <h1 className="text-white text-center mb-4">من نحن</h1>
          <p className="text-white/90 text-center text-lg">
            تعرفي على قصتنا ورؤيتنا
          </p>
        </div>
      </div>

      <div className="container py-12">
        {/* About Section */}
        <div className="grid md:grid-cols-2 gap-12 items-center mb-20">
          <div className="relative rounded-3xl overflow-hidden shadow-xl">
            <img
              src="https://images.unsplash.com/photo-1618478122572-6f943315c08c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMHByb2R1Y3RzJTIwY29zbWV0aWNzfGVufDF8fHx8MTc2NTM5NzcwOXww&ixlib=rb-4.1.0&q=80&w=1080"
              alt="Kayan Cosmetics"
              className="w-full h-auto"
            />
          </div>

          <div className="space-y-6">
            <h2 className="text-gray-800">
              Kayan Cosmetics
              <br />
              <span className="text-pink-600">كيان كوزمتكس</span>
            </h2>
            
            <p className="text-gray-600 leading-relaxed">
              نحن متخصصون في توفير أفضل منتجات العناية بالبشرة والشعر الأصلية 100%. 
              نؤمن بأن كل امرأة تستحق الحصول على بشرة صحية ونضرة وشعر قوي وجميل.
            </p>

            <p className="text-gray-600 leading-relaxed">
              بدأت رحلتنا من شغفنا بعالم التجميل والعناية بالبشرة، ومن رغبتنا في مساعدة 
              النساء على الشعور بالثقة والجمال. نختار منتجاتنا بعناية فائقة لضمان الجودة 
              والفعالية، ونوفرها بأسعار مناسبة للجميع.
            </p>

            <p className="text-gray-600 leading-relaxed">
              نفخر بتقديم خدمة عملاء متميزة، حيث نساعد كل عميلة في اختيار المنتجات 
              المناسبة لنوع بشرتها واحتياجاتها الخاصة. رضاكم هو نجاحنا.
            </p>
          </div>
        </div>

        {/* Values */}
        <div className="mb-20">
          <h2 className="text-gray-800 text-center mb-12">قيمنا ومبادئنا</h2>
          
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div className="bg-white rounded-2xl p-8 text-center shadow-sm border border-pink-50 hover:shadow-lg transition-all">
              <div className="w-16 h-16 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <Sparkles className="w-8 h-8 text-pink-600" />
              </div>
              <h4 className="text-gray-800 mb-3">الأصالة والجودة</h4>
              <p className="text-gray-600 text-sm">
                جميع منتجاتنا أصلية 100% من مصادر موثوقة
              </p>
            </div>

            <div className="bg-white rounded-2xl p-8 text-center shadow-sm border border-teal-50 hover:shadow-lg transition-all">
              <div className="w-16 h-16 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <Shield className="w-8 h-8 text-teal-600" />
              </div>
              <h4 className="text-gray-800 mb-3">الأمان والثقة</h4>
              <p className="text-gray-600 text-sm">
                نوفر تجربة شراء آمنة مع الدفع عند الاستلام
              </p>
            </div>

            <div className="bg-white rounded-2xl p-8 text-center shadow-sm border border-purple-50 hover:shadow-lg transition-all">
              <div className="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <Heart className="w-8 h-8 text-purple-600" />
              </div>
              <h4 className="text-gray-800 mb-3">الاهتمام بالعملاء</h4>
              <p className="text-gray-600 text-sm">
                نقدم استشارات مجانية ودعم مستمر لكل عميلة
              </p>
            </div>

            <div className="bg-white rounded-2xl p-8 text-center shadow-sm border border-pink-50 hover:shadow-lg transition-all">
              <div className="w-16 h-16 bg-gradient-to-br from-pink-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <Users className="w-8 h-8 text-pink-600" />
              </div>
              <h4 className="text-gray-800 mb-3">المصداقية</h4>
              <p className="text-gray-600 text-sm">
                نبني علاقات طويلة الأمد مع عملائنا بالصدق والشفافية
              </p>
            </div>
          </div>
        </div>

        {/* Why Trust Us */}
        <div className="bg-gradient-to-br from-pink-100 via-purple-100 to-teal-100 rounded-3xl p-12">
          <h2 className="text-gray-800 text-center mb-12">ليه تثقي في كيان كوزمتكس؟</h2>
          
          <div className="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <div className="flex gap-4">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center text-white">
                  ✓
                </div>
              </div>
              <div>
                <h4 className="text-gray-800 mb-2">منتجات أصلية مضمونة</h4>
                <p className="text-gray-600 text-sm">
                  نتعامل مع موزعين معتمدين ونضمن أصالة كل منتج
                </p>
              </div>
            </div>

            <div className="flex gap-4">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center text-white">
                  ✓
                </div>
              </div>
              <div>
                <h4 className="text-gray-800 mb-2">خدمة عملاء متميزة</h4>
                <p className="text-gray-600 text-sm">
                  فريق متخصص جاهز لمساعدتك في أي وقت
                </p>
              </div>
            </div>

            <div className="flex gap-4">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white">
                  ✓
                </div>
              </div>
              <div>
                <h4 className="text-gray-800 mb-2">توصيل سريع وآمن</h4>
                <p className="text-gray-600 text-sm">
                  نوصل لجميع المحافظات بأسرع وقت ممكن
                </p>
              </div>
            </div>

            <div className="flex gap-4">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 bg-pink-500 rounded-full flex items-center justify-center text-white">
                  ✓
                </div>
              </div>
              <div>
                <h4 className="text-gray-800 mb-2">أسعار منافسة</h4>
                <p className="text-gray-600 text-sm">
                  أفضل الأسعار مع ضمان الجودة العالية
                </p>
              </div>
            </div>

            <div className="flex gap-4">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center text-white">
                  ✓
                </div>
              </div>
              <div>
                <h4 className="text-gray-800 mb-2">استشارات مجانية</h4>
                <p className="text-gray-600 text-sm">
                  نساعدك في اختيار الروتين المناسب لبشرتك
                </p>
              </div>
            </div>

            <div className="flex gap-4">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center text-white">
                  ✓
                </div>
              </div>
              <div>
                <h4 className="text-gray-800 mb-2">راحة بالك مضمونة</h4>
                <p className="text-gray-600 text-sm">
                  الدفع عند الاستلام - ادفعي لما توصلك المنتجات
                </p>
              </div>
            </div>
          </div>
        </div>

        {/* CTA */}
        <div className="mt-16 text-center">
          <h3 className="text-gray-800 mb-4">جاهزة تبدأي رحلتك معانا؟</h3>
          <p className="text-gray-600 mb-8 max-w-2xl mx-auto">
            اكتشفي منتجاتنا واختاري الروتين المناسب لبشرتك
          </p>
          <div className="flex flex-wrap gap-4 justify-center">
            <a href="/products" className="btn-primary">
              تصفح المنتجات
            </a>
            <a
              href="https://wa.me/201067565298"
              target="_blank"
              rel="noopener noreferrer"
              className="btn-secondary"
            >
              تواصلي معنا
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}
