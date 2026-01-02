import { ShoppingCart, ChevronRight, ChevronLeft, Flame } from 'lucide-react';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { products } from '../data/products';

export function BestSellingProducts() {
  // Select best selling products (first 6 products as example)
  const bestSellingProducts = products.slice(0, 6);
  
  const [currentSlide, setCurrentSlide] = useState(0);
  const [slidesToShow, setSlidesToShow] = useState(4);

  // Handle responsive slides
  useEffect(() => {
    const handleResize = () => {
      if (window.innerWidth < 480) {
        setSlidesToShow(1);
      } else if (window.innerWidth < 768) {
        setSlidesToShow(2);
      } else if (window.innerWidth < 1024) {
        setSlidesToShow(3);
      } else {
        setSlidesToShow(4);
      }
    };

    handleResize();
    window.addEventListener('resize', handleResize);
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  // Auto-play
  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentSlide((prev) => 
        prev >= bestSellingProducts.length - slidesToShow ? 0 : prev + 1
      );
    }, 3000);

    return () => clearInterval(interval);
  }, [slidesToShow, bestSellingProducts.length]);

  const nextSlide = () => {
    setCurrentSlide((prev) => 
      prev >= bestSellingProducts.length - slidesToShow ? 0 : prev + 1
    );
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => 
      prev <= 0 ? bestSellingProducts.length - slidesToShow : prev - 1
    );
  };

  const goToSlide = (index: number) => {
    setCurrentSlide(index);
  };

  return (
    <div className="relative px-4">
      {/* Slider Container */}
      <div className="overflow-hidden">
        <div 
          className="flex transition-transform duration-700 ease-in-out"
          style={{ 
            transform: `translateX(${currentSlide * (100 / slidesToShow)}%)`,
          }}
        >
          {bestSellingProducts.map((product) => (
            <div 
              key={product.id} 
              className="flex-shrink-0 px-3"
              style={{ width: `${100 / slidesToShow}%` }}
            >
              <div className="group bg-white rounded-3xl shadow-md hover:shadow-2xl transition-all duration-500 overflow-hidden border border-pink-100 hover:border-pink-300">
                <Link to={`/product/${product.id}`}>
                  <div className="relative overflow-hidden aspect-square bg-gradient-to-br from-pink-50 to-purple-50">
                    <img
                      src={product.image}
                      alt={product.name}
                      className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    />
                    {/* Best Seller Tag */}
                    <div className="absolute top-4 left-4">
                      <span className="bg-gradient-to-r from-orange-500 to-pink-500 text-white text-xs px-4 py-2 rounded-full shadow-lg flex items-center gap-1.5 animate-pulse">
                        <Flame className="w-4 h-4" />
                        الأكثر مبيعًا
                      </span>
                    </div>
                    {/* Skin Type Tag */}
                    <div className="absolute top-4 right-4">
                      <span className="bg-teal-500 text-white text-xs px-4 py-2 rounded-full shadow-lg backdrop-blur-sm">
                        {product.skinTypes[0]}
                      </span>
                    </div>
                  </div>
                </Link>

                <div className="p-6">
                  <Link to={`/product/${product.id}`}>
                    <h4 className="text-gray-800 mb-3 group-hover:text-pink-500 transition-colors min-h-[3rem]">
                      {product.name}
                    </h4>
                  </Link>
                  
                  <p className="text-gray-500 text-sm mb-4 line-clamp-2 min-h-[2.5rem]">
                    {product.description}
                  </p>

                  <div className="flex items-center justify-between pt-2 border-t border-pink-50">
                    <div>
                      <span className="text-pink-600 text-2xl">{product.price}</span>
                      <span className="text-gray-500 text-sm mr-1">جنيه</span>
                    </div>
                    
                    <Link
                      to={`/checkout?product=${product.id}`}
                      className="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-5 py-2.5 rounded-full text-sm hover:shadow-xl transition-all flex items-center gap-2 group-hover:scale-110 hover:from-pink-600 hover:to-teal-600"
                    >
                      <ShoppingCart className="w-4 h-4" />
                      <span>اطلبي الآن</span>
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      {/* Navigation Arrows - Hidden on mobile */}
      {slidesToShow < bestSellingProducts.length && (
        <>
          <button
            onClick={prevSlide}
            className="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 w-12 h-12 bg-white rounded-full shadow-xl items-center justify-center text-pink-500 hover:bg-pink-500 hover:text-white transition-all hover:scale-110 border-2 border-pink-100"
            aria-label="التالي"
          >
            <ChevronRight className="w-6 h-6" />
          </button>
          
          <button
            onClick={nextSlide}
            className="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 w-12 h-12 bg-white rounded-full shadow-xl items-center justify-center text-pink-500 hover:bg-pink-500 hover:text-white transition-all hover:scale-110 border-2 border-pink-100"
            aria-label="السابق"
          >
            <ChevronLeft className="w-6 h-6" />
          </button>
        </>
      )}

      {/* Dots Indicator */}
      <div className="flex justify-center gap-2.5 mt-10">
        {Array.from({ length: Math.ceil(bestSellingProducts.length - slidesToShow + 1) }).map((_, index) => (
          <button
            key={index}
            onClick={() => goToSlide(index)}
            className={`h-2.5 rounded-full transition-all duration-300 ${
              currentSlide === index 
                ? 'w-8 bg-gradient-to-r from-pink-500 to-teal-500 shadow-md' 
                : 'w-2.5 bg-gray-300 hover:bg-pink-300 hover:w-4'
            }`}
            aria-label={`الذهاب إلى الشريحة ${index + 1}`}
          />
        ))}
      </div>
    </div>
  );
}