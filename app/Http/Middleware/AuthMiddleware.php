<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $isAuth = $this->isAuth();

        if (!$isAuth) {
            if (!$request->has('user_id')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Запрос требует авторизации'
                ], 403);
            }
        }

        return $next($request);
    }

    private function isAuth()
    {
        return Session::has('user');
    }
}
