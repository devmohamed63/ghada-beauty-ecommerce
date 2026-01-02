<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['order']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['order']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
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
?>

<div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 hover:shadow-md transition-all">
    <div class="flex items-start justify-between mb-4">
        <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
                <span class="text-lg font-bold text-gray-800">#<?php echo e($order->id); ?></span>
                <form method="POST" action="<?php echo e(route('admin.orders.update', $order)); ?>" class="inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <select 
                        name="status" 
                        class="px-3 py-1.5 rounded-full text-xs font-medium border-0 focus:ring-2 focus:ring-pink-300 transition-all cursor-pointer <?php echo e($statusColor); ?>"
                        onchange="this.form.submit()"
                    >
                        <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>قيد الانتظار</option>
                        <option value="confirmed" <?php echo e($order->status == 'confirmed' ? 'selected' : ''); ?>>مؤكد</option>
                        <option value="shipped" <?php echo e($order->status == 'shipped' ? 'selected' : ''); ?>>تم الشحن</option>
                        <option value="delivered" <?php echo e($order->status == 'delivered' ? 'selected' : ''); ?>>تم التسليم</option>
                        <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>ملغي</option>
                    </select>
                </form>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-1"><?php echo e($order->customer_name); ?></h3>
            <p class="text-gray-600 text-sm mb-2"><?php echo e($order->customer_phone); ?></p>
            <p class="text-gray-500 text-xs"><?php echo e($order->governorate->name_ar ?? ''); ?> - <?php echo e($order->city->name_ar ?? ''); ?></p>
        </div>
        <div class="text-left">
            <p class="text-2xl font-bold text-pink-600 mb-1"><?php echo e(number_format($order->total, 0)); ?></p>
            <p class="text-xs text-gray-500">جنيه</p>
        </div>
    </div>
    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
        <span class="text-xs text-gray-500"><?php echo e($order->created_at->format('Y-m-d H:i')); ?></span>
        <a href="<?php echo e(route('admin.orders.show', $order)); ?>" class="px-4 py-2 bg-gradient-to-r from-pink-500 to-teal-500 text-white rounded-full text-sm hover:shadow-lg transition-all">
            عرض التفاصيل
        </a>
    </div>
</div>

<?php /**PATH D:\freelance\ghada beauty\resources\views/admin/components/order-card.blade.php ENDPATH**/ ?>