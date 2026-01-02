

<?php $__env->startSection('title', 'تم الطلب بنجاح - Ghada Beauty'); ?>

<?php $__env->startSection('noindex', true); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-16 text-center">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8">
        <div class="text-6xl mb-4">✅</div>
        <h1 class="text-4xl font-bold mb-4 text-teal-500">تم استلام طلبك بنجاح!</h1>
        <p class="text-xl text-gray-600 mb-8">رقم الطلب: #<?php echo e($order->id); ?></p>
        <p class="text-gray-600 mb-8">سيتم التواصل معك قريباً لتأكيد الطلب</p>
        <div class="flex gap-4 justify-center">
            <a href="<?php echo e(route('home')); ?>" class="btn-primary">العودة للرئيسية</a>
            <a href="<?php echo e(route('products.index')); ?>" class="btn-secondary">تصفح المزيد</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\freelance\ghada beauty\resources\views/front/order-success.blade.php ENDPATH**/ ?>