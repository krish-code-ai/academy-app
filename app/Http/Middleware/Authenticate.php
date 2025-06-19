<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as MiddlewareAuthenticate;

class Authenticate extends MiddlewareAuthenticate
{
    // protected function unauthenticated($request, array $guards)
    // {
    //     foreach ($guards as $guard) {
    //         switch ($guard) {
    //             case 'admin':
    //                 throw new AuthenticationException(redirectTo: route('admin.login'));
    //                 break;
    //             default:
    //                 throw new AuthenticationException(redirectTo: route('login'));
    //         }
    //     }
    // }

    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.',
            $guards,
            $this->redirectTo($request)
        );
    }

    protected function redirectTo($request): ?string
    {
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }

        return route('home');
    }
}
