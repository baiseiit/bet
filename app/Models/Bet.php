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

    public static function fetchByCoefficient()
    {
        $sel = 'user_id, sum(coefficient) as coefficient';
        $results = Bet::with('user')->selectRaw($sel)->groupBy('user_id')->
        orderBy('coefficient', 'DESC')->get()->makeHidden('user_id');

        return $results;
    }
}
