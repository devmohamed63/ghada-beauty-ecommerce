@props(['order'])

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

<div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 hover:shadow-md transition-all">
    <div class="flex items-start justify-between mb-4">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
                <span class="text-lg font-bold text-gray-800">#{{ $order->id }}</span>
                <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="inline-block">
                    @csrf
                    @method('PATCH')
                    <select 
                        name="status" 
                        class="px-3 py-1.5 rounded-full text-xs font-medium border-0 focus:ring-2 focus:ring-pink-300 transition-all cursor-pointer {{ $statusColor }}"
                        onchange="this.form.submit()"
                    >
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>تم الشحن</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>تم التسليم</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                    </select>
                </form>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $order->customer_name }}</h3>
            <p class="text-gray-600 text-sm mb-2">{{ $order->customer_phone }}</p>
            <p class="text-gray-500 text-xs">{{ $order->governorate->name_ar ?? '' }} - {{ $order->city->name_ar ?? '' }}</p>
        </div>
        <div class="text-left">
            <p class="text-2xl font-bold text-pink-600 mb-1">{{ number_format($order->total, 0) }}</p>
            <p class="text-xs text-gray-500">جنيه</p>
        </div>
    </div>
    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
        <span class="text-xs text-gray-500">{{ $order->created_at->format('Y-m-d H:i') }}</span>
        <a href="{{ route('admin.orders.show', $order) }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-teal-500 text-white rounded-full text-sm hover:shadow-lg transition-all">
            عرض التفاصيل
        </a>
    </div>
</div>

