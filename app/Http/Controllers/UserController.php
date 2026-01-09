<?php

namespace App\Http\Controllers;

use App\Exceptions\FalseException;
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

        try {
            $this->userService->updateProfile($data);
            return response()->json(['success' => 'Cập nhật thành công'], 201);
        } catch (FalseException $error) {
            return response()->json(['error' => $error->getMessage()], 401);
        }
    }
}
