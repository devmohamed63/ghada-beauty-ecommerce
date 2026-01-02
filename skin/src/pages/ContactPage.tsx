import {
  Phone,
  MessageCircle,
  MapPin,
  Facebook,
  Send,
} from "lucide-react";

export function ContactPage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
      {/* Page Header */}
      <div className="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div className="container">
          <h1 className="text-white text-center mb-4">
            تواصل معنا
          </h1>
          <p className="text-white/90 text-center text-lg">
            نحن هنا للإجابة على جميع استفساراتك
          </p>
        </div>
      </div>

      <div className="container py-12">
        <div className="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
          {/* Contact Info */}
          <div className="space-y-8">
            <div>
              <h2 className="text-gray-800 mb-6">
                كلمينا بأي طريقة تناسبك
              </h2>
              <p className="text-gray-600 leading-relaxed">
                فريقنا جاهز لمساعدتك في اختيار المنتجات المناسبة
                لبشرتك والإجابة على جميع استفساراتك. تواصلي معنا
                الآن!
              </p>
            </div>

            {/* Contact Methods */}
            <div className="space-y-6">
              {/* Phone */}
              <a
                href="tel:01067565298"
                className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-pink-50 hover:shadow-lg transition-all group"
              >
                <div className="w-14 h-14 bg-gradient-to-br from-pink-100 to-pink-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                  <Phone className="w-7 h-7 text-pink-600" />
                </div>
                <div>
                  <h4 className="text-gray-800 mb-1">
                    اتصلي بنا
                  </h4>
                  <p className="text-pink-600 mb-1 dir-ltr text-right">
                    01067565298
                  </p>
                  <p className="text-gray-500 text-sm">
                    متاحين للرد على مكالماتك
                  </p>
                </div>
              </a>

              {/* WhatsApp */}
              <a
                href="https://wa.me/201067565298"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-teal-50 hover:shadow-lg transition-all group"
              >
                <div className="w-14 h-14 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                  <MessageCircle className="w-7 h-7 text-teal-600" />
                </div>
                <div>
                  <h4 className="text-gray-800 mb-1">واتساب</h4>
                  <p className="text-teal-600 mb-1 dir-ltr text-right">
                    01067565298
                  </p>
                  <p className="text-gray-500 text-sm">
                    راسلينا في أي وقت
                  </p>
                </div>
              </a>

              {/* Telegram */}
              <a
                href="https://t.me/kayancosmatics1"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-purple-50 hover:shadow-lg transition-all group"
              >
                <div className="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                  <Send className="w-7 h-7 text-purple-600" />
                </div>
                <div>
                  <h4 className="text-gray-800 mb-1">
                    تيليجرام
                  </h4>
                  <p className="text-purple-600 mb-1">
                    @kayancosmatics1
                  </p>
                  <p className="text-gray-500 text-sm">
                    تواصلي معنا على تيليجرام
                  </p>
                </div>
              </a>

              {/* Facebook */}
              <a
                href="https://www.facebook.com/share/1H6JY4fnzh/?mibextid=wwXIfr"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-pink-50 hover:shadow-lg transition-all group"
              >
                <div className="w-14 h-14 bg-gradient-to-br from-pink-100 to-purple-200 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                  <Facebook className="w-7 h-7 text-pink-600" />
                </div>
                <div>
                  <h4 className="text-gray-800 mb-1">فيسبوك</h4>
                  <p className="text-pink-600 mb-1">
                    Kayan Cosmetics
                  </p>
                  <p className="text-gray-500 text-sm">
                    تابعينا على فيسبوك
                  </p>
                </div>
              </a>

              {/* Location */}
              <div className="flex items-start gap-4 bg-white p-6 rounded-2xl shadow-sm border border-teal-50">
                <div className="w-14 h-14 bg-gradient-to-br from-teal-100 to-teal-200 rounded-2xl flex items-center justify-center flex-shrink-0">
                  <MapPin className="w-7 h-7 text-teal-600" />
                </div>
                <div>
                  <h4 className="text-gray-800 mb-1">موقعنا</h4>
                  <p className="text-gray-600">القاهرة – مصر</p>
                  <p className="text-gray-500 text-sm mt-2">
                    نوصل لجميع المحافظات
                  </p>
                </div>
              </div>
            </div>

            {/* Website Link */}
            <div className="bg-gradient-to-br from-pink-100 to-purple-100 rounded-2xl p-6 border border-pink-200">
              <h4 className="text-gray-800 mb-2">
                موقعنا الإلكتروني
              </h4>
              <a
                href="https://0.yallashop.co/ar/home"
                target="_blank"
                rel="noopener noreferrer"
                className="text-pink-600 hover:text-pink-700 underline break-all"
              >
                https://0.yallashop.co/ar/home
              </a>
            </div>
          </div>

          {/* Image & CTA */}
          <div className="space-y-8">
            <div className="relative rounded-3xl overflow-hidden shadow-xl">
              <img
                src="https://images.unsplash.com/photo-1667242196595-0f8f28afb92d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxiZWF1dHklMjBjb3NtZXRpY3MlMjBib3R0bGVzJTIwcGlua3xlbnwxfHx8fDE3NjUzOTgzMTN8MA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="Contact us"
                className="w-full h-auto"
              />
            </div>

            <div className="bg-white rounded-2xl p-8 shadow-sm border border-pink-50">
              <h3 className="text-gray-800 mb-4">
                ساعات العمل
              </h3>
              <div className="space-y-3">
                <div className="flex justify-between">
                  <span className="text-gray-600">
                    السبت - الخميس
                  </span>
                  <span className="text-gray-800">
                    9:00 ص - 9:00 م
                  </span>
                </div>
                <div className="flex justify-between">
                  <span className="text-gray-600">الجمعة</span>
                  <span className="text-gray-800">
                    2:00 م - 9:00 م
                  </span>
                </div>
              </div>
            </div>

            <div className="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 rounded-2xl p-8 text-white text-center">
              <h3 className="text-white mb-3">
                عايزة تعرفي إيه المناسب لبشرتك؟
              </h3>
              <p className="text-white/90 mb-6 text-sm">
                كلمينا على الواتساب واحصلي على استشارة مجانية
              </p>
              <a
                href="https://wa.me/201067565298"
                target="_blank"
                rel="noopener noreferrer"
                className="inline-block bg-white text-pink-600 px-6 py-3 rounded-full hover:bg-pink-50 transition-all shadow-lg hover:scale-105"
              >
                تواصلي معنا الآن
              </a>
            </div>

            <div className="bg-teal-50 rounded-2xl p-6 border border-teal-100">
              <h4 className="text-gray-800 mb-3">
                ليه تختاري كيان؟
              </h4>
              <ul className="space-y-2 text-sm">
                <li className="flex items-center gap-2 text-gray-700">
                  <span className="text-teal-500">✓</span>
                  منتجات أصلية 100%
                </li>
                <li className="flex items-center gap-2 text-gray-700">
                  <span className="text-teal-500">✓</span>
                  الدفع عند الاستلام
                </li>
                <li className="flex items-center gap-2 text-gray-700">
                  <span className="text-teal-500">✓</span>
                  توصيل لجميع المحافظات
                </li>
                <li className="flex items-center gap-2 text-gray-700">
                  <span className="text-teal-500">✓</span>
                  استشارة مجانية
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}