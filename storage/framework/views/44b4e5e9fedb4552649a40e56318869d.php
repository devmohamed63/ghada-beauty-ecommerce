<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب جديد</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #14b8a6, #a855f7);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .order-info {
            background-color: #f9f9f9;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .order-info h2 {
            margin-top: 0;
            color: #333;
            font-size: 18px;
        }
        .info-row {
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 100px;
        }
        .value {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table thead {
            background-color: #f3e8ff;
        }
        table th {
            padding: 12px;
            text-align: right;
            font-weight: bold;
            color: #333;
        }
        table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e0e0e0;
            color: #555;
        }
        .total {
            text-align: left;
            font-size: 18px;
            font-weight: bold;
            color: #14b8a6;
            padding: 15px;
            background-color: #f0fdfa;
            border-radius: 6px;
            margin-top: 10px;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 طلب جديد!</h1>
            <p>لديك طلب جديد من Ghada Beauty</p>
        </div>

        <div class="content">
            <div class="order-info">
                <h2>معلومات الطلب</h2>
                <div class="info-row">
                    <span class="label">رقم الطلب:</span>
                    <span class="value">#<?php echo e($order->id); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">الحالة:</span>
                    <span class="status-badge status-pending"><?php echo e($order->status); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">التاريخ:</span>
                    <span class="value"><?php echo e($order->created_at->format('Y-m-d H:i')); ?></span>
                </div>
            </div>

            <div class="order-info">
                <h2>معلومات العميل</h2>
                <div class="info-row">
                    <span class="label">الاسم:</span>
                    <span class="value"><?php echo e($order->customer_name); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">الهاتف:</span>
                    <span class="value"><?php echo e($order->customer_phone); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">المحافظة:</span>
                    <span class="value"><?php echo e($order->governorate->name_ar); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">المدينة:</span>
                    <span class="value"><?php echo e($order->city->name_ar); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">العنوان:</span>
                    <span class="value"><?php echo e($order->address); ?></span>
                </div>
                <?php if($order->notes): ?>
                <div class="info-row">
                    <span class="label">ملاحظات:</span>
                    <span class="value"><?php echo e($order->notes); ?></span>
                </div>
                <?php endif; ?>
            </div>

            <h2>تفاصيل الطلب</h2>
            <table>
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>المجموع</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->product->name); ?></td>
                        <td><?php echo e(number_format($item->price, 2)); ?> جنيه</td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td><?php echo e(number_format($item->subtotal, 2)); ?> جنيه</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="total">
                الإجمالي: <?php echo e(number_format($order->total, 2)); ?> جنيه
            </div>
        </div>

        <div class="footer">
            <p>هذا البريد الإلكتروني تم إرساله تلقائياً من Ghada Beauty</p>
            <p>© <?php echo e(date('Y')); ?> Ghada Beauty. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</body>
</html>

<?php /**PATH D:\freelance\ghada beauty\resources\views/emails/orders/new.blade.php ENDPATH**/ ?>