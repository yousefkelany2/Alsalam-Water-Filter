<?php

namespace Database\Seeders;

use App\Models\Dashboard\Review\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $reviews = [
            [
                'product_id' => 5, // فلتر 7 مراحل
                'name'       => 'محمود عبدالله',
                'rating'     => 5,
                'comment'    => [
                    'ar' => 'منتج ممتاز جداً والمياه طعمها اتغير تماماً للأحسن.',
                    'en' => 'Excellent product, the water taste has changed completely for the better.'
                ],
                'status'     => 'approved',
            ],
            [
                'product_id' => 6, // فلتر 5 مراحل
                'name'       => 'هدى عبدالرحمن',
                'rating'     => 4,
                'comment'    => [
                    'ar' => 'جيد جداً وسهل التركيب، لكن الفني اتأخر شوية.',
                    'en' => 'Very good and easy to install, but the technician was a bit late.'
                ],
                'status'     => 'approved',
            ],
            [
                'product_id' => 10, // من قسم قطع الغيار/الشمعات
                'name'       => 'طارق سعيد',
                'rating'     => 5,
                'comment'    => [
                    'ar' => 'شمعات أصلية وجودتها عالية، السعر مناسب جداً.',
                    'en' => 'Original cartridges with high quality, very reasonable price.'
                ],
                'status'     => 'pending', // قيد المراجعة (مش هيظهر للعملاء)
            ],
            [
                'product_id' => 15, // مبرد المياه
                'name'       => 'ياسر كمال',
                'rating'     => 2,
                'comment'    => [
                    'ar' => 'المبرد وصل فيه خربشة من الجنب بسبب الشحن.',
                    'en' => 'The dispenser arrived with a scratch on the side due to shipping.'
                ],
                'status'     => 'rejected', // مرفوض
            ],
            [
                'product_id' => 5, // فلتر 7 مراحل (تقييم تاني لنفس المنتج)
                'name'       => 'علي إبراهيم',
                'rating'     => 5,
                'comment'    => [
                    'ar' => 'أنصح به بشدة، خدمة ما بعد البيع ممتازة.',
                    'en' => 'Highly recommended, excellent after-sales service.'
                ],
                'status'     => 'approved',
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
