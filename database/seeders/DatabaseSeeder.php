<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TimonShopUsersSeeder;
use Database\Seeders\TimonShopCategorieSeeder;
use Database\Seeders\TimonShopSupplierSeeder;
use Database\Seeders\TimonShopProductSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([TimonShopUsersSeeder::class]);
        $this->call([TimonShopCategorieSeeder::class]);
        $this->call([TimonShopSupplierSeeder::class]);
        $this->call([TimonShopProductSeeder::class]);
    }
}
