<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function fetchByUser(Request $request)
    {
        $bets = Bet::fetchByUser($request->get('user_id'));
        return response()->json($bets);
    }

    public function userRating()
    {
        $users = Bet::fetchByCoefficient();
        return response()->json($users);
    }
}
