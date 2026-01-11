<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimonShopCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];

        $row1 = [
            'category_name' => 'Điện Thoại',
            'category_image' => 'http://timon_shop.local/storage/category/phone.png',
            'category_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row1);

        $row2 = [
            'category_name' => 'Máy Tính Bảng',
            'category_image' => 'http://timon_shop.local/storage/category/may_tinh_bang.png',
            'category_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row2);

        $row3 = [
            'category_name' => 'Laptop',
            'category_image' => 'http://timon_shop.local/storage/category/laptop.png',
            'category_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row3);

        DB::table('timon_shop_categories')->insert($list);
    }
}
