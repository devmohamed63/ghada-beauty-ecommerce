<?php $__env->startSection('title', 'إدارة المنتجات'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">إدارة المنتجات</h1>
            <p class="text-gray-600">إدارة جميع منتجات المتجر</p>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all flex items-center gap-2 justify-center">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/></svg>
            <span>إضافة منتج جديد</span>
        </a>
    </div>

    
    <div class="md:hidden space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('admin.components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="bg-white rounded-2xl shadow-sm border border-pink-100 p-12 text-center">
                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">لا توجد منتجات</h2>
                <p class="text-gray-600 mb-6">ابدأ بإضافة منتج جديد</p>
                <a href="<?php echo e(route('admin.products.create')); ?>" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all inline-block">
                    إضافة منتج جديد
                </a>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="hidden md:block bg-white rounded-2xl shadow-sm border border-pink-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-pink-50 to-purple-50">
                    <tr>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">المنتج</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الفئة</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">السعر</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">المخزون</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">الحالة</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">إجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-pink-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="<?php echo e($product->getMainImageUrl('thumb')); ?>" alt="<?php echo e($product->name); ?>" class="w-12 h-12 object-cover rounded-xl">
                                    <div>
                                        <span class="font-semibold text-gray-800"><?php echo e($product->name); ?></span>
                                        <div class="flex gap-2 mt-1">
                                            <?php if($product->is_featured): ?>
                                                <span class="px-2 py-0.5 bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs rounded-full">مميز</span>
                                            <?php endif; ?>
                                            <?php if($product->is_best_seller): ?>
                                                <span class="px-2 py-0.5 bg-orange-500 text-white text-xs rounded-full">الأكثر مبيعاً</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600"><?php echo e($product->category->name); ?></td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-pink-600"><?php echo e(number_format($product->price, 0)); ?></span>
                                <span class="text-sm text-gray-500">جنيه</span>
                            </td>
                            <td class="px-6 py-4 text-gray-600"><?php echo e($product->stock); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium <?php echo e($product->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                    <?php echo e($product->is_active ? 'نشط' : 'غير نشط'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
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
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">لا توجد منتجات</h3>
                                <p class="text-gray-600 mb-4">ابدأ بإضافة منتج جديد</p>
                                <a href="<?php echo e(route('admin.products.create')); ?>" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all inline-block">
                                    إضافة منتج جديد
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <?php if($products->hasPages()): ?>
        <div class="mt-6">
            <?php echo e($products->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\freelance\ghada beauty\resources\views/admin/products/index.blade.php ENDPATH**/ ?>