<?php

namespace Database\Seeders;

use App\Models\Dashboard\ContactMessage\ContactMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name'    => 'أحمد محمود',
                'phone'   => '01011122233',
                'email'   => 'ahmed@example.com',
                'subject' => [
                    'ar' => 'استفسار عن الشحن',
                    'en' => 'Shipping Inquiry'
                ],
                'message' => [
                    'ar' => 'السلام عليكم، هل يوجد شحن مجاني للمحافظات إذا كان الطلب أكثر من 5000 جنيه؟',
                    'en' => 'Hello, is there free shipping for governorates if the order is over 5000 EGP?'
                ],
                'read'    => false,
            ],
            [
                'name'    => 'سارة حسن',
                'phone'   => '01122334455',
                'email'   => 'sara.h@example.com',
                'subject' => [
                    'ar' => 'طلب صيانة لفلتر 5 مراحل',
                    'en' => 'Maintenance request for 5-stage filter'
                ],
                'message' => [
                    'ar' => 'الفلتر عندي بيسرب مياه من الشمعة الثانية، محتاجة فني يجي يفحصه في أقرب وقت.',
                    'en' => 'My filter is leaking water from the second cartridge, I need a technician to check it ASAP.'
                ],
                'read'    => true, // رسالة مقروءة
            ],
            [
                'name'    => 'كريم مصطفى',
                'phone'   => '01233445566',
                'email'   => 'karim@example.com',
                'subject' => [
                    'ar' => 'توفر منتج نفد من المخزون',
                    'en' => 'Availability of out-of-stock product'
                ],
                'message' => [
                    'ar' => 'إمتى هيتوفر طقم الشمعات الـ 7 مراحل التايواني تاني؟',
                    'en' => 'When will the 7-stage Taiwanese cartridge set be available again?'
                ],
                'read'    => false,
            ],
        ];

        foreach ($messages as $msg) {
            ContactMessage::create($msg);
        }
    }
}
