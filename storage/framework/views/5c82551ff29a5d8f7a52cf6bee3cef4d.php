<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['product']));

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

foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="bg-white rounded-2xl shadow-sm border border-pink-100 overflow-hidden hover:shadow-md transition-all">
    <div class="flex gap-4 p-4">
        <img src="<?php echo e($product->getMainImageUrl('thumb')); ?>" alt="<?php echo e($product->name); ?>" class="w-20 h-20 md:w-24 md:h-24 object-cover rounded-xl flex-shrink-0">
        <div class="flex-1 min-w-0">
            <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2"><?php echo e($product->name); ?></h3>
            <p class="text-sm text-gray-600 mb-2"><?php echo e($product->category->name); ?></p>
            <div class="flex items-center gap-2 mb-2 flex-wrap">
                <?php if($product->is_featured): ?>
                    <span class="px-2 py-1 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs rounded-full">مميز</span>
                <?php endif; ?>
                <?php if($product->is_best_seller): ?>
                    <span class="px-2 py-1 bg-orange-500 text-white text-xs rounded-full">الأكثر مبيعاً</span>
                <?php endif; ?>
                <span class="px-2 py-1 rounded-full text-xs <?php echo e($product->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                    <?php echo e($product->is_active ? 'نشط' : 'غير نشط'); ?>

                </span>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-pink-600 font-bold"><?php echo e(number_format($product->price, 0)); ?> جنيه</p>
                    <p class="text-xs text-gray-500">المخزون: <?php echo e($product->stock); ?></p>
                </div>
                <div class="flex gap-2">
                    <a href="<?php echo e(route('admin.products.show', $product)); ?>" class="p-2 text-teal-600 hover:bg-teal-50 rounded-lg transition-colors" aria-label="عرض المنتج" title="عرض">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 2 10 2s8.268 3.943 9.542 8c-1.274 4.057-5.064 8-9.542 8S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                    </a>
                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" aria-label="تعديل المنتج" title="تعديل">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                    </a>
                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')" class="inline">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" aria-label="حذف المنتج" title="حذف">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php /**PATH D:\freelance\ghada beauty\resources\views/admin/components/product-card.blade.php ENDPATH**/ ?>