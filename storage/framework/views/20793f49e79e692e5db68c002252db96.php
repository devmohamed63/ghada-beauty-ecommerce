
<div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-pink-50 hover:border-pink-200">
    <a href="<?php echo e(route('products.show', $product->slug)); ?>">
        <div class="relative overflow-hidden aspect-square bg-gradient-to-br from-pink-50 to-purple-50">
            <img src="<?php echo e($product->getMainImageUrl('medium')); ?>" alt="<?php echo e($product->name); ?> - منتج عناية بالبشرة من Ghada Beauty" width="400" height="400" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy" onerror="this.src='<?php echo e(asset('images/product-placeholder.jpg')); ?>'; this.onerror=null;">
            
            
            <?php if($product->skin_type): ?>
            <div class="absolute top-3 right-3">
                <span class="bg-teal-400 text-white text-xs px-3 py-1 rounded-full shadow-md">
                    <?php switch($product->skin_type):
                        case ('oily'): ?> بشرة دهنية <?php break; ?>
                        <?php case ('dry'): ?> بشرة جافة <?php break; ?>
                        <?php case ('combination'): ?> بشرة مختلطة <?php break; ?>
                        <?php case ('sensitive'): ?> بشرة حساسة <?php break; ?>
                    <?php endswitch; ?>
                </span>
            </div>
            <?php endif; ?>

            
            <?php if($product->is_featured): ?>
            <div class="absolute top-3 left-3">
                <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white text-xs px-3 py-1 rounded-full shadow-md">مميز</span>
            </div>
            <?php endif; ?>
        </div>
    </a>

    <div class="p-5">
        <a href="<?php echo e(route('products.show', $product->slug)); ?>">
            <h4 class="text-lg font-semibold text-gray-800 mb-2 group-hover:text-pink-500 transition-colors min-h-[3.5rem] line-clamp-2">
                <?php echo e($product->name); ?>

            </h4>
        </a>
        
        <p class="text-gray-500 text-sm mb-3 line-clamp-2 min-h-[2.5rem]">
            <?php echo e(Str::limit($product->description, 80)); ?>

        </p>

        <div class="flex items-center justify-between pt-2">
            <div>
                <span class="text-pink-600 text-xl font-bold"><?php echo e(number_format($product->price, 0)); ?></span>
                <span class="text-gray-500 text-sm mr-1">جنيه</span>
            </div>
            
            <button onclick="addToCart(<?php echo e($product->id); ?>, 1, event)" aria-label="أضيفي <?php echo e($product->name); ?> للسلة" class="bg-gradient-to-r from-pink-400 to-teal-400 text-white px-4 py-2.5 rounded-full text-sm hover:shadow-lg transition-all flex items-center gap-2 group-hover:scale-105 min-h-[44px] touch-manipulation">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                <span>أضيفي للسلة</span>
            </button>
        </div>
    </div>
</div>
<?php /**PATH D:\freelance\ghada beauty\resources\views/front/components/product-card.blade.php ENDPATH**/ ?>