<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TimonShopUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];

        $row1 = [
            'name' => 'Admin',
            'email' => 'duyle8889@gmail.com',
            'password' => Hash::make('Khanhduy@123'),
            'phone_number' => '0948887959',
            'role' => 'admin',
            'image_user' => 'http://timon_shop.local/storage/avatar/Uu9GDWEOJDkmSFaeNWRESQZKrwLk0O9jz0JO4SOi.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row1);

        $row2 = [
            'name' => 'User',
            'email' => 'user1234@gmail.com',
            'password' => Hash::make('Duyle@234'),
            'phone_number' => '0948887959',
            'role' => '',
            'image_user' => 'http://timon_shop.local/storage/avatar/Uu9GDWEOJDkmSFaeNWRESQZKrwLk0O9jz0JO4SOi.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row2);

        DB::table('timon_shop_users')->insert($list);
    }
}
