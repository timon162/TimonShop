<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\TimonShopUser;
use App\Repositories\Interfaces\AuthInterfaceRepository;

class AuthRepository implements AuthInterfaceRepository
{
    public function register(array $data): TimonShopUser
    {
        $users = TimonShopUser::create($data);
        return $users;
    }

    public function logout(int $userId)
    {
        if ($userId) {
            TimonShopUser::where('id', $userId)->update(['remember_token' => null]);
        }
    }
}
