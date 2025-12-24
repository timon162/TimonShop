<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\AuthInterfaceService;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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

            return redirect()->route('admin');
        } catch (\Throwable $e) {
            return back()->withErrors([
                'email' => 'Đăng ký thất bại'
            ]);
        }
    }

    public function login(LoginRequest $request)
    {
        $response = $this->Authservice->login($request->validated());

        if (!$response) {
            return response()->json(['mess' => 'undefined']);
        }
        return response()->json(['mess' => 'success']);
    }

    public function logout()
    {
        $this->Authservice->logout();
    }
}
