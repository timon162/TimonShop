<?php

namespace App\Repositories\Interfaces;

use App\Models\TimonShopUser;

interface AuthInterfaceRepository
{
    public function register($data): TimonShopUser;
    public function logout($userId);
}
