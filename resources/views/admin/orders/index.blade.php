@extends('admin.layouts.app')

@section('title', 'إدارة الطلبات')

@section('content')
<div class="space-y-6">
    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-gradient-to-r from-teal-50 to-green-50 border-2 border-teal-400 text-teal-800 px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3">
            <svg class="w-6 h-6 text-teal-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">إدارة الطلبات</h1>
            <p class="text-gray-600">عرض وإدارة جميع طلبات العملاء</p>
        </div>
        <a 
            href="{{ route('admin.orders.export', request()->query()) }}" 
            class="bg-gray-900 hover:bg-gray-800 text-white px-8 py-4 rounded-xl shadow-2xl hover:shadow-2xl transition-all flex items-center gap-3 justify-center font-bold text-lg border-4 border-gray-700 min-w-[200px]"
            style="background-color: #111827 !important; color: #ffffff !important;"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3" style="color: #ffffff !important;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span style="color: #ffffff !important; font-weight: bold !important;">تصدير Excel</span>
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-4 md:p-6">
        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex flex-col sm:flex-row gap-4">
            <input 
                type="text" 
                name="search" 
                value="{{ $filters['search'] ?? '' }}" 
                placeholder="ابحث بالاسم أو الهاتف..." 
                class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
            >
            <select 
                name="status" 
                class="px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
            >
                <option value="">جميع الحالات</option>
                <option value="pending" {{ ($filters['status'] ?? '') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                <option value="confirmed" {{ ($filters['status'] ?? '') == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                <option value="shipped" {{ ($filters['status'] ?? '') == 'shipped' ? 'selected' : '' }}>تم الشحن</option>
                <option value="delivered" {{ ($filters['status'] ?? '') == 'delivered' ? 'selected' : '' }}>تم التسليم</option>
                <option value="cancelled" {{ ($filters['status'] ?? '') == 'cancelled' ? 'selected' : '' }}>ملغي</option>
            </select>
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-xl hover:shadow-lg transition-all">
                بحث
            </button>
        </form>
    </div>

    {{-- Status Statistics --}}
    <div class="flex flex-wrap gap-2 justify-center md:justify-start">
        @php
            $statusColors = [
                'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-300',
                'confirmed' => 'bg-blue-100 text-blue-700 border-blue-300',
                'shipped' => 'bg-purple-100 text-purple-700 border-purple-300',
                'delivered' => 'bg-green-100 text-green-700 border-green-300',
                'cancelled' => 'bg-red-100 text-red-700 border-red-300',
            ];
        @endphp
        @foreach(['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'] as $status)
            <a 
                href="{{ route('admin.orders.index', ['status' => $status] + request()->except('status')) }}"
                class="px-3 py-1.5 rounded-lg text-xs font-medium border {{ $statusColors[$status] ?? 'bg-gray-100 text-gray-700 border-gray-300' }} hover:shadow-md transition-all {{ ($filters['status'] ?? '') == $status ? 'ring-2 ring-pink-400' : '' }}"
            >
                {{ $statusLabels[$status] ?? $status }}: <span class="font-bold">{{ $statusCounts[$status] ?? 0 }}</span>
            </a>
        @endforeach
    </div>

    {{-- Mobile View: Cards --}}
    <div class="md:hidden space-y-4 mb-6">
        @php
            $ordersList = $orders->items();
            $ordersCount = count($ordersList);
        @endphp
        @if($ordersCount > 0)
            @foreach($ordersList as $order)
                @include('admin.components.order-card', ['order' => $order])
            @endforeach
        @else
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-12 text-center">
                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">لا توجد طلبات</h2>
                <p class="text-gray-600">لم يتم إنشاء أي طلبات بعد</p>
            </div>
        @endif
    </div>

    {{-- Desktop View: Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-pink-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-pink-50 to-purple-50">
                    <tr>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">#</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">العميل</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الهاتف</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الإجمالي</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الحالة</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">التاريخ</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">إجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    @php
                        $ordersList = $orders->items();
                        $ordersCount = count($ordersList);
                    @endphp
                    @if($ordersCount > 0)
                        @foreach($ordersList as $order)
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
                            <tr class="hover:bg-pink-50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-gray-800">#{{ $order->id }}</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $order->customer_name }}</p>
                                        <p class="text-sm text-gray-500">{{ $order->governorate->name_ar ?? '' }} - {{ $order->city->name_ar ?? '' }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $order->customer_phone }}</td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-pink-600">{{ number_format($order->total, 0) }}</span>
                                    <span class="text-sm text-gray-500">جنيه</span>
                                </td>
                                <td class="px-6 py-4">
                                    <form method="POST" action="{{ route('admin.orders.update', $order) }}" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status_filter" value="{{ $filters['status'] ?? '' }}">
                                        <input type="hidden" name="search_filter" value="{{ $filters['search'] ?? '' }}">
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
                                </td>
                                <td class="px-6 py-4 text-gray-600 text-sm">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-teal-500 text-white rounded-full text-sm hover:shadow-lg transition-all">
                                        عرض
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">لا توجد طلبات</h3>
                                <p class="text-gray-600">لم يتم إنشاء أي طلبات بعد</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    @if($orders->hasPages())
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @endif
</div>

@push('scripts')
<script>
function updateOrderStatus(event, form, orderId) {
    // Allow form to submit normally
    // The form will submit and page will reload with success message
    return true;
}
</script>
@endpush
@endsection
