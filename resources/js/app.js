import './bootstrap';

// Professional Notification System - Make it globally available
window.showNotification = function(message, type = 'success', options = {}) {
    try {
        console.log('showNotification called:', { message, type, options });
        
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.custom-notification');
        existingNotifications.forEach(n => {
            if (n._autoRemoveTimer) clearTimeout(n._autoRemoveTimer);
            n.remove();
        });

        const notification = document.createElement('div');
        notification.className = `custom-notification fixed top-20 right-4 z-[9999] w-96 max-w-[calc(100vw-2rem)] transform transition-all duration-300 ease-out`;
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(120%)';
        notification.style.pointerEvents = 'auto';
    
    // Build notification content based on type
    let content = '';
    
    if (type === 'success' && options.product) {
        // Professional product added notification
        const product = options.product;
        const cartUrl = options.cartUrl || '/cart';
        
        content = `
            <div class="bg-white rounded-3xl shadow-[0_20px_60px_-15px_rgba(0,0,0,0.3)] border border-gray-100 overflow-hidden relative">
                <!-- Success indicator bar -->
                <div class="absolute top-0 right-0 left-0 h-1 bg-gradient-to-r from-teal-400 via-green-400 to-teal-500"></div>
                
                <!-- Content -->
                <div class="p-5">
                    <!-- Header -->
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-teal-400 to-green-500 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg transform rotate-0 hover:rotate-12 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-gray-900 text-lg mb-0.5">تمت الإضافة بنجاح!</h4>
                            <p class="text-gray-500 text-sm">تم إضافة المنتج إلى سلة التسوق</p>
                        </div>
                        <button onclick="(function(){const notif = this.closest('.custom-notification'); if(notif && notif._autoRemoveTimer) clearTimeout(notif._autoRemoveTimer); if(notif) {notif.style.opacity='0'; notif.style.transform='translateX(120%)'; setTimeout(() => {if(notif && notif.parentNode) notif.remove();}, 300);}}).call(this);" class="text-gray-400 hover:text-gray-600 transition-colors p-1.5 hover:bg-gray-100 rounded-lg flex-shrink-0" aria-label="إغلاق">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl p-4 mb-4 border border-pink-100">
                        <div class="flex gap-3 items-center">
                            <div class="w-20 h-20 rounded-2xl overflow-hidden border-2 border-white shadow-lg flex-shrink-0 bg-white">
                                <img src="${product.image || '/images/product-placeholder.jpg'}" alt="${product.name}" class="w-full h-full object-cover" onerror="this.src='/images/product-placeholder.jpg'">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h5 class="font-bold text-gray-900 text-base mb-2 line-clamp-2 leading-snug">${product.name}</h5>
                                <div class="flex items-center gap-3 flex-wrap">
                                    <div class="flex items-center gap-1.5 bg-white px-2.5 py-1 rounded-full shadow-sm">
                                        <svg class="w-3.5 h-3.5 text-teal-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-xs font-semibold text-gray-700">${product.quantity || 1}</span>
                                    </div>
                                    <div class="text-pink-600 font-bold text-lg">${product.price ? new Intl.NumberFormat('ar-EG').format(product.price) + ' جنيه' : ''}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex gap-2.5">
                        <a href="${cartUrl}" class="flex-1 bg-gradient-to-r from-pink-500 to-teal-500 text-white px-4 py-3 rounded-xl text-center font-bold hover:shadow-xl transition-all flex items-center justify-center gap-2 text-sm min-h-[44px] hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                            </svg>
                            <span>عرض السلة</span>
                        </a>
                        <button onclick="(function(){const notif = this.closest('.custom-notification'); if(notif && notif._autoRemoveTimer) clearTimeout(notif._autoRemoveTimer); if(notif) {notif.style.opacity='0'; notif.style.transform='translateX(120%)'; setTimeout(() => {if(notif && notif.parentNode) notif.remove();}, 300);}}).call(this);" class="px-4 py-3 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-colors font-semibold text-sm min-h-[44px] border border-gray-200">
                            إغلاق
                        </button>
                    </div>
                </div>
            </div>
        `;
    } else {
        // Simple notification for other cases
        content = `
            <div class="bg-white rounded-2xl shadow-2xl border-2 ${type === 'success' ? 'border-teal-200' : 'border-red-200'} px-6 py-4 flex items-center gap-3">
                <div class="w-10 h-10 ${type === 'success' ? 'bg-teal-100' : 'bg-red-100'} rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 ${type === 'success' ? 'text-teal-600' : 'text-red-600'}" fill="currentColor" viewBox="0 0 20 20">
                        ${type === 'success' 
                            ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>'
                            : '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>'
                        }
                    </svg>
                </div>
                <span class="font-medium flex-1 ${type === 'success' ? 'text-teal-800' : 'text-red-800'}">${message}</span>
                <button onclick="(function(){const notif = this.closest('.custom-notification'); if(notif && notif._autoRemoveTimer) clearTimeout(notif._autoRemoveTimer); if(notif) {notif.style.opacity='0'; notif.style.transform='translateX(120%)'; setTimeout(() => {if(notif && notif.parentNode) notif.remove();}, 300);}}).call(this);" class="text-gray-400 hover:text-gray-600 transition-colors p-1" aria-label="إغلاق">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </div>
        `;
    }
    
    notification.innerHTML = content;
    document.body.appendChild(notification);
    
    // Animate in with smooth slide effect from right
    setTimeout(() => {
        notification.style.opacity = '1';
        notification.style.transform = 'translateX(0)';
    }, 10);
    
        // Auto remove after delay (longer for product notifications)
        const delay = options.product ? 8000 : 4000;
        const autoRemoveTimer = setTimeout(() => {
            if (notification.parentNode) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(120%)';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }
        }, delay);
        
        // Store timer so it can be cleared if user closes manually
        notification._autoRemoveTimer = autoRemoveTimer;
    } catch (error) {
        console.error('Error showing notification:', error);
        // Fallback to alert if notification fails
        alert(message);
    }
}

