<?php

namespace Database\Seeders;

use App\Models\Dashboard\Order\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Pest\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                // الطلب الأول
                'order_number'   => 'ALS-' . strtoupper(Str::random(6)),
                'customer_name'  => 'يوسف عبدالمنعم',
                'customer_phone' => '01012345678',
                'customer_email' => 'yousef@example.com',
                'governorate_id' => 7,
                'city'           => 'العاشر من رمضان',
                'address'        => 'المجاورة الأولى، عمارة 5، شقة 12',
                'notes'          => 'يرجى الاتصال قبل التوصيل بساعة',
                'payment_method' => 'Cash on Delivery',
                'subtotal'       => 5000.00, // (1 * 4500) + (2 * 250)
                'shipping'       => 60.00,
                'discount'       => 0.00,
                'total'          => 5060.00,
                'status'         => 'pending',
                'items'          => [
                    ['product_id' => 5, 'price' => 4500.00, 'quantity' => 1, 'line_total' => 4500.00],
                    ['product_id' => 6, 'price' => 250.00,  'quantity' => 2, 'line_total' => 500.00],
                ],
            ],
            [
                // الطلب الثاني
                'order_number'   => 'ALS-' . strtoupper(Str::random(6)),
                'customer_name'  => 'محمد علي',
                'customer_phone' => '01111111111',
                'customer_email' => 'mohamed@example.com',
                'governorate_id' => 4, // بناءً على إن 4 هي البداية (مثلاً القاهرة)
                'city'           => 'مدينة نصر',
                'address'        => 'شارع مكرم عبيد، تقاطع مصطفى النحاس',
                'notes'          => null,
                'payment_method' => 'Credit Card',
                'subtotal'       => 1200.00, // (1 * 1200)
                'shipping'       => 50.00,
                'discount'       => 100.00,
                'total'          => 1150.00,
                'status'         => 'processing',
                'items'          => [
                    ['product_id' => 7, 'price' => 1200.00, 'quantity' => 1, 'line_total' => 1200.00],
                ],
            ],
            [
                // الطلب الثالث
                'order_number'   => 'ALS-' . strtoupper(Str::random(6)),
                'customer_name'  => 'أحمد حسن',
                'customer_phone' => '01222222222',
                'customer_email' => null,
                'governorate_id' => 5,
                'city'           => 'المهندسين',
                'address'        => 'شارع جامعة الدول العربية',
                'notes'          => 'التوصيل بعد الساعة 5 مساءً',
                'payment_method' => 'Cash on Delivery',
                'subtotal'       => 450.00,
                'shipping'       => 50.00,
                'discount'       => 0.00,
                'total'          => 500.00,
                'status'         => 'delivered',
                'items'          => [
                    ['product_id' => 8, 'price' => 150.00, 'quantity' => 3, 'line_total' => 450.00],
                ],
            ],
        ];

        foreach ($orders as $orderData) {
            // فصل الـ items عن الداتا الأساسية للأوردر
            $items = $orderData['items'];
            unset($orderData['items']);

            // إنشاء الأوردر الأساسي
            $order = Order::create($orderData);

            // إضافة المنتجات المرتبطة بالأوردر (Order Items)
            $order->items()->createMany($items);
        }
    }
}
