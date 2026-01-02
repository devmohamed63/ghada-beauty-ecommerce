import { Sparkles, Shield, Truck, HeadphonesIcon, Star } from 'lucide-react';
import { Link } from 'react-router-dom';
import { BestSellingProducts } from '../components/BestSellingProducts';

export function HomePage() {
  return (
    <div>
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-pink-50 via-purple-50 to-teal-50 py-20 md:py-32 overflow-hidden">
        <div className="container">
          <div className="grid md:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <div className="inline-block bg-white px-5 py-2.5 rounded-full shadow-lg border border-pink-100 animate-bounce">
                <span className="text-pink-600 text-sm">✨ منتجات أصلية 100%</span>
              </div>
              
              <h1 className="text-gray-800">
                Kayan Cosmetics
                <br />
                <span className="text-pink-600 bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">منتجات أصلية لبشرة صحية ونضرة</span>
              </h1>
              
              <p className="text-gray-600 text-lg leading-relaxed">
                اكتشفي عالماً من العناية بالبشرة والشعر مع منتجاتنا الأصلية 100%. 
                نوفر لكِ أفضل المنتجات للتفتيح والترطيب والعلاج والنضارة.
              </p>

              <div className="flex flex-wrap gap-4">
                <Link to="/products" className="btn-primary inline-block hover:scale-105 transform transition-all">
                  شوفي المنتجات
                </Link>
                <Link to="/skin-routine" className="btn-secondary inline-block hover:scale-105 transform transition-all">
                  اختاري روتين بشرتك
                </Link>
              </div>

              <div className="flex flex-wrap gap-6 pt-4">
                <div className="flex items-center gap-2 text-gray-600 hover:text-teal-600 transition-colors">
                  <div className="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                    <Shield className="w-5 h-5 text-teal-500" />
                  </div>
                  <span className="text-sm">منتجات أصلية</span>
                </div>
                <div className="flex items-center gap-2 text-gray-600 hover:text-teal-600 transition-colors">
                  <div className="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                    <Truck className="w-5 h-5 text-teal-500" />
                  </div>
                  <span className="text-sm">توصيل لجميع المحافظات</span>
                </div>
              </div>
            </div>

            <div className="relative">
              <div className="relative z-10 rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-shadow duration-500">
                <img
                  src="https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBjb3NtZXRpY3MlMjBib3R0لlezJTIwcGlua3xlbnwxfHx8fDE3NjUzOTgzMTN8MA&ixlib=rb-4.1.0&q=80&w=1080"
                  alt="Kayan Cosmetics"
                  className="w-full h-auto"
                />
              </div>
              <div className="absolute top-10 -right-10 w-48 h-48 bg-pink-300 rounded-full blur-3xl opacity-40 animate-pulse"></div>
              <div className="absolute bottom-10 -left-10 w-48 h-48 bg-teal-300 rounded-full blur-3xl opacity-40 animate-pulse"></div>
            </div>
          </div>
        </div>
      </section>

      {/* Best Selling Products */}
      <section className="py-20 bg-gradient-to-br from-pink-50 via-white to-purple-50">
        <div className="container">
          <div className="text-center mb-12">
            <h2 className="text-gray-800 mb-4">🔥 المنتجات الأكثر مبيعًا</h2>
            <p className="text-gray-600 max-w-2xl mx-auto">
              اكتشفي المنتجات الأعلى طلبًا من عملائنا
            </p>
          </div>

          <BestSellingProducts />

          <div className="text-center mt-12">
            <Link to="/products" className="btn-primary inline-block">
              شوفي جميع المنتجات
            </Link>
          </div>
        </div>
      </section>

      {/* Why Choose Us */}
      <section className="py-20 bg-white">
        <div className="container">
          <div className="text-center mb-12">
            <h2 className="text-gray-800 mb-4">ليه تختاري كيان؟</h2>
            <p className="text-gray-600 max-w-2xl mx-auto">
              نوفر لكِ تجربة شراء آمنة ومريحة مع منتجات عالية الجودة
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div className="text-center group">
              <div className="w-20 h-20 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                <Sparkles className="w-10 h-10 text-pink-600" />
              </div>
              <h4 className="text-gray-800 mb-2">منتجات أصلية</h4>
              <p className="text-gray-600 text-sm">
                جميع منتجاتنا أصلية 100% ومضمونة
              </p>
            </div>

            <div className="text-center group">
              <div className="w-20 h-20 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                <Shield className="w-10 h-10 text-teal-600" />
              </div>
              <h4 className="text-gray-800 mb-2">الدفع عند الاستلام</h4>
              <p className="text-gray-600 text-sm">
                ادفعي بعد ما توصلك المنتجات
              </p>
            </div>

            <div className="text-center group">
              <div className="w-20 h-20 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                <Truck className="w-10 h-10 text-purple-600" />
              </div>
              <h4 className="text-gray-800 mb-2">توصيل سريع</h4>
              <p className="text-gray-600 text-sm">
                نوصل لجميع المحافظات في أسرع وقت
              </p>
            </div>

            <div className="text-center group">
              <div className="w-20 h-20 bg-gradient-to-br from-pink-100 to-purple-200 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                <HeadphonesIcon className="w-10 h-10 text-pink-600" />
              </div>
              <h4 className="text-gray-800 mb-2">استشارة قبل الشراء</h4>
              <p className="text-gray-600 text-sm">
                نساعدك في اختيار المنتجات المناسبة لبشرتك
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Skin Routine CTA */}
      <section className="py-20 bg-white">
        <div className="container">
          <div className="grid md:grid-cols-2 gap-12 items-center">
            <div className="relative rounded-3xl overflow-hidden shadow-2xl group">
              <img
                src="https://images.unsplash.com/photo-1616750819574-7e38aa8046fa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMHJvdXRpbmUlMjBwcm9kdWN0c3xlbnwxfHx8fDE3NjUzOTQ4MDF8MA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="Skin Routine"
                className="w-full h-auto group-hover:scale-105 transition-transform duration-700"
              />
              <div className="absolute inset-0 bg-gradient-to-t from-pink-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>

            <div className="space-y-6">
              <div className="inline-block bg-gradient-to-r from-pink-100 to-purple-100 px-4 py-2 rounded-full">
                <span className="text-pink-600 text-sm">🌸 روتين مخصص</span>
              </div>

              <h2 className="text-gray-800">
                اختاري روتين العناية المناسب لبشرتك
              </h2>
              
              <p className="text-gray-600 leading-relaxed">
                كل نوع بشرة له احتياجاته الخاصة. اكتشفي الروتين المثالي لبشرتك 
                سواء كانت دهنية، جافة، مختلطة أو حساسة.
              </p>

              <div className="grid grid-cols-2 gap-4">
                <Link
                  to="/skin-routine?type=دهنية"
                  className="bg-gradient-to-br from-pink-50 to-pink-100 hover:from-pink-100 hover:to-pink-200 border-2 border-pink-200 hover:border-pink-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group"
                >
                  <span className="text-3xl mb-2 block group-hover:scale-110 transition-transform">💧</span>
                  <span className="text-gray-700">بشرة دهنية</span>
                </Link>
                <Link
                  to="/skin-routine?type=جافة"
                  className="bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 border-2 border-purple-200 hover:border-purple-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group"
                >
                  <span className="text-3xl mb-2 block group-hover:scale-110 transition-transform">🌸</span>
                  <span className="text-gray-700">بشرة جافة</span>
                </Link>
                <Link
                  to="/skin-routine?type=مختلطة"
                  className="bg-gradient-to-br from-teal-50 to-teal-100 hover:from-teal-100 hover:to-teal-200 border-2 border-teal-200 hover:border-teal-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group"
                >
                  <span className="text-3xl mb-2 block group-hover:scale-110 transition-transform">✨</span>
                  <span className="text-gray-700">بشرة مختلطة</span>
                </Link>
                <Link
                  to="/skin-routine?type=حساسة"
                  className="bg-gradient-to-br from-pink-50 to-pink-100 hover:from-pink-100 hover:to-pink-200 border-2 border-pink-200 hover:border-pink-300 p-5 rounded-2xl text-center transition-all hover:shadow-lg hover:-translate-y-1 group"
                >
                  <span className="text-3xl mb-2 block group-hover:scale-110 transition-transform">🌿</span>
                  <span className="text-gray-700">بشرة حساسة</span>
                </Link>
              </div>

              <Link to="/skin-routine" className="btn-primary inline-block hover:scale-105 transform transition-all">
                شوفي جميع الروتينات
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Customer Reviews */}
      <section className="py-20 bg-gradient-to-br from-pink-50 via-purple-50 to-teal-50">
        <div className="container">
          <div className="text-center mb-12">
            <h2 className="text-gray-800 mb-4">⭐ آراء عملائنا</h2>
            <p className="text-gray-600">شوفي تجارب العملاء مع منتجاتنا</p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {[
              {
                name: 'سارة محمد',
                review: 'منتجات رائعة وأصلية! بشرتي تحسنت كتير بعد استخدام السيروم والكريم المرطب.',
                rating: 5
              },
              {
                name: 'نور أحمد',
                review: 'خدمة ممتازة وتوصيل سريع. المنتجات جت في حالة ممتازة والدفع عند الاستلام ريحني كتير.',
                rating: 5
              },
              {
                name: 'ياسمين علي',
                review: 'أفضل منتجات عناية بالبشرة جربتها! النتائج ظهرت بسرعة والأسعار معقولة جداً.',
                rating: 5
              }
            ].map((review, index) => (
              <div key={index} className="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-pink-100 hover:border-pink-300 hover:-translate-y-2 group">
                <div className="flex gap-1 mb-4">
                  {[...Array(review.rating)].map((_, i) => (
                    <Star key={i} className="w-5 h-5 fill-yellow-400 text-yellow-400 group-hover:scale-125 transition-transform" style={{ transitionDelay: `${i * 50}ms` }} />
                  ))}
                </div>
                <p className="text-gray-600 mb-6 leading-relaxed text-base">
                  "{review.review}"
                </p>
                <div className="flex items-center gap-3 pt-4 border-t border-pink-50">
                  <div className="w-12 h-12 bg-gradient-to-br from-pink-400 to-purple-400 rounded-full flex items-center justify-center text-white">
                    {review.name.charAt(0)}
                  </div>
                  <p className="text-pink-600">{review.name}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Banner */}
      <section className="py-20 bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500">
        <div className="container">
          <div className="text-center text-white space-y-6 max-w-3xl mx-auto">
            <h2 className="text-white">مش عارفة تختاري إيه؟</h2>
            <p className="text-lg text-white/90">
              كلمينا على الواتساب وهنساعدك تختاري الروتين المناسب لبشرتك
            </p>
            <a
              href="https://wa.me/201067565298"
              target="_blank"
              rel="noopener noreferrer"
              className="inline-block bg-white text-pink-600 px-8 py-4 rounded-full hover:bg-pink-50 transition-all shadow-xl hover:scale-105"
            >
              تواصلي معنا الآن
            </a>
          </div>
        </div>
      </section>
    </div>
  );
}