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

    const EXPERIENCE_IN_LEVEL = 1000;

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

    public static function updateData(int $id, array $data)
    {
        $user = User::find($id);
        $user->name = $data['name'] ?? $user->name;
        $user->email = $data['email'] ?? $user->email;
        $user->password = $data['password'] ?? $user->password;
        $user->money = $data['money'] ?? $user->money;
        $user->bonus = $data['bonus'] ?? $user->bonus;
        $user->experience = $data['experience'] ?? $user->experience;

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

    public function getLastLoss()
    {
        return $this->bets()->where('bets.status', 'loss')->get()->last();
    }

    public function getLastWin()
    {
        return $this->bets()->where('bets.status', 'win')->get()->last();
    }
}
