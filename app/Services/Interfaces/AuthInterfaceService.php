<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;
use App\Models\TimonShopUser;

interface AuthInterfaceService
{
    public function register(array $data): TimonShopUser;

    public function login(array $data): TimonShopUser;

    public function logout();
}
