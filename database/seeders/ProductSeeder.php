<?php

namespace Database\Seeders;

use App\Models\Dashboard\Product\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // ------------------ قسم فلتر 5 مراحل متقدم (Category 2) ------------------
            [
                'category_id'    => 2,
                'sku'            => 'WF-5STAGE-PRO',
                'name'           => [
                    'ar' => 'فلتر 5 مراحل برو (أكوا فيت)',
                    'en' => '5-Stage Pro Filter (AquaFit)'
                ],
                'short_desc'     => [
                    'ar' => 'فلتر 5 مراحل عالي الجودة بتكنولوجيا النانو لإزالة الشوائب الدقيقة.',
                    'en' => 'High-quality 5-stage filter with nano-technology to remove fine impurities.'
                ],
                'description'    => [
                    'ar' => 'جهاز تنقية مياه 5 مراحل مصمم خصيصاً للمناطق ذات نسبة الشوائب والكلور العالية. يضمن مياه خالية من الطعم والرائحة.',
                    'en' => '5-stage water purifier specially designed for areas with high impurities and chlorine. Ensures tasteless and odorless water.'
                ],
                'price'          => 1350.00,
                'old_price'      => 1600.00,
                'in_stock'       => true,
                'stock_qty'      => 75,
                'image'          => 'products/5-stage-pro.jpg',
                'gallery'        => ['products/5-stage-pro-1.jpg'],
                'specifications' => [
                    'ar' => ['الماركة' => 'أكوا فيت', 'مرحلة البوست كربون' => 'متوفرة'],
                    'en' => ['Brand' => 'AquaFit', 'Post Carbon Stage' => 'Available']
                ],
                'features'       => [
                    'ar' => ['شمعات تايواني أصلية', 'قاعدة بلاستيكية ضد الصدأ'],
                    'en' => ['Original Taiwanese cartridges', 'Rust-proof plastic base']
                ],
                'whats_included' => [
                    'ar' => ['جهاز الفلتر', 'مفتاح الشمعات', 'حنفية سيراميك'],
                    'en' => ['Filter device', 'Wrench', 'Ceramic faucet']
                ],
                'warranty'       => [
                    'ar' => 'ضمان سنة شامل',
                    'en' => '1-year comprehensive warranty'
                ],
                'rating'         => 4.6,
                'review_count'   => 52,
                'sales_count'    => 210,
                'featured'       => true,
                'status'         => 'active',
            ],
            [
                'category_id'    => 2,
                'sku'            => 'WF-5STAGE-ECO',
                'name'           => [
                    'ar' => 'فلتر 5 مراحل اقتصادي',
                    'en' => '5-Stage Eco Water Filter'
                ],
                'short_desc'     => [
                    'ar' => 'الحل الاقتصادي الأفضل للحصول على مياه شرب نقية للعائلة.',
                    'en' => 'The best economical solution for pure drinking water for the family.'
                ],
                'description'    => [
                    'ar' => 'فلتر عملي واقتصادي يعتمد على 5 مراحل تنقية للتخلص من الرواسب والكلور والمواد العضوية بتكلفة مناسبة.',
                    'en' => 'Practical and economical filter relying on 5 purification stages to remove sediments, chlorine, and organics at an affordable cost.'
                ],
                'price'          => 950.00,
                'old_price'      => 1100.00,
                'in_stock'       => true,
                'stock_qty'      => 150,
                'image'          => 'products/5-stage-eco.jpg',
                'gallery'        => [],
                'specifications' => [
                    'ar' => ['الشاسيه' => 'معدن مطلي', 'ضغط التشغيل' => 'يحتاج ضغط مياه متوسط'],
                    'en' => ['Chassis' => 'Coated Metal', 'Operating Pressure' => 'Medium pressure needed']
                ],
                'features'       => [
                    'ar' => ['سعر اقتصادي', 'قطع غيار متوفرة'],
                    'en' => ['Economical price', 'Available spare parts']
                ],
                'whats_included' => [
                    'ar' => ['الفلتر بالكامل', 'حنفية عادية', 'وصلة الدخول'],
                    'en' => ['Full filter', 'Standard faucet', 'Inlet connection']
                ],
                'warranty'       => [
                    'ar' => 'ضمان 6 شهور',
                    'en' => '6-months warranty'
                ],
                'rating'         => 4.2,
                'review_count'   => 18,
                'sales_count'    => 130,
                'featured'       => false,
                'status'         => 'active',
            ],
            // ------------------ قسم فلاتر المياه (Category 4) ------------------
            [
                'category_id'    => 4,
                'sku'            => 'WF-7STAGE-RO',
                'name'           => ['ar' => 'فلتر مياه 7 مراحل تايواني RO', 'en' => '7-Stage Taiwanese RO Water Filter'],
                'short_desc'     => ['ar' => 'فلتر مياه متتقدم بالتناضح العكسي لضمان مياه نقية 100%.', 'en' => 'Advanced RO water filter for 100% pure water.'],
                'description'    => ['ar' => 'حل متكامل لتنقية المياه من الشوائب والكلور مع إضافة المعادن المفيدة.', 'en' => 'Complete solution for purifying water from impurities and chlorine, adding beneficial minerals.'],
                'price'          => 4500.00,
                'old_price'      => 5200.00,
                'in_stock'       => true,
                'stock_qty'      => 50,
                'image'          => 'products/7-stage-filter.jpg',
                'gallery'        => ['products/7-stage-1.jpg', 'products/7-stage-2.jpg'],
                'specifications' => ['ar' => ['سعة الإنتاج' => '300 لتر/يوم', 'المضخة' => 'تايواني'], 'en' => ['Capacity' => '300 L/day', 'Pump' => 'Taiwanese']],
                'features'       => ['ar' => ['يزيل البكتيريا', 'موفر للكهرباء'], 'en' => ['Removes bacteria', 'Energy efficient']],
                'whats_included' => ['ar' => ['وحدة الفلتر', 'خزان', 'حنفية'], 'en' => ['Filter Unit', 'Tank', 'Faucet']],
                'warranty'       => ['ar' => 'ضمان سنتين', 'en' => '2-year warranty'],
                'rating'         => 4.8,
                'review_count'   => 24,
                'sales_count'    => 150,
                'featured'       => true,
                'status'         => 'active',
            ],
            [
                'category_id'    => 4,
                'sku'            => 'WF-5STAGE-ADV',
                'name'           => ['ar' => 'فلتر مياه 5 مراحل متقدم', 'en' => '5-Stage Advanced Water Filter'],
                'short_desc'     => ['ar' => 'فلتر 5 مراحل عالي الجودة لإزالة الشوائب والروائح الكريهة.', 'en' => 'High-quality 5-stage filter to remove impurities and odors.'],
                'description'    => ['ar' => 'يقوم بتنقية المياه على 5 مراحل متتالية لتوفير مياه شرب صحية وآمنة للاستخدام المنزلي.', 'en' => 'Purifies water in 5 consecutive stages to provide healthy drinking water.'],
                'price'          => 1200.00,
                'old_price'      => 1500.00,
                'in_stock'       => true,
                'stock_qty'      => 100,
                'image'          => 'products/5-stage-filter.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['النوع' => 'بدون موتور', 'المنشأ' => 'تجميع محلي'], 'en' => ['Type' => 'No motor', 'Origin' => 'Local Assembly']],
                'features'       => ['ar' => ['لا يحتاج لكهرباء', 'سهل الصيانة'], 'en' => ['No electricity needed', 'Easy maintenance']],
                'whats_included' => ['ar' => ['جهاز الفلتر', 'شمعات مبدئية', 'حنفية'], 'en' => ['Filter device', 'Initial cartridges', 'Faucet']],
                'warranty'       => ['ar' => 'ضمان سنة', 'en' => '1-year warranty'],
                'rating'         => 4.5,
                'review_count'   => 40,
                'sales_count'    => 300,
                'featured'       => false,
                'status'         => 'active',
            ],
            [
                'category_id'    => 4,
                'sku'            => 'WF-3STAGE-STD',
                'name'           => ['ar' => 'فلتر مياه 3 مراحل قياسي', 'en' => '3-Stage Standard Water Filter'],
                'short_desc'     => ['ar' => 'فلتر اقتصادي 3 مراحل للطبخ والشرب الأساسي.', 'en' => 'Economical 3-stage filter for basic drinking and cooking.'],
                'description'    => ['ar' => 'حل اقتصادي وسريع للتخلص من الشوائب المرئية والكلور في المياه.', 'en' => 'Quick and economical solution to remove visible impurities and chlorine.'],
                'price'          => 650.00,
                'old_price'      => 750.00,
                'in_stock'       => true,
                'stock_qty'      => 150,
                'image'          => 'products/3-stage-filter.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['التركيب' => 'فوق الحوض', 'المراحل' => '3 مراحل'], 'en' => ['Mount' => 'Over sink', 'Stages' => '3 Stages']],
                'features'       => ['ar' => ['تركيب فوري', 'حجم مدمج'], 'en' => ['Instant installation', 'Compact size']],
                'whats_included' => ['ar' => ['الفلتر', 'وصلة الحنفية'], 'en' => ['Filter', 'Faucet adapter']],
                'warranty'       => ['ar' => 'ضمان 6 شهور', 'en' => '6-months warranty'],
                'rating'         => 4.1,
                'review_count'   => 15,
                'sales_count'    => 100,
                'featured'       => false,
                'status'         => 'active',
            ],

            // ------------------ قسم شمعات الفلاتر (Category 5) ------------------
            [
                'category_id'    => 5,
                'sku'            => 'CART-3SET',
                'name'           => ['ar' => 'طقم شمعات 3 مراحل (مبدئي)', 'en' => '3-Stage Pre-Filter Cartridge Set'],
                'short_desc'     => ['ar' => 'طقم شمعات غيار للمراحل الثلاث الأولى.', 'en' => 'Replacement cartridge set for the first three stages.'],
                'description'    => ['ar' => 'شمعة شوائب، شمعة كربون حبيبي، وشمعة كربون صلب.', 'en' => 'Sediment, GAC, and CTO carbon cartridges.'],
                'price'          => 250.00,
                'old_price'      => 300.00,
                'in_stock'       => true,
                'stock_qty'      => 200,
                'image'          => 'products/3-stage-cartridge.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['العمر الافتراضي' => '3 لـ 6 شهور'], 'en' => ['Lifespan' => '3 to 6 months']],
                'features'       => ['ar' => ['كربون نشط عالي الجودة'], 'en' => ['High-quality active carbon']],
                'whats_included' => ['ar' => ['3 شمعات'], 'en' => ['3 Cartridges']],
                'warranty'       => ['ar' => 'استهلاكي', 'en' => 'Consumable'],
                'rating'         => 4.9,
                'review_count'   => 85,
                'sales_count'    => 600,
                'featured'       => true,
                'status'         => 'active',
            ],
            [
                'category_id'    => 5,
                'sku'            => 'CART-MEMBRANE-RO',
                'name'           => ['ar' => 'شمعة ممبرين RO (أمريكي)', 'en' => 'RO Membrane Cartridge (USA)'],
                'short_desc'     => ['ar' => 'القلب النابض لفلتر التناضح العكسي، يزيل الأملاح والبكتيريا.', 'en' => 'The heart of RO filters, removes salts and bacteria.'],
                'description'    => ['ar' => 'شمعة الممبرين الأمريكية الأصلية بطاقة 75 جالون لضمان أعلى مستوى تنقية.', 'en' => 'Original USA membrane 75 GPD for highest purification level.'],
                'price'          => 850.00,
                'old_price'      => 950.00,
                'in_stock'       => true,
                'stock_qty'      => 80,
                'image'          => 'products/membrane-cartridge.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['الصناعة' => 'أمريكي', 'المسام' => '0.0001 ميكرون'], 'en' => ['Origin' => 'USA', 'Pores' => '0.0001 micron']],
                'features'       => ['ar' => ['ينزع الأملاح الثقيلة'], 'en' => ['Removes heavy metals']],
                'whats_included' => ['ar' => ['شمعة ممبرين 1x'], 'en' => ['1x Membrane cartridge']],
                'warranty'       => ['ar' => 'استهلاكي', 'en' => 'Consumable'],
                'rating'         => 4.7,
                'review_count'   => 50,
                'sales_count'    => 200,
                'featured'       => false,
                'status'         => 'active',
            ],
            [
                'category_id'    => 5,
                'sku'            => 'CART-POST-CARBON',
                'name'           => ['ar' => 'شمعة بوست كربون (المرحلة الخامسة)', 'en' => 'Post Carbon Filter (5th Stage)'],
                'short_desc'     => ['ar' => 'شمعة جوز الهند لتحسين طعم ورائحة المياه.', 'en' => 'Coconut shell carbon to improve water taste and odor.'],
                'description'    => ['ar' => 'تعمل على إزالة أي روائح متبقية في المياه بعد التخزين وتجعل طعم المياه نقياً.', 'en' => 'Removes any residual odors after storage and purifies taste.'],
                'price'          => 150.00,
                'old_price'      => 180.00,
                'in_stock'       => true,
                'stock_qty'      => 120,
                'image'          => 'products/post-carbon.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['العمر الافتراضي' => 'سنة'], 'en' => ['Lifespan' => '1 year']],
                'features'       => ['ar' => ['كربون جوز هند طبيعي'], 'en' => ['Natural coconut carbon']],
                'whats_included' => ['ar' => ['شمعة واحدة'], 'en' => ['One Cartridge']],
                'warranty'       => ['ar' => 'استهلاكي', 'en' => 'Consumable'],
                'rating'         => 4.6,
                'review_count'   => 30,
                'sales_count'    => 250,
                'featured'       => false,
                'status'         => 'active',
            ],

            // ------------------ قسم قطع الغيار (Category 6) ------------------
            [
                'category_id'    => 6,
                'sku'            => 'PART-RO-PUMP',
                'name'           => ['ar' => 'مضخة مياه لفلتر RO (موتور)', 'en' => 'RO Water Filter Pump'],
                'short_desc'     => ['ar' => 'موتور قوي لرفع ضغط المياه داخل الفلتر.', 'en' => 'Strong motor to increase water pressure inside the filter.'],
                'description'    => ['ar' => 'موتور تايواني صامت يعمل بكفاءة عالية لضمان مرور المياه عبر الممبرين.', 'en' => 'Silent Taiwanese motor operating at high efficiency.'],
                'price'          => 1100.00,
                'old_price'      => 1300.00,
                'in_stock'       => true,
                'stock_qty'      => 30,
                'image'          => 'products/ro-pump.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['الجهد' => '24 فولت', 'الضغط' => '120 PSI'], 'en' => ['Voltage' => '24V', 'Pressure' => '120 PSI']],
                'features'       => ['ar' => ['صوت هادئ جداً', 'عمر افتراضي طويل'], 'en' => ['Very quiet', 'Long lifespan']],
                'whats_included' => ['ar' => ['الموتور فقط'], 'en' => ['Pump only']],
                'warranty'       => ['ar' => 'ضمان سنة', 'en' => '1-year warranty'],
                'rating'         => 4.4,
                'review_count'   => 12,
                'sales_count'    => 45,
                'featured'       => false,
                'status'         => 'active',
            ],
            [
                'category_id'    => 6,
                'sku'            => 'PART-TANK-12L',
                'name'           => ['ar' => 'خزان مياه فلتر 12 لتر', 'en' => '12L Water Filter Tank'],
                'short_desc'     => ['ar' => 'خزان مياه معزول لحفظ المياه النقية.', 'en' => 'Insulated water tank to store pure water.'],
                'description'    => ['ar' => 'خزان مصنوع من مواد آمنة غذائياً يحافظ على نقاء المياه ويمنع تكون البكتيريا.', 'en' => 'Food-grade safe tank that preserves water purity and prevents bacteria.'],
                'price'          => 750.00,
                'old_price'      => 850.00,
                'in_stock'       => true,
                'stock_qty'      => 40,
                'image'          => 'products/water-tank.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['السعة' => '12 لتر (3.2 جالون)', 'الخامة' => 'بلاستيك/فيبر'], 'en' => ['Capacity' => '12L (3.2 Gallon)', 'Material' => 'Plastic/Fiber']],
                'features'       => ['ar' => ['مضاد للبكتيريا', 'لا يغير طعم المياه'], 'en' => ['Anti-bacterial', 'Does not alter taste']],
                'whats_included' => ['ar' => ['الخزان', 'محبس الخزان'], 'en' => ['Tank', 'Tank valve']],
                'warranty'       => ['ar' => 'ضمان سنة', 'en' => '1-year warranty'],
                'rating'         => 4.8,
                'review_count'   => 22,
                'sales_count'    => 80,
                'featured'       => false,
                'status'         => 'active',
            ],

            // ------------------ قسم مبردات المياه (Category 7) ------------------
            [
                'category_id'    => 7,
                'sku'            => 'DISP-HOT-COLD',
                'name'           => ['ar' => 'مبرد مياه ساخن وبارد', 'en' => 'Hot & Cold Water Dispenser'],
                'short_desc'     => ['ar' => 'مبرد مياه بتصميم عصري مع ثلاجة سفلية صغيرة.', 'en' => 'Modern design water dispenser with a small bottom fridge.'],
                'description'    => ['ar' => 'مبرد مياه يوفر مياه مثلجة ومياه مغلية فورية، مزود بكابينة سفلية لحفظ المشروبات.', 'en' => 'Provides instant freezing and boiling water, equipped with a bottom cooling cabin.'],
                'price'          => 6200.00,
                'old_price'      => 6800.00,
                'in_stock'       => true,
                'stock_qty'      => 20,
                'image'          => 'products/dispenser-normal.jpg',
                'gallery'        => ['products/dispenser-normal-2.jpg'],
                'specifications' => ['ar' => ['الحنفيات' => '2 (ساخن/بارد)', 'الثلاجة' => 'موجودة'], 'en' => ['Faucets' => '2 (Hot/Cold)', 'Fridge' => 'Included']],
                'features'       => ['ar' => ['قفل أمان للأطفال', 'تبريد سريع'], 'en' => ['Child safety lock', 'Fast cooling']],
                'whats_included' => ['ar' => ['مبرد المياه', 'كتيب التعليمات'], 'en' => ['Water Dispenser', 'Manual']],
                'warranty'       => ['ar' => 'ضمان سنتين', 'en' => '2-year warranty'],
                'rating'         => 4.9,
                'review_count'   => 60,
                'sales_count'    => 110,
                'featured'       => true,
                'status'         => 'active',
            ],
            [
                'category_id'    => 7,
                'sku'            => 'DISP-BOTTOM-LOAD',
                'name'           => ['ar' => 'مبرد مياه بتحميل سفلي للقارورة', 'en' => 'Bottom Load Water Dispenser'],
                'short_desc'     => ['ar' => 'مبرد مياه مخفي القارورة لشكل جمالي وسهولة التبديل.', 'en' => 'Hidden bottle dispenser for aesthetic look and easy replacement.'],
                'description'    => ['ar' => 'لن تضطر لرفع قوارير المياه الثقيلة بعد الآن. تصميم أنيق يناسب المطابخ والمكاتب الحديثة.', 'en' => 'No more lifting heavy water bottles. Elegant design fitting modern kitchens and offices.'],
                'price'          => 8500.00,
                'old_price'      => 9000.00,
                'in_stock'       => true,
                'stock_qty'      => 15,
                'image'          => 'products/dispenser-bottom.jpg',
                'gallery'        => [],
                'specifications' => ['ar' => ['نوع التحميل' => 'سفلي', 'الحنفيات' => '3 (ساخن/بارد/فاتر)'], 'en' => ['Load Type' => 'Bottom', 'Faucets' => '3 (Hot/Cold/Room)']],
                'features'       => ['ar' => ['شكل انسيابي', 'مؤشر لانتهاء القارورة'], 'en' => ['Sleek design', 'Empty bottle indicator']],
                'whats_included' => ['ar' => ['مبرد المياه'], 'en' => ['Water Dispenser']],
                'warranty'       => ['ar' => 'ضمان سنتين', 'en' => '2-year warranty'],
                'rating'         => 4.7,
                'review_count'   => 35,
                'sales_count'    => 65,
                'featured'       => true,
                'status'         => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
