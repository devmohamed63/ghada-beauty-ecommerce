@extends('front.layouts.app')

@section('title', 'إتمام الطلب - Ghada Beauty')

@section('noindex', true)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50 py-12">
    <div class="container max-w-5xl">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-8">إتمام الطلب</h1>

        @if(session('cart_empty'))
        <div class="text-center bg-white p-12 rounded-2xl shadow-lg max-w-md mx-4">
            <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-4">السلة فارغة</h2>
            <p class="text-gray-600 mb-6">من فضلك أضيفي منتجات للسلة أولاً</p>
            <a href="{{ route('products.index') }}" class="btn-primary inline-block">تصفح المنتجات</a>
        </div>
        @else
        <form action="{{ route('checkout.store') }}" method="POST" class="grid md:grid-cols-3 gap-8">
            @csrf
            
            {{-- Order Form --}}
            <div class="md:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm p-8 border border-pink-50">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">بيانات التوصيل</h3>

                    <div class="space-y-5">
                        {{-- Name --}}
                        <div>
                            <label for="customer_name" class="block text-gray-700 mb-2 font-medium">
                                الاسم الكامل <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent @error('customer_name') border-red-500 @enderror" placeholder="اكتبي اسمك الكامل">
                            @error('customer_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="customer_phone" class="block text-gray-700 mb-2 font-medium">
                                رقم الهاتف <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="customer_phone" name="customer_phone" value="{{ old('customer_phone') }}" required pattern="01[0-2,5]{1}[0-9]{8}" maxlength="11" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent @error('customer_phone') border-red-500 @enderror" placeholder="01xxxxxxxxx" aria-describedby="phone-help">
                            <p id="phone-help" class="text-gray-500 text-xs mt-1">مثال: 01012345678</p>
                            @error('customer_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Governorate --}}
                        <div>
                            <label for="governorate_id" class="block text-gray-700 mb-2 font-medium">
                                المحافظة <span class="text-red-500">*</span>
                            </label>
                            <select id="governorate_id" name="governorate_id" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent @error('governorate_id') border-red-500 @enderror">
                                <option value="">اختاري المحافظة</option>
                                @foreach($governorates as $governorate)
                                    <option value="{{ $governorate->id }}" {{ old('governorate_id') == $governorate->id ? 'selected' : '' }}>{{ $governorate->name_ar }}</option>
                                @endforeach
                            </select>
                            @error('governorate_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- City --}}
                        <div>
                            <label for="city_id" class="block text-gray-700 mb-2 font-medium">
                                المدينة / المركز <span class="text-red-500">*</span>
                            </label>
                            <select id="city_id" name="city_id" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent @error('city_id') border-red-500 @enderror">
                                <option value="">اختاري المحافظة أولاً</option>
                            </select>
                            @error('city_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div>
                            <label for="address" class="block text-gray-700 mb-2 font-medium">
                                العنوان التفصيلي <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent @error('address') border-red-500 @enderror" placeholder="اسم الشارع / القرية / الحي">
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Notes --}}
                        <div>
                            <label for="notes" class="block text-gray-700 mb-2 font-medium">
                                ملاحظات إضافية (اختياري)
                            </label>
                            <textarea id="notes" name="notes" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent resize-none @error('notes') border-red-500 @enderror" placeholder="أي ملاحظات خاصة بالطلب أو التوصيل">{{ old('notes') }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" id="submit-order-btn" aria-label="تأكيد الطلب والدفع عند الاستلام" class="w-full mt-6 bg-gradient-to-r from-pink-500 to-teal-500 text-white px-8 py-4 rounded-full hover:shadow-xl transition-all flex items-center justify-center gap-3 text-lg group min-h-[56px] touch-manipulation disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                        <span id="submit-text">تأكيد الطلب – الدفع عند الاستلام</span>
                    </button>
                </div>
            </div>

            {{-- Order Summary --}}
            <div>
                <div class="bg-white rounded-2xl shadow-sm p-6 border border-pink-50 sticky top-24">
                    <h4 class="text-xl font-bold text-gray-800 mb-4">ملخص الطلب</h4>

                    <div class="space-y-4 mb-6">
                        @if(isset($cartSummary['items']) && count($cartSummary['items']) > 0)
                            @foreach($cartSummary['items'] as $item)
                            <div class="flex gap-4">
                                <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 bg-gradient-to-br from-pink-50 to-purple-50">
                                    <img src="{{ $item['image'] ?? asset('images/product-placeholder.jpg') }}" alt="{{ $item['name'] }} - منتج عناية بالبشرة" width="64" height="64" class="w-full h-full object-cover" loading="lazy">
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800 mb-1">{{ $item['name'] }}</h4>
                                    <p class="text-pink-600 text-sm">{{ number_format($item['price'], 0) }} جنيه × {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="border-t border-gray-200 pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">المجموع الفرعي</span>
                            <span class="text-gray-800 font-medium">{{ $cartSummary['formatted_total'] ?? '0 جنيه' }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">الشحن</span>
                            <span class="text-gray-800 font-medium">يُحسب عند التوصيل</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-800">الإجمالي</span>
                            <span class="text-2xl font-bold text-pink-600">{{ $cartSummary['formatted_total'] ?? '0 جنيه' }}</span>
                        </div>
                    </div>

                    <div class="bg-teal-50 rounded-xl p-4 border border-teal-100 mt-4">
                        <p class="text-teal-700 text-sm text-center font-medium">✓ الدفع عند الاستلام</p>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>

@push('scripts')
<script>
// Form submission loading state
document.querySelector('form').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submit-order-btn');
    const submitText = document.getElementById('submit-text');
    if (submitBtn && submitText) {
        submitBtn.disabled = true;
        submitText.innerHTML = '<svg class="animate-spin h-5 w-5 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> جاري المعالجة...';
    }
});

document.getElementById('governorate_id').addEventListener('change', function() {
    const governorateId = this.value;
    const citySelect = document.getElementById('city_id');
    
    citySelect.innerHTML = '<option value="">جاري التحميل...</option>';
    citySelect.disabled = true;
    
    if (!governorateId) {
        citySelect.innerHTML = '<option value="">اختاري المحافظة أولاً</option>';
        return;
    }
    
    fetch(`/api/governorates/${governorateId}/cities`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            citySelect.innerHTML = '<option value="">اختاري المدينة / المركز</option>';
            
            if (Array.isArray(data) && data.length > 0) {
                data.forEach(city => {
                    citySelect.innerHTML += `<option value="${city.id}">${city.name_ar}</option>`;
                });
            } else {
                citySelect.innerHTML = '<option value="">لا توجد مدن متاحة</option>';
            }
            
            citySelect.disabled = false;
        })
        .catch(error => {
            console.error('Error:', error);
            citySelect.innerHTML = '<option value="">حدث خطأ، حاولي مرة أخرى</option>';
            citySelect.disabled = false;
        });
});
</script>
@endpush
@endsection
