<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="cart-url" content="<?php echo e(route('cart.index')); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'Ghada Beauty'); ?></title>
    
    
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'منتجات أصلية 100% للعناية بالبشرة والشعر. تفتيح – ترطيب – علاج – نضارة. توصيل لجميع المحافظات والدفع عند الاستلام.'); ?>">
    <meta name="keywords" content="منتجات عناية بالبشرة, منتجات أصلية, كريمات, سيروم, غسول, تونر, Ghada Beauty, منتجات مصرية">
    <meta name="author" content="Ghada Beauty">
    
    
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', 'Ghada Beauty'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('description', 'منتجات أصلية 100% للعناية بالبشرة والشعر. تفتيح – ترطيب – علاج – نضارة.'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset('images/og-image.jpg')); ?>">
    <meta property="og:locale" content="ar_EG">
    
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', 'Ghada Beauty'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('description', 'منتجات أصلية 100% للعناية بالبشرة والشعر.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('og_image', asset('images/og-image.jpg')); ?>">
    
    <?php if(isset($noindex) && $noindex): ?>
    <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
    
    
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('favicon.svg')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('icons/icon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('icons/icon-16x16.png')); ?>">
    <link rel="apple-touch-icon" sizes="192x192" href="<?php echo e(asset('icons/icon-192x192.png')); ?>">
    <link rel="apple-touch-icon" sizes="512x512" href="<?php echo e(asset('icons/icon-512x512.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
    <meta name="theme-color" content="#ec4899">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="bg-white text-gray-800 antialiased">
    <?php echo $__env->make('front.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php if(session('success')): ?>
        <div class="container mx-auto px-4 py-4" role="alert" aria-live="polite" aria-atomic="true">
            <div class="bg-gradient-to-r from-teal-50 to-green-50 border-2 border-teal-400 text-teal-800 px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3">
                <svg class="w-6 h-6 text-teal-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span class="font-medium"><?php echo e(session('success')); ?></span>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if(session('error')): ?>
        <div class="container mx-auto px-4 py-4" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="bg-gradient-to-r from-red-50 to-pink-50 border-2 border-red-400 text-red-800 px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3">
                <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                <span class="font-medium"><?php echo e(session('error')); ?></span>
            </div>
        </div>
    <?php endif; ?>
    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <?php echo $__env->make('front.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <a href="https://wa.me/201067565298" target="_blank" rel="noopener noreferrer" class="fixed bottom-4 left-4 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition z-50 min-w-[56px] min-h-[56px] flex items-center justify-center touch-manipulation" aria-label="تواصل معنا على الواتساب" title="تواصل معنا على الواتساب">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
    </a>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH D:\freelance\ghada beauty\resources\views/front/layouts/app.blade.php ENDPATH**/ ?>