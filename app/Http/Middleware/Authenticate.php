<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        // Kalau tidak ada guard yang didefinisikan, pakai default
        if (empty($guards)) {
            $guards = ['web', 'pegawai'];
        }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::shouldUse($guard); // ← ini penting
                return;
            }
        }

        // Kalau semua gagal, lempar ke unauthenticated
        $this->unauthenticated($request, $guards);
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login.form');
        }
    }
}
