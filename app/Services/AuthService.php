<?php

namespace App\Services;

use App\Services\Interfaces\AuthInterfaceService;
use App\Repositories\Interfaces\AuthInterfaceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TimonShopUser;
use Illuminate\Http\Request;

class AuthService implements AuthInterfaceService
{
    public function __construct(protected  AuthInterfaceRepository $Authrepo) {}

    public function register($data): TimonShopUser
    {
        $data['password'] = Hash::make($data['password']);
        $response = $this->Authrepo->register($data);
        if (!$response) {
            throw new \Exception('REGISTER_FAILED');
        }
        return $response;
    }

    public function login($data): bool
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        return Auth::attempt($credentials, $data['remember']);
    }

    public function logout()
    {
        $userId = Auth::id();

        Auth::logout();

        $this->Authrepo->logout($userId);
    }
}
