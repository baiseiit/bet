<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function bets()
    {
        $user = $this->auth();

        if (!isset($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Запрос требует авторизации'
            ], 403);
        }

        return response()->json($user->bets()->get());
    }

    public function rating()
    {
        $users = User::fetchByCoefficient();
        return response()->json($users);
    }

    public function user()
    {
        $user = $this->auth();

        if (!isset($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Запрос требует авторизации'
            ], 403);
        }

        return response()->json($user);
    }

    public function auth()
    {
        return Session::has('user') ? Session::get('user') : null;
    }

    public function logout()
    {
        Session::forget('user');
    }

    public function setUser($user)
    {
        Session::put('user', $user);
    }
}
