<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>تسجيل الدخول - Ghada Beauty</title>

        
        <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('favicon.svg')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('icons/icon-32x32.png')); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('icons/icon-16x16.png')); ?>">
        <link rel="apple-touch-icon" sizes="192x192" href="<?php echo e(asset('icons/icon-192x192.png')); ?>">
        <meta name="theme-color" content="#ec4899">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Tajawal:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-gradient-to-br from-pink-50 via-white to-purple-50 min-h-screen font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center justify-center gap-3">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="text-right">
                        <h1 class="text-2xl font-bold text-pink-600">Ghada Beauty</h1>
                        <p class="text-sm text-gray-600">Ghada Beauty</p>
                    </div>
                </a>
            </div>

            
            <div class="w-full sm:max-w-md">
                <div class="bg-white rounded-2xl shadow-xl border border-pink-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 px-6 py-4">
                        <h2 class="text-2xl font-bold text-white text-center">تسجيل الدخول</h2>
                    </div>
                    
                    <div class="p-6 sm:p-8">
                        <?php echo e($slot); ?>

                    </div>
                </div>

                
                <div class="mt-6 text-center">
                    <a href="<?php echo e(route('home')); ?>" class="text-sm text-gray-600 hover:text-pink-600 transition-colors flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        <span>العودة للصفحة الرئيسية</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH D:\freelance\ghada beauty\resources\views/layouts/guest.blade.php ENDPATH**/ ?>