import { useState, useEffect } from 'react';
import { useSearchParams, useNavigate } from 'react-router-dom';
import { ShoppingCart, CheckCircle } from 'lucide-react';
import { products } from '../data/products';

const egyptGovernorates = [
  'القاهرة',
  'الجيزة',
  'الإسكندرية',
  'الدقهلية',
  'البحيرة',
  'الشرقية',
  'القليوبية',
  'المنوفية',
  'الغربية',
  'كفر الشيخ',
  'دمياط',
  'بورسعيد',
  'الإسماعيلية',
  'السويس',
  'شمال سيناء',
  'جنوب سيناء',
  'البحر الأحمر',
  'أسوان',
  'الأقصر',
  'قنا',
  'سوهاج',
  'أسيوط',
  'المنيا',
  'بني سويف',
  'الفيوم',
  'الوادي الجديد',
  'مطروح'
];

export function CheckoutPage() {
  const [searchParams] = useSearchParams();
  const navigate = useNavigate();
  const [orderSuccess, setOrderSuccess] = useState(false);

  const productId = searchParams.get('product');
  const product = productId ? products.find((p) => p.id === productId) : null;

  const [formData, setFormData] = useState({
    name: '',
    phone: '',
    governorate: '',
    city: '',
    address: '',
    notes: '',
    quantity: 1
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    
    // Create WhatsApp message
    const message = `
🛍️ *طلب جديد من موقع كيان كوزمتكس*

👤 *بيانات العميل:*
الاسم: ${formData.name}
رقم الهاتف: ${formData.phone}

📍 *عنوان التوصيل:*
المحافظة: ${formData.governorate}
المدينة/المركز: ${formData.city}
العنوان التفصيلي: ${formData.address}

🛒 *تفاصيل الطلب:*
المنتج: ${product?.name}
الكمية: ${formData.quantity}
السعر الإجمالي: ${product ? product.price * formData.quantity : 0} جنيه

${formData.notes ? `📝 *ملاحظات:*\n${formData.notes}` : ''}
    `.trim();

    const whatsappUrl = `https://wa.me/201067565298?text=${encodeURIComponent(message)}`;
    
    // Show success state
    setOrderSuccess(true);
    
    // Open WhatsApp after a short delay
    setTimeout(() => {
      window.open(whatsappUrl, '_blank');
    }, 1500);
  };

  if (!product) {
    return (
      <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 via-white to-purple-50">
        <div className="text-center bg-white p-8 rounded-2xl shadow-lg">
          <h2 className="mb-4">لم يتم اختيار منتج</h2>
          <p className="text-gray-600 mb-6">من فضلك اختاري منتج للطلب</p>
          <button
            onClick={() => navigate('/products')}
            className="btn-primary"
          >
            تصفح المنتجات
          </button>
        </div>
      </div>
    );
  }

  if (orderSuccess) {
    return (
      <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-pink-50 via-white to-purple-50">
        <div className="text-center bg-white p-12 rounded-2xl shadow-lg max-w-md mx-4">
          <div className="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <CheckCircle className="w-12 h-12 text-green-500" />
          </div>
          <h2 className="text-green-600 mb-4">تم استلام طلبك بنجاح!</h2>
          <p className="text-gray-600 mb-6 leading-relaxed">
            سيتم التواصل معك قريباً لتأكيد الطلب وترتيب الشحن. 
            شكراً لثقتك في كيان كوزمتكس 💖
          </p>
          <div className="flex flex-col gap-3">
            <button
              onClick={() => navigate('/products')}
              className="btn-primary w-full"
            >
              مواصلة التسوق
            </button>
            <button
              onClick={() => navigate('/')}
              className="btn-secondary w-full"
            >
              العودة للرئيسية
            </button>
          </div>
        </div>
      </div>
    );
  }

  const totalPrice = product.price * formData.quantity;

  return (
    <div className="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50 py-12">
      <div className="container max-w-5xl">
        <h1 className="text-gray-800 text-center mb-8">إتمام الطلب</h1>

        <div className="grid md:grid-cols-3 gap-8">
          {/* Order Form */}
          <div className="md:col-span-2">
            <form onSubmit={handleSubmit} className="bg-white rounded-2xl shadow-sm p-8 border border-pink-50">
              <h3 className="text-gray-800 mb-6">بيانات التوصيل</h3>

              <div className="space-y-5">
                {/* Name */}
                <div>
                  <label htmlFor="name" className="block text-gray-700 mb-2">
                    الاسم الكامل <span className="text-red-500">*</span>
                  </label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    value={formData.name}
                    onChange={handleChange}
                    required
                    className="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                    placeholder="اكتبي اسمك الكامل"
                  />
                </div>

                {/* Phone */}
                <div>
                  <label htmlFor="phone" className="block text-gray-700 mb-2">
                    رقم الهاتف <span className="text-red-500">*</span>
                  </label>
                  <input
                    type="tel"
                    id="phone"
                    name="phone"
                    value={formData.phone}
                    onChange={handleChange}
                    required
                    className="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                    placeholder="01xxxxxxxxx"
                  />
                </div>

                {/* Governorate */}
                <div>
                  <label htmlFor="governorate" className="block text-gray-700 mb-2">
                    المحافظة <span className="text-red-500">*</span>
                  </label>
                  <select
                    id="governorate"
                    name="governorate"
                    value={formData.governorate}
                    onChange={handleChange}
                    required
                    className="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                  >
                    <option value="">اختاري المحافظة</option>
                    {egyptGovernorates.map((gov) => (
                      <option key={gov} value={gov}>
                        {gov}
                      </option>
                    ))}
                  </select>
                </div>

                {/* City */}
                <div>
                  <label htmlFor="city" className="block text-gray-700 mb-2">
                    المدينة / المركز <span className="text-red-500">*</span>
                  </label>
                  <input
                    type="text"
                    id="city"
                    name="city"
                    value={formData.city}
                    onChange={handleChange}
                    required
                    className="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                    placeholder="اكتبي اسم المدينة أو المركز"
                  />
                </div>

                {/* Address */}
                <div>
                  <label htmlFor="address" className="block text-gray-700 mb-2">
                    العنوان التفصيلي <span className="text-red-500">*</span>
                  </label>
                  <input
                    type="text"
                    id="address"
                    name="address"
                    value={formData.address}
                    onChange={handleChange}
                    required
                    className="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
                    placeholder="اسم الشارع / القرية / الحي"
                  />
                </div>

                {/* Notes */}
                <div>
                  <label htmlFor="notes" className="block text-gray-700 mb-2">
                    ملاحظات إضافية (اختياري)
                  </label>
                  <textarea
                    id="notes"
                    name="notes"
                    value={formData.notes}
                    onChange={handleChange}
                    rows={3}
                    className="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent resize-none"
                    placeholder="أي ملاحظات خاصة بالطلب أو التوصيل"
                  />
                </div>
              </div>

              <button
                type="submit"
                className="w-full mt-6 bg-gradient-to-r from-pink-500 to-teal-500 text-white px-8 py-4 rounded-full hover:shadow-xl transition-all flex items-center justify-center gap-3 text-lg group"
              >
                <ShoppingCart className="w-6 h-6 group-hover:scale-110 transition-transform" />
                <span>تأكيد الطلب – الدفع عند الاستلام</span>
              </button>
            </form>
          </div>

          {/* Order Summary */}
          <div>
            <div className="bg-white rounded-2xl shadow-sm p-6 border border-pink-50 sticky top-24">
              <h4 className="text-gray-800 mb-4">ملخص الطلب</h4>

              <div className="space-y-4">
                <div className="flex gap-4">
                  <div className="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                    <img
                      src={product.image}
                      alt={product.name}
                      className="w-full h-full object-cover"
                    />
                  </div>
                  <div className="flex-1">
                    <h4 className="text-gray-800 text-sm mb-1">{product.name}</h4>
                    <p className="text-pink-600">{product.price} جنيه</p>
                  </div>
                </div>

                <div>
                  <label htmlFor="quantity" className="block text-gray-700 mb-2 text-sm">
                    الكمية
                  </label>
                  <select
                    id="quantity"
                    name="quantity"
                    value={formData.quantity}
                    onChange={handleChange}
                    className="w-full px-4 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 text-sm"
                  >
                    {[1, 2, 3, 4, 5].map((num) => (
                      <option key={num} value={num}>
                        {num}
                      </option>
                    ))}
                  </select>
                </div>

                <div className="border-t border-gray-200 pt-4 space-y-2">
                  <div className="flex justify-between text-sm">
                    <span className="text-gray-600">المجموع الفرعي</span>
                    <span className="text-gray-800">{totalPrice} جنيه</span>
                  </div>
                  <div className="flex justify-between text-sm">
                    <span className="text-gray-600">الشحن</span>
                    <span className="text-gray-800">يُحسب عند التوصيل</span>
                  </div>
                </div>

                <div className="border-t border-gray-200 pt-4">
                  <div className="flex justify-between">
                    <span className="text-gray-800">الإجمالي</span>
                    <span className="text-pink-600 text-xl">{totalPrice} جنيه</span>
                  </div>
                </div>

                <div className="bg-teal-50 rounded-xl p-4 border border-teal-100">
                  <p className="text-teal-700 text-sm text-center">
                    ✓ الدفع عند الاستلام
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
