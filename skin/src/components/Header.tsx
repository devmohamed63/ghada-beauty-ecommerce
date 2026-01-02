import { useState } from 'react';
import { Menu, X, Phone, ShoppingCart } from 'lucide-react';
import { Link, useLocation } from 'react-router-dom';

export function Header() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const location = useLocation();

  const navLinks = [
    { name: 'الرئيسية', path: '/' },
    { name: 'المنتجات', path: '/products' },
    { name: 'روتين البشرة', path: '/skin-routine' },
    { name: 'من نحن', path: '/about' },
    { name: 'تواصل معنا', path: '/contact' }
  ];

  const isActive = (path: string) => location.pathname === path;

  return (
    <header className="bg-white shadow-sm sticky top-0 z-50">
      <div className="container">
        <div className="flex items-center justify-between py-4">
          {/* Logo */}
          <Link to="/" className="flex items-center gap-3">
            <img 
              src="https://images.unsplash.com/photo-1616750819574-7e38aa8046fa?w=80&h=80&fit=crop" 
              alt="Kayan Cosmetics Logo" 
              className="w-12 h-12 rounded-full object-cover"
            />
            <div>
              <h3 className="text-pink-600">كيان كوزمتكس</h3>
              <p className="text-xs text-gray-500">Kayan Cosmetics</p>
            </div>
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center gap-8">
            {navLinks.map((link) => (
              <Link
                key={link.path}
                to={link.path}
                className={`transition-colors hover:text-pink-500 ${
                  isActive(link.path) ? 'text-pink-500' : 'text-gray-700'
                }`}
              >
                {link.name}
              </Link>
            ))}
          </nav>

          {/* Contact Button & Menu Toggle */}
          <div className="flex items-center gap-4">
            <a
              href="tel:01067565298"
              className="hidden md:flex items-center gap-2 bg-teal-400 text-white px-4 py-2 rounded-full hover:bg-teal-500 transition-colors"
            >
              <Phone className="w-4 h-4" />
              <span className="text-sm">اتصل بنا</span>
            </a>

            {/* Mobile Menu Toggle */}
            <button
              onClick={() => setIsMenuOpen(!isMenuOpen)}
              className="md:hidden p-2 text-gray-700 hover:text-pink-500"
              aria-label="Toggle menu"
            >
              {isMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </div>

        {/* Mobile Navigation */}
        {isMenuOpen && (
          <nav className="md:hidden pb-4 border-t border-gray-100 pt-4">
            <div className="flex flex-col gap-3">
              {navLinks.map((link) => (
                <Link
                  key={link.path}
                  to={link.path}
                  onClick={() => setIsMenuOpen(false)}
                  className={`py-2 px-4 rounded-lg transition-colors ${
                    isActive(link.path)
                      ? 'bg-pink-50 text-pink-600'
                      : 'text-gray-700 hover:bg-gray-50'
                  }`}
                >
                  {link.name}
                </Link>
              ))}
              <a
                href="tel:01067565298"
                className="flex items-center justify-center gap-2 bg-teal-400 text-white px-4 py-2 rounded-lg hover:bg-teal-500 transition-colors mt-2"
              >
                <Phone className="w-4 h-4" />
                <span>01067565298</span>
              </a>
            </div>
          </nav>
        )}
      </div>
    </header>
  );
}
