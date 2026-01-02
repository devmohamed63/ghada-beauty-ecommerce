
<header class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container">
        <div class="flex items-center justify-between py-4">
            
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3" aria-label="الصفحة الرئيسية">
                <img src="https://images.unsplash.com/photo-1616750819574-7e38aa8046fa?w=80&h=80&fit=crop" alt="Ghada Beauty Logo" class="w-12 h-12 rounded-full object-cover" loading="eager" onerror="this.src='<?php echo e(asset('images/logo-placeholder.png')); ?>'; this.onerror=null;">
                <div>
                    <h3 class="text-lg font-bold text-pink-600">Ghada Beauty</h3>
                    <p class="text-xs text-gray-500">Ghada Beauty</p>
                </div>
            </a>

            
            <nav class="hidden md:flex items-center gap-8">
                <a href="<?php echo e(route('home')); ?>" class="transition-colors hover:text-pink-500 <?php echo e(request()->routeIs('home') ? 'text-pink-500 font-medium' : 'text-gray-700'); ?>">
                    الرئيسية
                </a>
                <a href="<?php echo e(route('products.index')); ?>" class="transition-colors hover:text-pink-500 <?php echo e(request()->routeIs('products.*') ? 'text-pink-500 font-medium' : 'text-gray-700'); ?>">
                    المنتجات
                </a>
                <a href="<?php echo e(route('routine')); ?>" class="transition-colors hover:text-pink-500 <?php echo e(request()->routeIs('routine') ? 'text-pink-500 font-medium' : 'text-gray-700'); ?>">
                    روتين البشرة
                </a>
                <a href="<?php echo e(route('about')); ?>" class="transition-colors hover:text-pink-500 <?php echo e(request()->routeIs('about') ? 'text-pink-500 font-medium' : 'text-gray-700'); ?>">
                    من نحن
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="transition-colors hover:text-pink-500 <?php echo e(request()->routeIs('contact') ? 'text-pink-500 font-medium' : 'text-gray-700'); ?>">
                    تواصل معنا
                </a>
            </nav>

            
            <div class="flex items-center gap-4">
                
                <a href="<?php echo e(route('cart.index')); ?>" class="relative p-2 text-gray-700 hover:text-pink-500 transition-colors" aria-label="السلة">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                    <?php
                        $cartService = app(\App\Services\CartService::class);
                        $cartSummary = $cartService->getSummary();
                    ?>
                    <span id="cart-count-badge" class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center <?php echo e($cartSummary['count'] > 0 ? '' : 'hidden'); ?>"><?php echo e($cartSummary['count']); ?></span>
                </a>

                <a href="tel:01067565298" class="hidden md:flex items-center gap-2 bg-teal-400 text-white px-4 py-2 rounded-full hover:bg-teal-500 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                    <span class="text-sm font-medium">اتصل بنا</span>
                </a>

                
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-gray-700 hover:text-pink-500" aria-label="Toggle menu">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        
        <nav x-show="mobileMenuOpen" x-transition class="md:hidden pb-4 border-t border-gray-100 pt-4">
            <div class="flex flex-col gap-3">
                <a href="<?php echo e(route('home')); ?>" class="py-2 px-4 rounded-lg transition-colors <?php echo e(request()->routeIs('home') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50'); ?>">
                    الرئيسية
                </a>
                <a href="<?php echo e(route('products.index')); ?>" class="py-2 px-4 rounded-lg transition-colors <?php echo e(request()->routeIs('products.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50'); ?>">
                    المنتجات
                </a>
                <a href="<?php echo e(route('routine')); ?>" class="py-2 px-4 rounded-lg transition-colors <?php echo e(request()->routeIs('routine') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50'); ?>">
                    روتين البشرة
                </a>
                <a href="<?php echo e(route('about')); ?>" class="py-2 px-4 rounded-lg transition-colors <?php echo e(request()->routeIs('about') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50'); ?>">
                    من نحن
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="py-2 px-4 rounded-lg transition-colors <?php echo e(request()->routeIs('contact') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50'); ?>">
                    تواصل معنا
                </a>
                <a href="<?php echo e(route('cart.index')); ?>" class="py-2 px-4 rounded-lg transition-colors <?php echo e(request()->routeIs('cart.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-700 hover:bg-gray-50'); ?>">
                    السلة
                </a>
                <a href="tel:01067565298" class="flex items-center justify-center gap-2 bg-teal-400 text-white px-4 py-2 rounded-lg hover:bg-teal-500 transition-colors mt-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                    <span class="font-medium">01067565298</span>
                </a>
            </div>
        </nav>
    </div>
</header>
<?php /**PATH D:\freelance\ghada beauty\resources\views/front/layouts/header.blade.php ENDPATH**/ ?>