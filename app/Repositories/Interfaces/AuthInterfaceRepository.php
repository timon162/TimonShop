<?php

namespace App\Repositories\Interfaces;

use App\Models\TimonShopUser;

interface AuthInterfaceRepository
{
    public function register(array $data): TimonShopUser;
    public function logout(int $userId);
}
