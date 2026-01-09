<?php

namespace App\Services;

use App\Exceptions\NullException;
use App\Exceptions\FalseException;
use App\Services\Interfaces\UserInterfaceService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserService implements UserInterfaceService
{
    public function updateProfile(array $data): void
    {

        if (isset($data['image_user'])) {
            $path = $data['image_user']->store('supplier', 'public');
            $dataSupplier['image_user'] = asset('storage/' . $path);
        } else {
            unset($data['image_user']);
        }
        $user = Auth::user();

        $updated = $user->update(Arr::only($data, [
            'email',
            'name',
            'image_user',
            'phone_number',
        ]));

        if (!$updated) {
            throw new FalseException();
        }
    }
}
