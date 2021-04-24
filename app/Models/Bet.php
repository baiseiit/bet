<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function match()
    {
        return $this->belongsTo(MatchModel::class, 'match_id', 'id');
    }

    public static function fetchByUser(int $userId)
    {
        return Bet::where(['user_id' => $userId])->with('match')->get();
    }

    public static function fetchByCoefficient()
    {
        $sel = 'user_id, sum(coefficient) as coefficient';
        $results = Bet::with('user')->selectRaw($sel)->groupBy('user_id')->
        orderBy('coefficient', 'DESC')->get()->makeHidden('user_id');

        return $results;
    }
}
