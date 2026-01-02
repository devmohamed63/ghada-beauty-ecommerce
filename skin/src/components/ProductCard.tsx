import { ShoppingCart } from 'lucide-react';
import { Link } from 'react-router-dom';
import type { Product } from '../data/products';

interface ProductCardProps {
  product: Product;
}

export function ProductCard({ product }: ProductCardProps) {
  return (
    <div className="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-pink-50">
      <Link to={`/product/${product.id}`}>
        <div className="relative overflow-hidden aspect-square">
          <img
            src={product.image}
            alt={product.name}
            className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
          />
          <div className="absolute top-3 right-3">
            <span className="bg-teal-400 text-white text-xs px-3 py-1 rounded-full shadow-md">
              {product.skinTypes[0]}
            </span>
          </div>
        </div>
      </Link>

      <div className="p-5">
        <Link to={`/product/${product.id}`}>
          <h4 className="text-gray-800 mb-2 group-hover:text-pink-500 transition-colors">
            {product.name}
          </h4>
        </Link>
        
        <p className="text-gray-500 text-sm mb-3 line-clamp-2">
          {product.description}
        </p>

        <div className="flex items-center justify-between">
          <div>
            <span className="text-pink-600 text-xl">{product.price} جنيه</span>
          </div>
          
          <Link
            to={`/checkout?product=${product.id}`}
            className="bg-gradient-to-r from-pink-400 to-teal-400 text-white px-4 py-2 rounded-full text-sm hover:shadow-lg transition-all flex items-center gap-2 group-hover:scale-105"
          >
            <ShoppingCart className="w-4 h-4" />
            <span>اطلبي الآن</span>
          </Link>
        </div>
      </div>
    </div>
  );
}
