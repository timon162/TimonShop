<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Services\Interfaces\UserInterfaceService;

class UserController extends Controller
{
    public function __construct(protected UserInterfaceService $userService) {}

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

        $respone = $this->userService->updateProfileUser($data);
        if ($respone) {
            return response()->json(['mess' => 'cập nhật thành công']);
        }
    }
}
