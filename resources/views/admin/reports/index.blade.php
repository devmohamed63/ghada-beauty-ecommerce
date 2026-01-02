@extends('admin.layouts.app')

@section('title', 'الحسابات والتقارير')

@section('content')
<div class="space-y-6 md:space-y-8" x-data="reportsData()">
    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">الحسابات والتقارير</h1>
            <p class="text-gray-600">تقارير شاملة عن المبيعات والإحصائيات</p>
        </div>
        <a 
            href="{{ route('admin.reports.export', request()->query()) }}" 
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
        <form method="GET" action="{{ route('admin.reports.index') }}" class="space-y-4" @submit.prevent="applyFilters()">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">من تاريخ</label>
                    <input 
                        type="date" 
                        name="from_date" 
                        value="{{ $filters['from_date'] ?? '' }}" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">إلى تاريخ</label>
                    <input 
                        type="date" 
                        name="to_date" 
                        value="{{ $filters['to_date'] ?? '' }}" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">حالة الطلب</label>
                    <select 
                        name="status" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
                    >
                        <option value="">جميع الحالات</option>
                        <option value="pending" {{ ($filters['status'] ?? '') == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="confirmed" {{ ($filters['status'] ?? '') == 'confirmed' ? 'selected' : '' }}>مؤكد</option>
                        <option value="completed" {{ ($filters['status'] ?? '') == 'completed' ? 'selected' : '' }}>مكتمل</option>
                        <option value="cancelled" {{ ($filters['status'] ?? '') == 'cancelled' ? 'selected' : '' }}>ملغي</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">طريقة الدفع</label>
                    <select 
                        name="payment_method" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
                    >
                        <option value="">جميع الطرق</option>
                        <option value="cod" {{ ($filters['payment_method'] ?? '') == 'cod' ? 'selected' : '' }}>الدفع عند الاستلام</option>
                        <option value="bank_transfer" {{ ($filters['payment_method'] ?? '') == 'bank_transfer' ? 'selected' : '' }}>تحويل بنكي</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">المحافظة</label>
                    <select 
                        name="governorate_id" 
                        x-model="filters.governorate_id"
                        @change="loadCities()"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
                    >
                        <option value="">جميع المحافظات</option>
                        @foreach($governorates as $governorate)
                            <option value="{{ $governorate->id }}" {{ ($filters['governorate_id'] ?? '') == $governorate->id ? 'selected' : '' }}>
                                {{ $governorate->name_ar }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">المدينة</label>
                    <select 
                        name="city_id" 
                        x-model="filters.city_id"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300"
                        :disabled="!filters.governorate_id"
                    >
                        <option value="">جميع المدن</option>
                        <template x-for="city in cities" :key="city.id">
                            <option :value="city.id" x-text="city.name_ar"></option>
                        </template>
                    </select>
                </div>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-xl hover:shadow-lg transition-all">
                    تطبيق الفلاتر
                </button>
                <a href="{{ route('admin.reports.index') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-xl hover:bg-gray-300 transition-all">
                    إعادة تعيين
                </a>
            </div>
        </form>
    </div>

    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        @include('admin.components.stat-card', [
            'title' => 'إجمالي المبيعات',
            'value' => number_format($summary['total_sales'], 2) . ' جنيه',
            'color' => 'pink',
            'icon' => '<svg class="w-7 h-7 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'title' => 'عدد الطلبات',
            'value' => $summary['total_orders'],
            'color' => 'teal',
            'icon' => '<svg class="w-7 h-7 text-teal-600" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'title' => 'متوسط قيمة الطلب',
            'value' => number_format($summary['average_order_value'], 2) . ' جنيه',
            'color' => 'purple',
            'icon' => '<svg class="w-7 h-7 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>'
        ])
        
        @include('admin.components.stat-card', [
            'title' => 'المنتجات المباعة',
            'value' => $summary['total_products_sold'],
            'color' => 'orange',
            'icon' => '<svg class="w-7 h-7 text-orange-600" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>'
        ])
    </div>

    {{-- Orders Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-pink-100 overflow-hidden">
        <div class="p-6 border-b border-pink-100 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">الطلبات المفلترة</h3>
            <a 
                href="{{ route('admin.reports.export', request()->query()) }}" 
                class="bg-gray-900 hover:bg-gray-800 text-white px-6 py-3 rounded-xl shadow-2xl hover:shadow-2xl transition-all flex items-center gap-2 font-bold border-4 border-gray-700"
                style="background-color: #111827 !important; color: #ffffff !important;"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3" style="color: #ffffff !important;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span style="color: #ffffff !important; font-weight: bold !important;">تصدير Excel</span>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-pink-50 to-purple-50">
                    <tr>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">#</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">العميل</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الهاتف</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">المحافظة/المدينة</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الإجمالي</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الحالة</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">التاريخ</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    @if($orders->count() > 0)
                        @foreach($orders as $order)
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'confirmed' => 'bg-blue-100 text-blue-700',
                                    'completed' => 'bg-green-100 text-green-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                ];
                                $statusLabels = [
                                    'pending' => 'قيد الانتظار',
                                    'confirmed' => 'مؤكد',
                                    'completed' => 'مكتمل',
                                    'cancelled' => 'ملغي',
                                ];
                                $statusColor = $statusColors[$order->status] ?? $statusColors['pending'];
                                $statusLabel = $statusLabels[$order->status] ?? $order->status;
                            @endphp
                            <tr class="hover:bg-pink-50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-gray-800">#{{ $order->id }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-800">{{ $order->customer_name }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $order->customer_phone }}</td>
                                <td class="px-6 py-4 text-gray-600">
                                    {{ $order->governorate?->name_ar ?? '-' }} - {{ $order->city?->name_ar ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-pink-600">{{ number_format($order->total, 2) }}</span>
                                    <span class="text-sm text-gray-500">جنيه</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600 text-sm">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">لا توجد طلبات</h3>
                                <p class="text-gray-600">لم يتم العثور على طلبات تطابق الفلاتر المحددة</p>
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
function reportsData() {
    return {
        filters: {
            governorate_id: '{{ $filters['governorate_id'] ?? '' }}',
            city_id: '{{ $filters['city_id'] ?? '' }}',
        },
        cities: @json($cities),
        
        loadCities() {
            if (!this.filters.governorate_id) {
                this.cities = [];
                this.filters.city_id = '';
                return;
            }
            
            fetch(`/api/governorates/${this.filters.governorate_id}/cities`)
                .then(response => response.json())
                .then(data => {
                    this.cities = data;
                    this.filters.city_id = '';
                });
        },
        
        applyFilters() {
            this.$el.submit();
        }
    };
}
</script>
@endpush
@endsection
