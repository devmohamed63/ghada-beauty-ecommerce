

<?php $__env->startSection('title', 'تعديل المنتج'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 md:space-y-8">
    
    <div>
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">تعديل المنتج</h1>
        <p class="text-gray-600">تعديل معلومات المنتج</p>
    </div>

    <form action="<?php echo e(route('admin.products.update', $product)); ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-pink-100 p-6 md:p-8 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">المعلومات العامة</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div>
                    <label for="category_id" class="block text-sm font-bold text-gray-700 mb-2">الفئة <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                        <option value="">اختر الفئة</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $product->category_id) == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2">اسم المنتج <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name', $product->name)); ?>" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label for="slug" class="block text-sm font-bold text-gray-700 mb-2">الرابط (Slug) <span class="text-red-500">*</span></label>
                    <input type="text" name="slug" id="slug" value="<?php echo e(old('slug', $product->slug)); ?>" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800 dir-ltr text-left">
                    <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label for="price" class="block text-sm font-bold text-gray-700 mb-2">السعر (جنيه) <span class="text-red-500">*</span></label>
                    <input type="number" name="price" id="price" value="<?php echo e(old('price', $product->price)); ?>" step="0.01" min="0" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label for="stock" class="block text-sm font-bold text-gray-700 mb-2">المخزون <span class="text-red-500">*</span></label>
                    <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $product->stock)); ?>" min="0" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label for="skin_type" class="block text-sm font-bold text-gray-700 mb-2">نوع البشرة</label>
                    <select name="skin_type" id="skin_type" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                        <option value="">جميع أنواع البشرة</option>
                        <option value="oily" <?php echo e(old('skin_type', $product->skin_type) == 'oily' ? 'selected' : ''); ?>>دهنية</option>
                        <option value="dry" <?php echo e(old('skin_type', $product->skin_type) == 'dry' ? 'selected' : ''); ?>>جافة</option>
                        <option value="combination" <?php echo e(old('skin_type', $product->skin_type) == 'combination' ? 'selected' : ''); ?>>مختلطة</option>
                        <option value="sensitive" <?php echo e(old('skin_type', $product->skin_type) == 'sensitive' ? 'selected' : ''); ?>>حساسة</option>
                        <option value="all" <?php echo e(old('skin_type', $product->skin_type) == 'all' ? 'selected' : ''); ?>>جميع الأنواع</option>
                    </select>
                    <?php $__errorArgs = ['skin_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-2">الوصف <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="6" required class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800"><?php echo e(old('description', $product->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        
        <div class="space-y-6 pt-6 border-t border-pink-100">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">إعدادات العرض</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 border-pink-100 hover:border-pink-300 cursor-pointer transition-all">
                    <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $product->is_active) ? 'checked' : ''); ?> class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500">
                    <div>
                        <span class="font-bold text-gray-800 block">نشط</span>
                        <span class="text-xs text-gray-600">عرض المنتج في المتجر</span>
                    </div>
                </label>

                
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 border-pink-100 hover:border-pink-300 cursor-pointer transition-all">
                    <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured', $product->is_featured) ? 'checked' : ''); ?> class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500">
                    <div>
                        <span class="font-bold text-gray-800 block">مميز</span>
                        <span class="text-xs text-gray-600">عرض في القسم المميز</span>
                    </div>
                </label>

                
                <label class="flex items-center gap-3 p-4 rounded-xl border-2 border-pink-100 hover:border-pink-300 cursor-pointer transition-all">
                    <input type="checkbox" name="is_best_seller" value="1" <?php echo e(old('is_best_seller', $product->is_best_seller) ? 'checked' : ''); ?> class="w-5 h-5 text-pink-600 rounded focus:ring-pink-500">
                    <div>
                        <span class="font-bold text-gray-800 block">الأكثر مبيعاً</span>
                        <span class="text-xs text-gray-600">عرض كأكثر منتج مبيعاً</span>
                    </div>
                </label>
            </div>
        </div>

        
        <div class="space-y-6 pt-6 border-t border-pink-100">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">صور المنتج</h2>
            
            
            <?php if($product->getMedia('images')->count() > 0): ?>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">الصور الحالية</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <?php $__currentLoopData = $product->getMedia('images'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="relative group">
                                <img src="<?php echo e($media->getFullUrl('thumb')); ?>" alt="Product image" class="w-full h-32 object-cover rounded-xl shadow-sm">
                                <label class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl cursor-pointer">
                                    <input type="checkbox" name="delete_images[]" value="<?php echo e($media->id); ?>" class="w-5 h-5 text-red-600 rounded">
                                    <span class="text-white text-sm mr-2">حذف</span>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">حدد الصور التي تريد حذفها</p>
                </div>
            <?php endif; ?>

            
            <div>
                <label for="images" class="block text-sm font-bold text-gray-700 mb-2">رفع صور جديدة</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                <p class="mt-1 text-xs text-gray-500">يمكنك رفع عدة صور (JPG, PNG, WEBP - الحد الأقصى 2MB لكل صورة)</p>
                <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        
        <div class="space-y-6 pt-6 border-t border-pink-100">
            <h2 class="text-2xl font-bold text-gray-800 pb-3 border-b border-pink-100">صور النتائج</h2>
            
            
            <?php if($product->getMedia('results')->count() > 0): ?>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">صور النتائج الحالية</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <?php $__currentLoopData = $product->getMedia('results'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="relative group">
                                <img src="<?php echo e($media->getFullUrl('thumb')); ?>" alt="Result image" class="w-full h-32 object-cover rounded-xl shadow-sm">
                                <label class="absolute inset-0 flex items-center justify-center bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-xl cursor-pointer">
                                    <input type="checkbox" name="delete_results[]" value="<?php echo e($media->id); ?>" class="w-5 h-5 text-red-600 rounded">
                                    <span class="text-white text-sm mr-2">حذف</span>
                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">حدد صور النتائج التي تريد حذفها</p>
                </div>
            <?php endif; ?>

            
            <div>
                <label for="results" class="block text-sm font-bold text-gray-700 mb-2">رفع صور نتائج جديدة</label>
                <input type="file" name="results[]" id="results" multiple accept="image/*" class="w-full px-4 py-3 rounded-xl border-2 border-pink-100 focus:border-pink-500 focus:ring-2 focus:ring-pink-200 transition-all text-gray-800">
                <p class="mt-1 text-xs text-gray-500">يمكنك رفع عدة صور للنتائج (JPG, PNG, WEBP - الحد الأقصى 2MB لكل صورة)</p>
                <?php $__errorArgs = ['results.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        
        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-pink-100">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-teal-500 text-white px-6 py-3 rounded-full hover:shadow-lg transition-all flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                حفظ التغييرات
            </button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="bg-white text-gray-700 border border-gray-200 px-6 py-3 rounded-full hover:bg-gray-50 transition-all flex items-center justify-center">
                إلغاء
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\freelance\ghada beauty\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>