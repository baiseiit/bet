<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::register($request->all());
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $user = User::getByCredentials($request->all());

        if (empty($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Неправильно введенный адрес электронной почты или пароль'
            ], 404);
        }

        $this->setUser($user);
        return response()->json($user);
    }

    public function user()
    {
        session_start();
        return $_SESSION['user'] ?: null;
    }

    public function logout()
    {
        session_start();
        $_SESSION['user'] = null;
    }

    public function setUser($user)
    {
        session_start();
        $_SESSION['user'] = $user;
    }
}
