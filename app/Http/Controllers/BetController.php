<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function userRating()
    {
        $users = Bet::fetchByCoefficient();
        return response()->json($users);
    }
}
