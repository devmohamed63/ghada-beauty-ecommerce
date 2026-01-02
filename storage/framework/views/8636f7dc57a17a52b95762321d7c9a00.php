<?php
$searchQuery = request('search');
$categoryFilter = request('category_id');
$skinTypeFilter = request('skin_type');
$pageTitle = 'منتجاتنا - Ghada Beauty';
$pageDescription = 'اكتشفي مجموعة واسعة من منتجات العناية بالبشرة والشعر الأصلية من Ghada Beauty. سيروم، كريم، غسول، تونر - منتجات مصرية أصلية 100%.';

if($searchQuery) {
    $pageTitle = 'نتائج البحث: ' . $searchQuery . ' - Ghada Beauty';
    $pageDescription = 'نتائج البحث عن "' . $searchQuery . '" في منتجات Ghada Beauty. اكتشفي أفضل منتجات العناية بالبشرة الأصلية.';
}
?>

<?php $__env->startSection('title', $pageTitle); ?>

<?php $__env->startSection('description', $pageDescription); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-50">
    
    <div class="bg-gradient-to-r from-pink-500 via-purple-500 to-teal-500 py-16">
        <div class="container">
            <h1 class="text-white text-center mb-4 text-4xl md:text-5xl font-bold">
                <?php if($searchQuery): ?>
                    نتائج البحث: <?php echo e($searchQuery); ?>

                <?php else: ?>
                    منتجاتنا
                <?php endif; ?>
            </h1>
            <p class="text-white/90 text-center text-lg">اكتشفي أفضل منتجات العناية بالبشرة</p>
        </div>
    </div>

    <div class="container py-12">
        
        <form method="GET" action="<?php echo e(route('products.index')); ?>" class="bg-white rounded-2xl shadow-sm p-6 mb-8 border border-pink-50" role="search" aria-label="بحث عن المنتجات">
            
            <div class="mb-6">
                <label for="product-search" class="sr-only">ابحثي عن منتج</label>
                <div class="relative">
                    <svg class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/></svg>
                    <input type="text" id="product-search" name="search" value="<?php echo e(request('search')); ?>" placeholder="ابحثي عن منتج..." aria-label="ابحثي عن منتج" class="w-full pr-12 pl-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-transparent">
                </div>
            </div>

            
            <div class="grid md:grid-cols-2 gap-6">
                
                <div>
                    <label class="block text-gray-700 mb-2 font-medium" id="category-label">نوع المنتج</label>
                    <div class="flex flex-wrap gap-2" role="group" aria-labelledby="category-label">
                        <button type="submit" name="category_id" value="" aria-label="عرض جميع المنتجات" class="px-4 py-2 rounded-full text-sm transition-all min-h-[44px] touch-manipulation <?php echo e(!request('category_id') ? 'bg-pink-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-pink-100'); ?>">
                            جميع المنتجات
                        </button>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button type="submit" name="category_id" value="<?php echo e($category->id); ?>" aria-label="تصفية حسب <?php echo e($category->name); ?>" class="px-4 py-2 rounded-full text-sm transition-all min-h-[44px] touch-manipulation <?php echo e(request('category_id') == $category->id ? 'bg-pink-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-pink-100'); ?>">
                                <?php echo e($category->name); ?>

                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <div>
                    <label class="block text-gray-700 mb-2 font-medium" id="skin-type-label">نوع البشرة</label>
                    <div class="flex flex-wrap gap-2" role="group" aria-labelledby="skin-type-label">
                        <button type="submit" name="skin_type" value="" aria-label="عرض جميع أنواع البشرة" class="px-4 py-2 rounded-full text-sm transition-all min-h-[44px] touch-manipulation <?php echo e(!request('skin_type') ? 'bg-teal-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-teal-100'); ?>">
                            جميع الأنواع
                        </button>
                        <button type="submit" name="skin_type" value="oily" class="px-4 py-2 rounded-full text-sm transition-all <?php echo e(request('skin_type') == 'oily' ? 'bg-teal-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-teal-100'); ?>">
                            بشرة دهنية
                        </button>
                        <button type="submit" name="skin_type" value="dry" class="px-4 py-2 rounded-full text-sm transition-all <?php echo e(request('skin_type') == 'dry' ? 'bg-teal-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-teal-100'); ?>">
                            بشرة جافة
                        </button>
                        <button type="submit" name="skin_type" value="combination" class="px-4 py-2 rounded-full text-sm transition-all <?php echo e(request('skin_type') == 'combination' ? 'bg-teal-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-teal-100'); ?>">
                            بشرة مختلطة
                        </button>
                        <button type="submit" name="skin_type" value="sensitive" class="px-4 py-2 rounded-full text-sm transition-all <?php echo e(request('skin_type') == 'sensitive' ? 'bg-teal-500 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-teal-100'); ?>">
                            بشرة حساسة
                        </button>
                    </div>
                </div>
            </div>

            
            <?php if(request('search')): ?>
                <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
            <?php endif; ?>
        </form>

        
        <div class="mb-6">
            <p class="text-gray-600">
                عرض <?php echo e($products->count()); ?> منتج
                <?php if(request('search') || request('category_id') || request('skin_type')): ?>
                    | <a href="<?php echo e(route('products.index')); ?>" class="text-pink-600 hover:text-pink-700 underline">إعادة تعيين الفلاتر</a>
                <?php endif; ?>
            </p>
        </div>

        
        <?php if(isset($products) && $products && $products->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('front.components.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <div class="w-24 h-24 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-pink-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-2">لا توجد منتجات</h3>
                <p class="text-gray-500 mb-6">جربي تغيير معايير البحث أو الفلاتر</p>
                <a href="<?php echo e(route('products.index')); ?>" class="btn-primary inline-block">إعادة تعيين الفلاتر</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\freelance\ghada beauty\resources\views/front/products/index.blade.php ENDPATH**/ ?>