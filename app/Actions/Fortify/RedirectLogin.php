<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class RedirectLogin implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

   
        if ($user->role === 1) {
            return redirect()->intended('dashboard');
        } elseif ($user->role === 2) {
            return redirect()->intended('/manager-dashboard');
        } else {
            return redirect()->intended('/dashboard');
        }
    }
}