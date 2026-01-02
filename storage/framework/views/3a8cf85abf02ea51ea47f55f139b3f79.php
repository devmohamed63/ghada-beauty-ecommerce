<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
    <meta name="application-name" content="Ghada Beauty Dashboard">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Ghada Beauty Dashboard">
    <meta name="description" content="لوحة تحكم إدارة متجر Ghada Beauty للمستحضرات التجميلية">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ec4899">
    
    
    <link rel="apple-touch-icon" href="<?php echo e(asset('icons/icon-192x192.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('icons/icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="96x96" href="<?php echo e(asset('icons/icon-96x96.png')); ?>">
    <link rel="apple-touch-icon" sizes="128x128" href="<?php echo e(asset('icons/icon-128x128.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('icons/icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('icons/icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="192x192" href="<?php echo e(asset('icons/icon-192x192.png')); ?>">
    <link rel="apple-touch-icon" sizes="384x384" href="<?php echo e(asset('icons/icon-384x384.png')); ?>">
    <link rel="apple-touch-icon" sizes="512x512" href="<?php echo e(asset('icons/icon-512x512.png')); ?>">
    
    
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
    
    
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('icons/icon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('icons/icon-16x16.png')); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'لوحة التحكم'); ?> - Ghada Beauty</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-white to-purple-50 min-h-screen">
    <div x-data="{ mobileMenuOpen: false }" class="min-h-screen">
        
        <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-pink-100">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-pink-500 to-teal-500 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <h1 class="text-lg font-bold text-pink-600">Ghada Beauty</h1>
                                <p class="text-xs text-gray-500">لوحة التحكم</p>
                            </div>
                        </a>
                    </div>

                    
                    <div class="hidden md:flex items-center gap-6">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="px-4 py-2 rounded-full transition-colors <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:text-pink-500'); ?>">
                            لوحة التحكم
                        </a>
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="px-4 py-2 rounded-full transition-colors <?php echo e(request()->routeIs('admin.products.*') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:text-pink-500'); ?>">
                            المنتجات
                        </a>
                        <a href="<?php echo e(route('admin.orders.index')); ?>" class="px-4 py-2 rounded-full transition-colors <?php echo e(request()->routeIs('admin.orders.*') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:text-pink-500'); ?>">
                            الطلبات
                        </a>
                        <a href="<?php echo e(route('admin.reports.index')); ?>" class="px-4 py-2 rounded-full transition-colors <?php echo e(request()->routeIs('admin.reports.*') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:text-pink-500'); ?>">
                            الحسابات
                        </a>
                        <a href="<?php echo e(route('home')); ?>" target="_blank" class="px-4 py-2 text-gray-600 hover:text-pink-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="from_admin" value="1">
                            <button type="submit" class="px-4 py-2 text-red-600 hover:text-red-700 transition-colors">
                                خروج
                            </button>
                        </form>
                    </div>

                    
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-gray-700 hover:text-pink-500">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            
            <div x-show="mobileMenuOpen" x-transition class="md:hidden border-t border-pink-100 bg-white">
                <div class="container mx-auto px-4 py-4 space-y-2">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl transition-colors <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:bg-pink-50'); ?>">
                        لوحة التحكم
                    </a>
                    <a href="<?php echo e(route('admin.products.index')); ?>" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl transition-colors <?php echo e(request()->routeIs('admin.products.*') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:bg-pink-50'); ?>">
                        المنتجات
                    </a>
                    <a href="<?php echo e(route('admin.orders.index')); ?>" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl transition-colors <?php echo e(request()->routeIs('admin.orders.*') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:bg-pink-50'); ?>">
                        الطلبات
                    </a>
                    <a href="<?php echo e(route('admin.reports.index')); ?>" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl transition-colors <?php echo e(request()->routeIs('admin.reports.*') ? 'bg-pink-100 text-pink-600 font-medium' : 'text-gray-700 hover:bg-pink-50'); ?>">
                        الحسابات
                    </a>
                    <a href="<?php echo e(route('home')); ?>" target="_blank" @click="mobileMenuOpen = false" class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-pink-50 transition-colors">
                        عرض الموقع
                    </a>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="block">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="from_admin" value="1">
                        <button type="submit" class="w-full text-right px-4 py-3 rounded-xl text-red-600 hover:bg-red-50 transition-colors">
                            خروج
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        
        <main class="container mx-auto px-4 py-6 md:py-8">
            
            <?php if(session('success')): ?>
                <div class="mb-6 bg-gradient-to-r from-teal-400 to-teal-600 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span><?php echo e(session('success')); ?></span>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="mb-6 bg-gradient-to-r from-red-400 to-red-600 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                    <span><?php echo e(session('error')); ?></span>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then((registration) => {
                        console.log('Service Worker registered successfully:', registration.scope);
                    })
                    .catch((error) => {
                        console.log('Service Worker registration failed:', error);
                    });
            });
        }
        
        // Handle install prompt
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            // Prevent the mini-infobar from appearing on mobile
            e.preventDefault();
            // Stash the event so it can be triggered later
            deferredPrompt = e;
            // Show custom install button if needed
            showInstallButton();
        });
        
        function showInstallButton() {
            // You can add a custom install button here if needed
            console.log('App can be installed');
        }
        
        function installApp() {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    }
                    deferredPrompt = null;
                });
            }
        }
    </script>
</body>
</html>

<?php /**PATH D:\freelance\ghada beauty\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>