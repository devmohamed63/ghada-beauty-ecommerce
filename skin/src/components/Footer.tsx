import { Facebook, Phone, Mail, MapPin, MessageCircle } from 'lucide-react';
import { Link } from 'react-router-dom';

export function Footer() {
  return (
    <footer className="bg-gradient-to-br from-pink-50 via-purple-50 to-teal-50 pt-16 pb-8 mt-20">
      <div className="container">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
          {/* Brand Info */}
          <div>
            <h4 className="text-pink-600 mb-4">كيان كوزمتكس</h4>
            <p className="text-gray-600 mb-4 leading-relaxed">
              منتجات أصلية 100% للعناية بالبشرة والشعر. تفتيح – ترطيب – علاج – نضارة
            </p>
            <div className="flex gap-3">
              <a
                href="https://www.facebook.com/share/1H6JY4fnzh/?mibextid=wwXIfr"
                target="_blank"
                rel="noopener noreferrer"
                className="w-10 h-10 rounded-full bg-white flex items-center justify-center text-pink-500 hover:bg-pink-500 hover:text-white transition-all shadow-sm"
                aria-label="Facebook"
              >
                <Facebook className="w-5 h-5" />
              </a>
              <a
                href="https://wa.me/201067565298"
                target="_blank"
                rel="noopener noreferrer"
                className="w-10 h-10 rounded-full bg-white flex items-center justify-center text-teal-500 hover:bg-teal-500 hover:text-white transition-all shadow-sm"
                aria-label="WhatsApp"
              >
                <MessageCircle className="w-5 h-5" />
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="mb-4">روابط سريعة</h4>
            <ul className="space-y-2">
              <li>
                <Link to="/" className="text-gray-600 hover:text-pink-500 transition-colors">
                  الرئيسية
                </Link>
              </li>
              <li>
                <Link to="/products" className="text-gray-600 hover:text-pink-500 transition-colors">
                  المنتجات
                </Link>
              </li>
              <li>
                <Link to="/skin-routine" className="text-gray-600 hover:text-pink-500 transition-colors">
                  روتين البشرة
                </Link>
              </li>
              <li>
                <Link to="/about" className="text-gray-600 hover:text-pink-500 transition-colors">
                  من نحن
                </Link>
              </li>
              <li>
                <Link to="/contact" className="text-gray-600 hover:text-pink-500 transition-colors">
                  تواصل معنا
                </Link>
              </li>
            </ul>
          </div>

          {/* Contact Info */}
          <div>
            <h4 className="mb-4">تواصل معنا</h4>
            <ul className="space-y-3">
              <li className="flex items-start gap-2 text-gray-600">
                <Phone className="w-5 h-5 text-pink-500 mt-1 flex-shrink-0" />
                <div>
                  <a href="tel:01067565298" className="hover:text-pink-500 transition-colors">
                    01067565298
                  </a>
                </div>
              </li>
              <li className="flex items-start gap-2 text-gray-600">
                <MessageCircle className="w-5 h-5 text-teal-500 mt-1 flex-shrink-0" />
                <div>
                  <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" className="hover:text-teal-500 transition-colors">
                    واتساب: 01067565298
                  </a>
                </div>
              </li>
              <li className="flex items-start gap-2 text-gray-600">
                <MapPin className="w-5 h-5 text-pink-500 mt-1 flex-shrink-0" />
                <span>القاهرة – مصر</span>
              </li>
            </ul>
          </div>

          {/* Policies */}
          <div>
            <h4 className="mb-4">معلومات مهمة</h4>
            <ul className="space-y-2">
              <li className="text-gray-600">
                <span className="block">✓ منتجات أصلية 100%</span>
              </li>
              <li className="text-gray-600">
                <span className="block">✓ الدفع عند الاستلام</span>
              </li>
              <li className="text-gray-600">
                <span className="block">✓ توصيل لجميع المحافظات</span>
              </li>
              <li className="text-gray-600">
                <span className="block">✓ استشارة مجانية</span>
              </li>
            </ul>
          </div>
        </div>

        {/* Bottom Bar */}
        <div className="border-t border-pink-100 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">
          <p className="text-gray-600 text-center md:text-right text-sm">
            &copy; 2024 كيان كوزمتكس - جميع الحقوق محفوظة
          </p>
          <div className="flex gap-4 text-sm">
            <a href="#" className="text-gray-600 hover:text-pink-500 transition-colors">
              سياسة الخصوصية
            </a>
            <span className="text-gray-300">|</span>
            <a href="#" className="text-gray-600 hover:text-pink-500 transition-colors">
              الشروط والأحكام
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}
