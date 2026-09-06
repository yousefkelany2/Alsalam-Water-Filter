<?php

namespace Database\Seeders;

use App\Models\Dashboard\Governorate\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            ['name' => ['ar' => 'القاهرة', 'en' => 'Cairo'], 'shipping_price' => 50.00, 'status' => 'active'],
            ['name' => ['ar' => 'الجيزة', 'en' => 'Giza'], 'shipping_price' => 50.00, 'status' => 'active'],
            ['name' => ['ar' => 'الإسكندرية', 'en' => 'Alexandria'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'الشرقية', 'en' => 'Al Sharqia'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'الدقهلية', 'en' => 'Dakahlia'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'القليوبية', 'en' => 'Al Qalyubia'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'المنوفية', 'en' => 'Menofia'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'الغربية', 'en' => 'Gharbia'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'البحيرة', 'en' => 'Beheira'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'كفر الشيخ', 'en' => 'Kafr El Sheikh'], 'shipping_price' => 60.00, 'status' => 'active'],
            ['name' => ['ar' => 'دمياط', 'en' => 'Damietta'], 'shipping_price' => 70.00, 'status' => 'active'],
            ['name' => ['ar' => 'بورسعيد', 'en' => 'Port Said'], 'shipping_price' => 70.00, 'status' => 'active'],
            ['name' => ['ar' => 'الإسماعيلية', 'en' => 'Ismailia'], 'shipping_price' => 70.00, 'status' => 'active'],
            ['name' => ['ar' => 'السويس', 'en' => 'Suez'], 'shipping_price' => 70.00, 'status' => 'active'],
            ['name' => ['ar' => 'الفيوم', 'en' => 'Fayoum'], 'shipping_price' => 80.00, 'status' => 'active'],
            ['name' => ['ar' => 'بني سويف', 'en' => 'Beni Suef'], 'shipping_price' => 80.00, 'status' => 'active'],
            ['name' => ['ar' => 'المنيا', 'en' => 'Minya'], 'shipping_price' => 80.00, 'status' => 'active'],
            ['name' => ['ar' => 'أسيوط', 'en' => 'Assiut'], 'shipping_price' => 90.00, 'status' => 'active'],
            ['name' => ['ar' => 'سوهاج', 'en' => 'Sohag'], 'shipping_price' => 90.00, 'status' => 'active'],
            ['name' => ['ar' => 'قنا', 'en' => 'Qena'], 'shipping_price' => 100.00, 'status' => 'active'],
            ['name' => ['ar' => 'الأقصر', 'en' => 'Luxor'], 'shipping_price' => 100.00, 'status' => 'active'],
            ['name' => ['ar' => 'أسوان', 'en' => 'Aswan'], 'shipping_price' => 110.00, 'status' => 'active'],
            ['name' => ['ar' => 'مطروح', 'en' => 'Matrouh'], 'shipping_price' => 100.00, 'status' => 'active'],
            ['name' => ['ar' => 'البحر الأحمر', 'en' => 'Red Sea'], 'shipping_price' => 120.00, 'status' => 'active'],
            ['name' => ['ar' => 'الوادي الجديد', 'en' => 'New Valley'], 'shipping_price' => 120.00, 'status' => 'active'],
            ['name' => ['ar' => 'شمال سيناء', 'en' => 'North Sinai'], 'shipping_price' => 150.00, 'status' => 'active'],
            ['name' => ['ar' => 'جنوب سيناء', 'en' => 'South Sinai'], 'shipping_price' => 150.00, 'status' => 'active'],
        ];

        foreach ($governorates as $governorate) {
            Governorate::create($governorate);
        }
    }
}
