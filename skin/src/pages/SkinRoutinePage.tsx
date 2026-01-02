import { useState, useEffect } from 'react';
import { useSearchParams, Link } from 'react-router-dom';
import { Sun, Moon, ShoppingCart } from 'lucide-react';
import { skinRoutines } from '../data/skinRoutines';
import { products } from '../data/products';

export function SkinRoutinePage() {
  const [searchParams] = useSearchParams();
  const [selectedSkinType, setSelectedSkinType] = useState('دهنية');
  const [activeTime, setActiveTime] = useState<'morning' | 'evening'>('morning');

  useEffect(() => {
    const typeFromUrl = searchParams.get('type');
    if (typeFromUrl && skinRoutines.find(r => r.type === typeFromUrl)) {
      setSelectedSkinType(typeFromUrl);
    }
  }, [searchParams]);

  const currentRoutine = skinRoutines.find((r) => r.type === selectedSkinType);
  const steps = currentRoutine ? currentRoutine[activeTime] : [];

  return (
    <div className="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
      {/* Page Header */}
      <div className="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div className="container">
          <h1 className="text-white text-center mb-4">روتين العناية بالبشرة</h1>
          <p className="text-white/90 text-center text-lg">
            اختاري الروتين المثالي لنوع بشرتك
          </p>
        </div>
      </div>

      <div className="container py-12">
        {/* Skin Type Selection */}
        <div className="bg-white rounded-2xl shadow-sm p-6 mb-8 border border-pink-50">
          <h3 className="text-gray-800 mb-4">اختاري نوع بشرتك</h3>
          <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
            {skinRoutines.map((routine) => {
              const skinTypeImages = {
                'دهنية': 'https://images.unsplash.com/photo-1556229010-aa3f7ff66b24?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmYWNpYWwlMjBjbGVhbnNlciUyMGJvdHRsZXxlbnwxfHx8fDE3NjUzMzE4OTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
                'جافة': 'https://images.unsplash.com/photo-1519668963014-2308b08e5e9b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxoeWRyYXRpbmclMjBjcmVhbSUyMG1vaXN0dXJpemVyfGVufDF8fHx8MTc2NTM5OTA0MXww&ixlib=rb-4.1.0&q=80&w=1080',
                'مختلطة': 'https://images.unsplash.com/photo-1642505172812-15cf294b1212?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxza2luY2FyZSUyMGNvc21ldGljcyUyMHBpbmslMjBjcmVhbXxlbnwxfHx8fDE3NjUzOTkwNDF8MA&ixlib=rb-4.1.0&q=80&w=1080',
                'حساسة': 'https://images.unsplash.com/photo-1643747394944-89b11e7fb616?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxnZW50bGUlMjBza2luY2FyZSUyMHNlcnVtfGVufDF8fHx8MTc2NTM5OTA0Mnww&ixlib=rb-4.1.0&q=80&w=1080'
              };

              return (
                <button
                  key={routine.type}
                  onClick={() => setSelectedSkinType(routine.type)}
                  className={`relative overflow-hidden rounded-xl text-center transition-all border-2 group ${
                    selectedSkinType === routine.type
                      ? 'border-pink-500 shadow-lg scale-105'
                      : 'border-gray-200 hover:border-pink-300'
                  }`}
                >
                  {/* Background Image */}
                  <div className="relative h-48">
                    <img
                      src={skinTypeImages[routine.type as keyof typeof skinTypeImages]}
                      alt={`بشرة ${routine.type}`}
                      className="w-full h-full object-cover"
                    />
                    <div className={`absolute inset-0 transition-all ${
                      selectedSkinType === routine.type
                        ? 'bg-gradient-to-t from-pink-600/90 via-purple-500/80 to-pink-400/60'
                        : 'bg-gradient-to-t from-gray-900/70 via-gray-900/50 to-gray-900/30 group-hover:from-pink-600/70 group-hover:via-purple-500/60 group-hover:to-pink-400/40'
                    }`}></div>
                  </div>
                  
                  {/* Text Overlay */}
                  <div className="absolute inset-0 flex flex-col items-center justify-center">
                    <div className="text-4xl mb-2 drop-shadow-lg">
                      {routine.type === 'دهنية' && '💧'}
                      {routine.type === 'جافة' && '🌸'}
                      {routine.type === 'مختلطة' && '✨'}
                      {routine.type === 'حساسة' && '🌿'}
                    </div>
                    <span className="text-white drop-shadow-lg">
                      بشرة {routine.type}
                    </span>
                  </div>
                </button>
              );
            })}
          </div>
        </div>

        {/* Morning/Evening Toggle */}
        <div className="flex justify-center mb-8">
          <div className="bg-white rounded-full shadow-sm p-2 inline-flex border border-pink-100">
            <button
              onClick={() => setActiveTime('morning')}
              className={`flex items-center gap-2 px-6 py-3 rounded-full transition-all ${
                activeTime === 'morning'
                  ? 'bg-gradient-to-r from-yellow-400 to-orange-400 text-white shadow-md'
                  : 'text-gray-600 hover:text-gray-800'
              }`}
            >
              <Sun className="w-5 h-5" />
              <span>الروتين الصباحي</span>
            </button>
            <button
              onClick={() => setActiveTime('evening')}
              className={`flex items-center gap-2 px-6 py-3 rounded-full transition-all ${
                activeTime === 'evening'
                  ? 'bg-gradient-to-r from-purple-500 to-indigo-500 text-white shadow-md'
                  : 'text-gray-600 hover:text-gray-800'
              }`}
            >
              <Moon className="w-5 h-5" />
              <span>الروتين المسائي</span>
            </button>
          </div>
        </div>

        {/* Routine Steps */}
        <div className="space-y-6">
          {currentRoutine && steps.length > 0 ? (
            steps.map((step, index) => {
              const product = products.find((p) => p.id === step.productId);
              
              return (
                <div
                  key={index}
                  className="bg-white rounded-2xl shadow-sm overflow-hidden border border-pink-50 hover:shadow-lg transition-all"
                >
                  <div className="grid md:grid-cols-3 gap-6 p-6">
                    {/* Step Info */}
                    <div className="md:col-span-2 space-y-3">
                      <div className="flex items-center gap-3">
                        <div className="w-12 h-12 bg-gradient-to-br from-pink-500 to-purple-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                          <span className="text-xl">{step.step}</span>
                        </div>
                        <div>
                          <h4 className="text-gray-800">{step.title}</h4>
                          <p className="text-gray-500 text-sm">{step.description}</p>
                        </div>
                      </div>

                      {product && (
                        <div className="pr-15 space-y-2">
                          <p className="text-pink-600">
                            المنتج المقترح: {product.name}
                          </p>
                          <p className="text-gray-600 text-sm line-clamp-2">
                            {product.description}
                          </p>
                          <div className="flex items-center gap-4">
                            <span className="text-pink-600 text-xl">{product.price} جنيه</span>
                            <Link
                              to={`/product/${product.id}`}
                              className="text-teal-600 hover:text-teal-700 text-sm underline"
                            >
                              تفاصيل المنتج
                            </Link>
                          </div>
                        </div>
                      )}
                    </div>

                    {/* Product Image & CTA */}
                    {product && (
                      <div className="flex flex-col items-center justify-center gap-4">
                        <div className="w-32 h-32 rounded-xl overflow-hidden shadow-md">
                          <img
                            src={product.image}
                            alt={product.name}
                            className="w-full h-full object-cover"
                          />
                        </div>
                        <Link
                          to={`/checkout?product=${product.id}`}
                          className="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-4 py-2 rounded-full text-sm hover:shadow-lg transition-all flex items-center gap-2"
                        >
                          <ShoppingCart className="w-4 h-4" />
                          <span>اطلبي الآن</span>
                        </Link>
                      </div>
                    )}
                  </div>
                </div>
              );
            })
          ) : (
            <div className="bg-white rounded-2xl shadow-sm p-12 text-center border border-pink-50">
              <p className="text-gray-500 text-lg">اختاري نوع بشرتك لعرض الروتين المناسب</p>
            </div>
          )}
        </div>

        {/* Tips Section */}
        <div className="mt-12 bg-gradient-to-br from-teal-50 to-pink-50 rounded-2xl p-8 border border-teal-100">
          <h3 className="text-gray-800 mb-4">نصائح مهمة</h3>
          <ul className="space-y-3">
            <li className="flex items-start gap-3">
              <span className="text-teal-500 text-xl flex-shrink-0">✓</span>
              <span className="text-gray-700">
                استخدمي المنتجات بانتظام للحصول على أفضل النتائج
              </span>
            </li>
            <li className="flex items-start gap-3">
              <span className="text-teal-500 text-xl flex-shrink-0">✓</span>
              <span className="text-gray-700">
                احرصي على استخدام واقي الشمس يومياً حتى في الأيام الغائمة
              </span>
            </li>
            <li className="flex items-start gap-3">
              <span className="text-teal-500 text-xl flex-shrink-0">✓</span>
              <span className="text-gray-700">
                اشربي كمية كافية من الماء يومياً للحفاظ على ترطيب البشرة
              </span>
            </li>
            <li className="flex items-start gap-3">
              <span className="text-teal-500 text-xl flex-shrink-0">✓</span>
              <span className="text-gray-700">
                في حالة الحساسية أو التهيج، توقفي عن الاستخدام واستشيري طبيب الجلدية
              </span>
            </li>
          </ul>
        </div>

        {/* CTA */}
        <div className="mt-12 text-center bg-white rounded-2xl p-8 shadow-sm border border-pink-50">
          <h3 className="text-gray-800 mb-3">محتاجة مساعدة في اختيار المنتجات؟</h3>
          <p className="text-gray-600 mb-6">
            تواصلي معنا على الواتساب وهنساعدك تختاري الروتين المناسب لبشرتك
          </p>
          <a
            href="https://wa.me/201067565298"
            target="_blank"
            rel="noopener noreferrer"
            className="btn-primary inline-block"
          >
            تواصلي معنا الآن
          </a>
        </div>
      </div>
    </div>
  );
}