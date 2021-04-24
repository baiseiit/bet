<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'user@test.com',
            'name' => 'User',
            'password' => '123',
            'money' => 21000,
            'bonus' => 6000,
            'experience' => 52000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'email' => 'user2@test.com',
            'name' => 'User2',
            'password' => '123',
            'money' => 10500,
            'bonus' => 5000,
            'experience' => 250000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'email' => 'user3@test.com',
            'name' => 'User3',
            'password' => '123',
            'bonus' => 1500,
            'experience' => 2000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
