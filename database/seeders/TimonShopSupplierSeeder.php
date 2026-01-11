<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimonShopSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];

        $row1 = [
            'supplier_name' => 'ASUS',
            'supplier_image' => 'http://timon_shop.local/storage/supplier/logo_asus_ngang_ac594ab664.webp',
            'supplier_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row1);

        $row2 = [
            'supplier_name' => 'HONOR',
            'supplier_image' => 'http://timon_shop.local/storage/supplier/logo_honor_ngang_814fca59e4.webp',
            'supplier_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row2);

        $row3 = [
            'supplier_name' => 'SAMSUNG',
            'supplier_image' => 'http://timon_shop.local/storage/supplier/logo_samsung_ngang_1624d75bd8.webp',
            'supplier_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row3);

        $row4 = [
            'supplier_name' => 'XIAOMI',
            'supplier_image' => 'http://timon_shop.local/storage/supplier/logo_xiaomi_ngang_0faf267234.webp',
            'supplier_is_hot' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row4);

        DB::table('timon_shop_suppliers')->insert($list);
    }
}
