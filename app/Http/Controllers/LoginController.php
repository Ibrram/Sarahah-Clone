<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function handle($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {
        $handle = Socialite::driver($provider)->user();
        $user = User::firstOrCreate(['email' => $handle->getEmail()], [
            'name'  => $handle->getName(),
            'username' => $handle->getNickname(),
            'email' => $handle->getEmail(),
            'provider'  => $provider,
        ]);
        Auth()->login($user, true);
        return redirect()->to(route('messages'));
    }
}
