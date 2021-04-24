<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function register($data)
    {
        $user = new self();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();
        return $user;
    }

    public static function getByCredentials(array $data)
    {
        return User::where([
            ['email', $data['email']],
            ['password', $data['password']],
        ])->first();
    }

    public function bets()
    {
        return $this->hasMany(Bet::class);
    }

    public static function fetchByCoefficient()
    {
        $sel = 'user_id, sum(coefficient) as coefficient';
        $results = Bet::with('user')->selectRaw($sel)->groupBy('user_id')->
        orderBy('coefficient', 'DESC')->get()->makeHidden('user_id');

        return $results;
    }
}
