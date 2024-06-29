<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\Interfaces\AuthenticationServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    public function __construct(
        protected AuthenticationServiceInterface $authenticationService
    )
    {
    }

    public function login(): View
    {
        return view('authentication.login');
    }

    public function handleLogin(LoginUserRequest $request): RedirectResponse
    {
        return $this->authenticationService->handleLogin($request);
    }

    public function register(): View
    {
        return view('authentication.register');
    }

    public function handleRegister(RegisterUserRequest $request): RedirectResponse
    {
        return $this->authenticationService->handleRegister($request);
    }

    public function handleLogout(): RedirectResponse
    {
        return $this->authenticationService->handleLogout();
    }
}
