<?php

namespace App\Services;

use App\Services\Interfaces\AuthInterfaceService;
use App\Repositories\Interfaces\AuthInterfaceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TimonShopUser;
use Illuminate\Auth\AuthenticationException;


class AuthService implements AuthInterfaceService
{
    public function __construct(protected  AuthInterfaceRepository $Authrepo) {}

    public function register(array $data): TimonShopUser
    {
        $data['password'] = Hash::make($data['password']);
        $response = $this->Authrepo->register($data);
        if (!$response) {
            throw new \Exception('REGISTER_FAILED');
        }
        return $response;
    }

    public function login(array $data): TimonShopUser
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $remember = $data['remember'] ?? false;

        if (!Auth::attempt($credentials, $remember)) {
            throw new AuthenticationException();
        }
        return Auth::user();
    }

    public function logout()
    {
        $userId = Auth::id();

        Auth::logout();

        $this->Authrepo->logout($userId);
    }
}
