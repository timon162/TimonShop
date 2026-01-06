<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\AuthInterfaceService;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    public function __construct(protected AuthInterfaceService $Authservice) {}

    public function viewRegister()
    {
        return view('auth_views.register_view');
    }

    public function viewLogin()
    {
        return view('auth_views.login_view');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->Authservice->register($request->validated());

            Auth::login($user);

            return response()->json([
                'mess' => 'Đăng ký thành công'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'mess' => 'Đăng ký thất bại'
            ]);
        }
    }

    public function login(LoginRequest $request)
    {

        try {
            $this->Authservice->login($request->validated());

            return response()->json([
                'mess' => 'Login success'
            ], 200);
        } catch (AuthenticationException $e) {

            return response()->json([
                'mess' => 'Email hoặc mật khẩu không đúng'
            ], 401);
        }
    }

    public function logout()
    {
        $this->Authservice->logout();
    }
}
