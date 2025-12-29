<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function viewProfile()
    {
        return view('users.content_users.profile_user');
    }

    public function updateProfileUser(ProfileRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image_user')) {
            $path = $request->file('image_user')->store('avatar', 'public');
            $data['image_user'] = asset('storage/' . $path);
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
            return response()->json(['mess' => 'Cập nhật thất bại'], 401);
        }

        return response()->json(['mess' => 'Cập nhật thành công']);
    }
}
