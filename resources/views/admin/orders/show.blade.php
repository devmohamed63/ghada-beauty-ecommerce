@extends('admin.layouts.app')

@section('title', 'تفاصيل الطلب #' . $order->id)

@section('content')
<div class="space-y-6">
    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">تفاصيل الطلب #{{ $order->id }}</h1>
            <p class="text-gray-600">عرض تفاصيل الطلب الكاملة</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="text-gray-600 hover:text-pink-500 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            <span>رجوع للطلبات</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Content --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Customer Information --}}
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 pb-3 border-b border-pink-100">معلومات العميل</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-600">الاسم الكامل</label>
                        <p class="font-semibold text-gray-800 mt-1">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600">رقم الهاتف</label>
                        <p class="font-semibold text-gray-800 mt-1">
                            <a href="tel:{{ $order->customer_phone }}" class="text-pink-600 hover:text-pink-700">{{ $order->customer_phone }}</a>
                        </p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm text-gray-600">المحافظة</label>
                        <p class="font-semibold text-gray-800 mt-1">{{ $order->governorate->name_ar ?? '' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm text-gray-600">المدينة / المركز</label>
                        <p class="font-semibold text-gray-800 mt-1">{{ $order->city->name_ar ?? '' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="text-sm text-gray-600">العنوان التفصيلي</label>
                        <p class="font-semibold text-gray-800 mt-1">{{ $order->address }}</p>
                    </div>
                    @if($order->notes)
                    <div class="sm:col-span-2">
                        <label class="text-sm text-gray-600">ملاحظات</label>
                        <p class="font-semibold text-gray-800 mt-1">{{ $order->notes }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Order Items --}}
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6 pb-3 border-b border-pink-100">عناصر الطلب</h2>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex gap-4 p-4 bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl">
                            <img src="{{ $item->product->getMainImageUrl('thumb') }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-xl flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-gray-800 mb-1">{{ $item->product->name }}</h3>
                                <p class="text-sm text-gray-600 mb-2">{{ $item->product->category->name }}</p>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-600">الكمية: <span class="font-semibold">{{ $item->quantity }}</span></p>
                                        <p class="text-sm text-gray-600">السعر: <span class="font-semibold">{{ number_format($item->price, 0) }} جنيه</span></p>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-lg font-bold text-pink-600">{{ number_format($item->subtotal, 0) }}</p>
                                        <p class="text-xs text-gray-500">جنيه</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Order Summary --}}
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 sticky top-24">
                <h2 class="text-xl font-bold text-gray-800 mb-6 pb-3 border-b border-pink-100">ملخص الطلب</h2>
                
                <div class="space-y-4 mb-6">
                    <div class="flex justify-between text-gray-600">
                        <span>عدد المنتجات:</span>
                        <span class="font-medium">{{ $order->items->count() }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>إجمالي الكمية:</span>
                        <span class="font-medium">{{ $order->items->sum('quantity') }}</span>
                    </div>
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-gray-800">الإجمالي:</span>
                            <span class="text-2xl font-bold text-pink-600">{{ number_format($order->total, 0) }} جنيه</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 pt-6 border-t border-pink-100">
                    <div>
                        <label class="text-sm text-gray-600 mb-2 block">حالة الطلب</label>
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-700',
                                'confirmed' => 'bg-blue-100 text-blue-700',
                                'shipped' => 'bg-purple-100 text-purple-700',
                                'delivered' => 'bg-green-100 text-green-700',
                                'cancelled' => 'bg-red-100 text-red-700',
                            ];
                            $statusLabels = [
                                'pending' => 'قيد الانتظار',
                                'confirmed' => 'مؤكد',
                                'shipped' => 'تم الشحن',
                                'delivered' => 'تم التسليم',
                                'cancelled' => 'ملغي',
                            ];
                            $statusColor = $statusColors[$order->status] ?? $statusColors['pending'];
                            $statusLabel = $statusLabels[$order->status] ?? $order->status;
                        @endphp
                        <span class="px-4 py-2 rounded-full text-sm font-medium {{ $statusColor }} block text-center">{{ $statusLabel }}</span>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600 mb-2 block">طريقة الدفع</label>
                        <p class="font-semibold text-gray-800">{{ $order->payment_method == 'cod' ? 'الدفع عند الاستلام' : 'أونلاين' }}</p>
                    </div>

                    <div>
                        <label class="text-sm text-gray-600 mb-2 block">تاريخ الطلب</label>
                        <p class="font-semibold text-gray-800">{{ $order->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>

                {{-- Update Status Form --}}
                <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="mt-6 pt-6 border-t border-pink-100">
                    @csrf
                    @method('PATCH')
                    <label for="status" class="block text-sm font-bold text-gray-700 mb-2">تغيير الحالة</label>
                    <select name="status" id="status" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800 mb-4">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>تم الشحن</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>تم التسليم</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                    </select>
                    <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all">
                        تحديث الحالة
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
