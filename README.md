# 🌸 Ghada Beauty Store

> **GitHub Description (Short):**
> 
> 🌸 منصة تجارة إلكترونية متكاملة لبيع منتجات العناية بالبشرة والشعر - E-commerce platform for beauty products built with Laravel 12 & React

---

<div dir="rtl">

## متجر غادة للجمال - منصة تجارة إلكترونية متكاملة

منصة تجارة إلكترونية متكاملة ومتطورة لبيع منتجات العناية بالبشرة والشعر. تم تطويرها باستخدام Laravel 12 و React، وتوفر تجربة مستخدم سلسة وإدارة شاملة للمنتجات والطلبات.

</div>

## 📋 Description

A comprehensive and modern e-commerce platform for beauty and skincare products. Built with Laravel 12 and React, providing a seamless user experience and complete product and order management system.

---

## ✨ Features

<div dir="rtl">

### للمستخدمين:
- 🛍️ **تصفح المنتجات**: تصفح شامل للمنتجات مع فئات متعددة
- 🔍 **بحث وفلترة**: بحث متقدم وفلترة حسب الفئة ونوع البشرة
- 🛒 **سلة التسوق**: نظام سلة تسوق متكامل
- 📦 **إدارة الطلبات**: تتبع الطلبات وحالة الشحن
- 💆 **روتين البشرة**: أداة ذكية لاختيار روتين العناية المناسب
- 📍 **خدمة التوصيل**: دعم كامل لمحافظات ومدن مصر
- 📱 **تطبيق ويب تقدمي (PWA)**: يعمل كتطبيق على الهاتف

### للمديرين:
- 📊 **لوحة تحكم شاملة**: إدارة كاملة للمنتجات والطلبات
- 📈 **تقارير مبيعات**: تقارير تفصيلية وتصدير Excel
- 🖼️ **إدارة الصور**: رفع وإدارة صور المنتجات بسهولة
- 👥 **إدارة المستخدمين**: نظام مصادقة وإدارة المستخدمين
- 📧 **إشعارات البريد**: إشعارات تلقائية للطلبات الجديدة

</div>

### For Users:
- 🛍️ **Product Browsing**: Comprehensive product catalog with multiple categories
- 🔍 **Search & Filter**: Advanced search and filtering by category and skin type
- 🛒 **Shopping Cart**: Complete shopping cart system
- 📦 **Order Management**: Track orders and shipping status
- 💆 **Skin Routine**: Smart tool to choose the right skincare routine
- 📍 **Delivery Service**: Full support for Egyptian governorates and cities
- 📱 **Progressive Web App (PWA)**: Works as a mobile app

### For Administrators:
- 📊 **Comprehensive Dashboard**: Complete product and order management
- 📈 **Sales Reports**: Detailed reports and Excel export
- 🖼️ **Image Management**: Easy product image upload and management
- 👥 **User Management**: Authentication and user management system
- 📧 **Email Notifications**: Automatic notifications for new orders

---

## 🛠️ Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templates, React (in `skin/` directory)
- **Styling**: Tailwind CSS
- **Database**: SQLite (development) / MySQL (production)
- **Media Management**: Spatie Media Library
- **Excel Export**: Maatwebsite Excel
- **Authentication**: Laravel Breeze

---

## 📦 Installation

<div dir="rtl">

### المتطلبات:
- PHP 8.2 أو أحدث
- Composer
- Node.js و npm
- SQLite أو MySQL

### خطوات التثبيت:

1. استنساخ المستودع:
```bash
git clone https://github.com/yourusername/ghada-beauty-store.git
cd ghada-beauty-store
```

2. تثبيت التبعيات:
```bash
composer install
npm install
```

3. إعداد البيئة:
```bash
cp .env.example .env
php artisan key:generate
```

4. إعداد قاعدة البيانات:
```bash
php artisan migrate --seed
```

5. بناء الأصول:
```bash
npm run build
```

6. تشغيل الخادم:
```bash
php artisan serve
```

</div>

### Requirements:
- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite or MySQL

### Installation Steps:

1. Clone the repository:
```bash
git clone https://github.com/yourusername/ghada-beauty-store.git
cd ghada-beauty-store
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Setup database:
```bash
php artisan migrate --seed
```

5. Build assets:
```bash
npm run build
```

6. Run the server:
```bash
php artisan serve
```

---

## 🚀 Quick Start

<div dir="rtl">

استخدم الأمر التالي لإعداد المشروع بالكامل:

```bash
composer run setup
```

لتشغيل بيئة التطوير:

```bash
composer run dev
```

</div>

Use the following command to set up the entire project:

```bash
composer run setup
```

To run the development environment:

```bash
composer run dev
```

---

## 📁 Project Structure

```
ghada-beauty-store/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/              # Eloquent models
│   ├── Services/            # Business logic services
│   └── Exports/             # Excel export classes
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Stylesheets
│   └── js/                  # JavaScript files
├── routes/                  # Application routes
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
└── skin/                    # React frontend (optional)
```

---

## 🔐 Default Admin Account

<div dir="rtl">

بعد تشغيل الـ seeders، يمكنك تسجيل الدخول بحساب المدير الافتراضي:

- **البريد الإلكتروني**: admin@ghadabeauty.com
- **كلمة المرور**: password

⚠️ **مهم**: يرجى تغيير كلمة المرور فوراً في بيئة الإنتاج!

</div>

After running the seeders, you can log in with the default admin account:

- **Email**: admin@ghadabeauty.com
- **Password**: password

⚠️ **Important**: Please change the password immediately in production!

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👥 Contributing

<div dir="rtl">

نرحب بمساهماتكم! يرجى قراءة دليل المساهمة قبل إرسال Pull Request.

</div>

Contributions are welcome! Please read the contributing guide before submitting a Pull Request.

---

## 📞 Contact

<div dir="rtl">

للاستفسارات والدعم، يرجى التواصل عبر:

- **البريد الإلكتروني**: support@ghadabeauty.com
- **الموقع**: [www.ghadabeauty.com](https://www.ghadabeauty.com)

</div>

For inquiries and support, please contact:

- **Email**: support@ghadabeauty.com
- **Website**: [www.ghadabeauty.com](https://www.ghadabeauty.com)

---

<div dir="rtl">

## 🌟 المميزات التقنية

- ✅ **RESTful API**: واجهة برمجية نظيفة ومنظمة
- ✅ **Responsive Design**: تصميم متجاوب يعمل على جميع الأجهزة
- ✅ **SEO Optimized**: محسّن لمحركات البحث
- ✅ **Image Optimization**: تحسين تلقائي للصور
- ✅ **Queue System**: معالجة المهام في الخلفية
- ✅ **Email Notifications**: إشعارات بريد إلكتروني تلقائية
- ✅ **Excel Reports**: تقارير قابلة للتصدير بصيغة Excel

</div>

## 🌟 Technical Features

- ✅ **RESTful API**: Clean and organized API structure
- ✅ **Responsive Design**: Works on all devices
- ✅ **SEO Optimized**: Search engine optimized
- ✅ **Image Optimization**: Automatic image optimization
- ✅ **Queue System**: Background job processing
- ✅ **Email Notifications**: Automatic email notifications
- ✅ **Excel Reports**: Exportable Excel reports

---

<div dir="rtl" align="center">

**صُنع بـ ❤️ باستخدام Laravel**

</div>

<div align="center">

**Made with ❤️ using Laravel**

</div>
