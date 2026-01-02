import { useState } from 'react';
import { Search } from 'lucide-react';
import { ProductCard } from '../components/ProductCard';
import { products, categories, skinTypes } from '../data/products';

export function ProductsPage() {
  const [searchQuery, setSearchQuery] = useState('');
  const [selectedCategory, setSelectedCategory] = useState('جميع المنتجات');
  const [selectedSkinType, setSelectedSkinType] = useState('جميع الأنواع');

  const filteredProducts = products.filter((product) => {
    const matchesSearch = product.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
      product.description.toLowerCase().includes(searchQuery.toLowerCase());
    const matchesCategory = selectedCategory === 'جميع المنتجات' || product.category === selectedCategory;
    const matchesSkinType = selectedSkinType === 'جميع الأنواع' || 
      product.skinTypes.includes(selectedSkinType) ||
      product.skinTypes.includes('جميع أنواع البشرة');

    return matchesSearch && matchesCategory && matchesSkinType;
  });

  return (
    <div className="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
      {/* Page Header */}
      <div className="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div className="container">
          <h1 className="text-white text-center mb-4">منتجاتنا</h1>
          <p className="text-white/90 text-center text-lg">
            اكتشفي أفضل منتجات العناية بالبشرة
          </p>
        </div>
      </div>

      <div className="container py-12">
        {/* Search and Filters */}
        <div className="bg-white rounded-2xl shadow-sm p-6 mb-8 border border-pink-50">
          {/* Search Bar */}
          <div className="mb-6">
            <div className="relative">
              <Search className="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" />
              <input
                type="text"
                placeholder="ابحثي عن منتج..."
                value={searchQuery}
                onChange={(e) => setSearchQuery(e.target.value)}
                className="w-full pr-12 pl-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent"
              />
            </div>
          </div>

          {/* Filters */}
          <div className="grid md:grid-cols-2 gap-6">
            {/* Category Filter */}
            <div>
              <label className="block text-gray-700 mb-2">نوع المنتج</label>
              <div className="flex flex-wrap gap-2">
                {categories.map((category) => (
                  <button
                    key={category}
                    onClick={() => setSelectedCategory(category)}
                    className={`px-4 py-2 rounded-full text-sm transition-all ${
                      selectedCategory === category
                        ? 'bg-pink-500 text-white shadow-md'
                        : 'bg-gray-100 text-gray-700 hover:bg-pink-100'
                    }`}
                  >
                    {category}
                  </button>
                ))}
              </div>
            </div>

            {/* Skin Type Filter */}
            <div>
              <label className="block text-gray-700 mb-2">نوع البشرة</label>
              <div className="flex flex-wrap gap-2">
                {skinTypes.map((skinType) => (
                  <button
                    key={skinType}
                    onClick={() => setSelectedSkinType(skinType)}
                    className={`px-4 py-2 rounded-full text-sm transition-all ${
                      selectedSkinType === skinType
                        ? 'bg-teal-500 text-white shadow-md'
                        : 'bg-gray-100 text-gray-700 hover:bg-teal-100'
                    }`}
                  >
                    {skinType}
                  </button>
                ))}
              </div>
            </div>
          </div>
        </div>

        {/* Results Count */}
        <div className="mb-6">
          <p className="text-gray-600">
            عرض {filteredProducts.length} من {products.length} منتج
          </p>
        </div>

        {/* Products Grid */}
        {filteredProducts.length > 0 ? (
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            {filteredProducts.map((product) => (
              <ProductCard key={product.id} product={product} />
            ))}
          </div>
        ) : (
          <div className="text-center py-20">
            <div className="w-24 h-24 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <Search className="w-12 h-12 text-pink-400" />
            </div>
            <h3 className="text-gray-700 mb-2">لا توجد منتجات</h3>
            <p className="text-gray-500 mb-6">
              جربي تغيير معايير البحث أو الفلاتر
            </p>
            <button
              onClick={() => {
                setSearchQuery('');
                setSelectedCategory('جميع المنتجات');
                setSelectedSkinType('جميع الأنواع');
              }}
              className="btn-primary"
            >
              إعادة تعيين الفلاتر
            </button>
          </div>
        )}
      </div>
    </div>
  );
}
