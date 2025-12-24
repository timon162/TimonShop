<?php

namespace App\Services\Interfaces;

use App\Models\TimonShopUser;

interface UserInterfaceService
{
    public function updateProfileUser(array $data): bool;
}
