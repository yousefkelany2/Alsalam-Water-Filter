<?php

namespace Database\Seeders;

use App\Models\Dashboard\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'name'   => ['ar' => 'فلاتر المياه', 'en' => 'Water Filters'],
                'icon'   => 'bi-droplet-half',
                'status' => 'active',
            ],
            [
                'name'   => ['ar' => 'شمعات الفلاتر', 'en' => 'Filter Cartridges'],
                'icon'   => 'bi-layers',
                'status' => 'active',
            ],
            [
                'name'   => ['ar' => 'قطع الغيار', 'en' => 'Spare Parts'],
                'icon'   => 'bi-tools',
                'status' => 'active',
            ],
            [
                'name'   => ['ar' => 'مبردات المياه', 'en' => 'Water Dispensers'],
                'icon'   => 'bi-cup-water',
                'status' => 'active',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
