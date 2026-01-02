# 🌸 Ghada Beauty Store

> 🌸 منصة تجارة إلكترونية متكاملة لبيع منتجات العناية بالبشرة والشعر - E-commerce platform for beauty products built with Laravel 12 & React

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

### Requirements:
- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite or MySQL

### Installation Steps:

1. Clone the repository:
```bash
git clone https://github.com/devmohamed63/ghada-beauty-ecommerce.git
cd ghada-beauty-ecommerce
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

### Quick Setup:
```bash
composer run setup
```

### Development:
```bash
composer run dev
```

---

## 📁 Project Structure

```
ghada-beauty-ecommerce/
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

After running the seeders, you can log in with the default admin account:

- **Email**: admin@ghadabeauty.com
- **Password**: password

⚠️ **Important**: Please change the password immediately in production!

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