// Update Cart Count Badge
function updateCartCount() {
    fetch('/cart/summary')
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            const cartBadge = document.getElementById('cart-count-badge');
            if (cartBadge) {
                const count = data.cart?.count || 0;
                if (count > 0) {
                    cartBadge.textContent = count;
                    cartBadge.classList.remove('hidden');
                } else {
                    cartBadge.classList.add('hidden');
                }
            }
        })
        .catch(error => {
            console.error('Error updating cart count:', error);
        });
}

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Update cart count on page load
    updateCartCount();
});

// Add to Cart
window.addToCart = function(productId, quantity = 1, event) {
    try {
        // Get event from parameter or global event
        const evt = event || window.event;
        const button = evt?.target?.closest('button') || document.querySelector(`button[onclick*="addToCart(${productId})"]`);
        const originalText = button?.innerHTML;
        if (button) {
            button.disabled = true;
            button.style.opacity = '0.6';
            button.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        }

        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({ quantity: parseInt(quantity) || 1 })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Use product data from response if available, otherwise try to get from DOM
                const productData = data.product || {};
                
                // Get cart URL from meta tag or use default
                const cartUrl = document.querySelector('meta[name="cart-url"]')?.content || '/cart';
                
                // Ensure showNotification is available
                if (typeof window.showNotification === 'function') {
                    window.showNotification(data.message || 'تم إضافة المنتج إلى السلة بنجاح', 'success', {
                        product: {
                            name: productData.name || button?.closest('.group')?.querySelector('h4')?.textContent?.trim() || button?.closest('[data-product-id]')?.querySelector('h3, h4')?.textContent?.trim() || 'المنتج',
                            image: productData.image || button?.closest('.group')?.querySelector('img')?.src || button?.closest('[data-product-id]')?.querySelector('img')?.src || '',
                            price: productData.price || null,
                            quantity: productData.quantity || quantity
                        },
                        cartUrl: cartUrl
                    });
                } else {
                    console.error('showNotification function not available');
                    // Fallback to alert if notification system not loaded
                    alert(data.message || 'تم إضافة المنتج إلى السلة بنجاح');
                }
                updateCartCount();
            } else {
                if (typeof window.showNotification === 'function') {
                    window.showNotification(data.message || 'حدث خطأ أثناء إضافة المنتج', 'error');
                } else {
                    alert(data.message || 'حدث خطأ أثناء إضافة المنتج');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء إضافة المنتج. يرجى المحاولة مرة أخرى.', 'error');
        })
        .finally(() => {
            if (button) {
                button.disabled = false;
                button.style.opacity = '1';
                if (originalText) {
                    button.innerHTML = originalText;
                }
            }
        });
    } catch (error) {
        console.error('Error in addToCart:', error);
        if (typeof window.showNotification === 'function') {
            window.showNotification('حدث خطأ غير متوقع. يرجى تحديث الصفحة والمحاولة مرة أخرى.', 'error');
        } else {
            alert('حدث خطأ غير متوقع. يرجى تحديث الصفحة والمحاولة مرة أخرى.');
        }
    }
};

// Update Cart Quantity
window.updateCartQuantity = function(productId, quantity) {
    try {
        if (quantity < 1) {
            window.removeFromCart(productId);
            return;
        }

        fetch('/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                product_id: parseInt(productId),
                quantity: parseInt(quantity)
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                updateCartCount();
                // Only reload if we're on the cart page
                if (window.location.pathname.includes('/cart')) {
                    location.reload();
                }
            } else {
                showNotification(data.message || 'حدث خطأ أثناء تحديث الكمية', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء تحديث الكمية. يرجى المحاولة مرة أخرى.', 'error');
        });
    } catch (error) {
        console.error('Error in updateCartQuantity:', error);
        showNotification('حدث خطأ غير متوقع. يرجى تحديث الصفحة والمحاولة مرة أخرى.', 'error');
    }
};

// Remove from Cart
window.removeFromCart = function(productId) {
    try {
        if (!confirm('هل أنتِ متأكدة من حذف هذا المنتج من السلة؟')) {
            return;
        }

        fetch(`/cart/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showNotification(data.message || 'تم حذف المنتج من السلة', 'success');
                updateCartCount();
                // Only reload if we're on the cart page
                if (window.location.pathname.includes('/cart')) {
                    location.reload();
                }
            } else {
                showNotification(data.message || 'حدث خطأ أثناء حذف المنتج', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('حدث خطأ أثناء حذف المنتج. يرجى المحاولة مرة أخرى.', 'error');
        });
    } catch (error) {
        console.error('Error in removeFromCart:', error);
        showNotification('حدث خطأ غير متوقع. يرجى تحديث الصفحة والمحاولة مرة أخرى.', 'error');
    }
};

// Legacy function for backward compatibility
window.updateCart = window.updateCartQuantity;
