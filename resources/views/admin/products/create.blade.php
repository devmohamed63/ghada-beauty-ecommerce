@extends('admin.layouts.app')

@section('title', 'إضافة منتج جديد')

@section('content')
<div class="space-y-6 md:space-y-8">
    {{-- Page Header --}}
    <div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">إضافة منتج جديد</h1>
        <p class="text-gray-600">أضف منتج جديد إلى المتجر</p>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 md:p-8 space-y-6">
        @csrf

        {{-- General Information Section --}}
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">المعلومات العامة</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Category --}}
                <div>
                    <label for="category_id" class="block text-sm font-bold text-gray-700 mb-2">الفئة <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                        <option value="">اختر الفئة</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">اسم المنتج <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Price --}}
                <div>
                    <label for="price" class="block text-sm font-bold text-gray-700 mb-2">السعر (جنيه) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Stock --}}
                <div>
                    <label for="stock" class="block text-sm font-bold text-gray-700 mb-2">المخزون <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                    @error('stock')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Skin Type --}}
                <div>
                    <label for="skin_type" class="block text-sm font-bold text-gray-700 mb-2">نوع البشرة</label>
                    <select name="skin_type" id="skin_type" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                        <option value="">جميع أنواع البشرة</option>
                        <option value="oily" {{ old('skin_type') == 'oily' ? 'selected' : '' }}>دهنية</option>
                        <option value="dry" {{ old('skin_type') == 'dry' ? 'selected' : '' }}>جافة</option>
                        <option value="combination" {{ old('skin_type') == 'combination' ? 'selected' : '' }}>مختلطة</option>
                        <option value="sensitive" {{ old('skin_type') == 'sensitive' ? 'selected' : '' }}>حساسة</option>
                        <option value="all" {{ old('skin_type') == 'all' ? 'selected' : '' }}>جميع الأنواع</option>
                    </select>
                    @error('skin_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">الوصف <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="6" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Visibility Flags Section --}}
        <div class="space-y-6 pt-6 border-t border-pink-100">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">إعدادات العرض</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Is Active --}}
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 border-pink-100 hover:border-pink-300 cursor-pointer transition-all">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500">
                    <div>
                        <span class="font-bold text-gray-800 block">نشط</span>
                        <span class="text-xs text-gray-600">عرض المنتج في المتجر</span>
                    </div>
                </label>

                {{-- Is Featured --}}
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 border-pink-100 hover:border-pink-300 cursor-pointer transition-all">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500">
                    <div>
                        <span class="font-bold text-gray-800 block">مميز</span>
                        <span class="text-xs text-gray-600">عرض في القسم المميز</span>
                    </div>
                </label>

                {{-- Is Best Seller --}}
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 border-pink-100 hover:border-pink-300 cursor-pointer transition-all">
                    <input type="checkbox" name="is_best_seller" value="1" {{ old('is_best_seller') ? 'checked' : '' }} class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500">
                    <div>
                        <span class="font-bold text-gray-800 block">الأكثر مبيعاً</span>
                        <span class="text-xs text-gray-600">عرض كأكثر منتج مبيعاً</span>
                    </div>
                </label>
            </div>
        </div>

        {{-- Images Section --}}
        <div class="space-y-6 pt-6 border-t border-pink-100">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">صور المنتج</h2>
            
            <div>
                <label for="images" class="block text-sm font-bold text-gray-700 mb-2">رفع الصور</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                <p class="mt-1 text-xs text-gray-500">يمكنك رفع عدة صور (JPG, PNG, WEBP - الحد الأقصى 2MB لكل صورة)</p>
                @error('images.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Results Section --}}
        <div class="space-y-6 pt-6 border-t border-pink-100">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">صور النتائج</h2>
            
            <div>
                <label for="results" class="block text-sm font-bold text-gray-700 mb-2">رفع صور النتائج</label>
                <input type="file" name="results[]" id="results" multiple accept="image/*" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                <p class="mt-1 text-xs text-gray-500">يمكنك رفع عدة صور للنتائج (JPG, PNG, WEBP - الحد الأقصى 2MB لكل صورة)</p>
                @error('results.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Form Actions --}}
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-pink-100">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                حفظ المنتج
            </button>
            <a href="{{ route('admin.products.index') }}" class="bg-white text-gray-700 border border-gray-200 px-6 py-3 rounded-full hover:bg-gray-50 transition-all flex items-center justify-center">
                إلغاء
            </a>
        </div>
    </form>
</div>

@endsection

