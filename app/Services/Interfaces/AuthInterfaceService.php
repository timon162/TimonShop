<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;
use App\Models\TimonShopUser;

interface AuthInterfaceService
{
    public function register($data): TimonShopUser;

    public function login($data): bool;

    public function logout();
}
