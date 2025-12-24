<?php

namespace App\Services;

use App\Services\Interfaces\UserInterfaceService;
use App\Models\TimonShopUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr; //helper của laravel hỗ trợ cho những hàm như only()

class UserService implements UserInterfaceService
{
    public function updateProfileUser(array $data): bool
    {
        $user = Auth::user();

        return $user->update(Arr::only($data, [
            'email',
            'name',
            'image_user',
            'phone_number',
        ]));
    }
}
