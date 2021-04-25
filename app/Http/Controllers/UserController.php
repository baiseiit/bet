<?php

namespace App\Http\Controllers;

use App\Libs\Box;
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
                'message' => 'Неправильно введен адрес электронной почты или пароль'
            ], 404);
        }

        $this->setUser($user);
        return response()->json($user);
    }

    public function user(Request $request)
    {
        $user = $this->auth($request->get('user_id'));
        return response()->json($user);
    }

    public function openBox(Request $request)
    {
        $user = $this->auth($request->get('user_id'));
        $experience = $user->experience;

        if ($experience % User::EXPERIENCE_IN_LEVEL !== 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'У вас нет достаточно кол-во часов, чтобы получить сундук'
            ], 403);
        }

        $data = $this->calcBoxValue($user);
        $user = $user->updateData($user->id, $data);
        $this->setUser($user);

        $response = $data;
        $response['user'] = $user;
        return response()->json($response);
    }

    public function auth($userId)
    {
        return Session::get('user') ?? User::find($userId);
    }

    public function logout()
    {
        Session::forget('user');
    }

    public function setUser($user)
    {
        Session::put('user', $user);
    }

    private function calcBoxValue(User $user)
    {
        $boxTypes = Box::$types;
        $box = $boxTypes[rand(0, count($boxTypes) - 1)];

        $data = [];

        switch ($box['name']) {
            case 'bonus':
                $data['bonus'] = $user->bonus + $box['value'];
                break;
            case 'win_cashback':
                if ($user->getLastWin()) {
                    $data['bonus'] = $this->calcCashback(
                        $user->bonus,
                        $user->getLastWin()['amount'],
                        $box['value']
                    );
                } else {
                    $data['bonus'] = $user->bonus + Box::$types[0]['value'];
                    $box['name'] = 'bonus';
                }
                break;
            case 'loss_cashback':
                if ($user->getLastLoss()) {
                    $data['bonus'] = $this->calcCashback(
                        $user->bonus,
                        $user->getLastLoss()['amount'],
                        $box['value']
                    );
                } else {
                    $data['bonus'] = $user->bonus + Box::$types[0]['value'];
                    $box['name'] = 'bonus';
                }
                break;
            case 'exp':
                $data['experience'] = $user->experience + $box['value'];
        }

        $data['box'] = $box['name'];
        return $data;
    }

    private function calcCashback(int $bonus, int $betAmount, float $cashback)
    {
        return $bonus + $betAmount * $this->toDecimal($cashback);
    }

    private function toDecimal($percent)
    {
        return $percent / 100;
    }
}
