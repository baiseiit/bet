<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bets')->insert([
            'match_id' => 1,
            'user_id' => 1,
            'amount' => 1000,
            'coefficient' => 5.7,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 2,
            'user_id' => 1,
            'amount' => 3000,
            'coefficient' => 2.2,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 3,
            'user_id' => 1,
            'amount' => 2000,
            'coefficient' => 3.1,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 4,
            'user_id' => 1,
            'amount' => 1500,
            'coefficient' => 1.7,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 1,
            'user_id' => 1,
            'amount' => 1550,
            'coefficient' => 1.7,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 2,
            'user_id' => 1,
            'amount' => 3350,
            'coefficient' => 2.5,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 3,
            'user_id' => 1,
            'amount' => 2450,
            'coefficient' => 2.1,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 4,
            'user_id' => 1,
            'amount' => 1100,
            'coefficient' => 1.8,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 2,
            'user_id' => 1,
            'amount' => 3000,
            'coefficient' => 2.7,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 3,
            'user_id' => 1,
            'amount' => 2700,
            'coefficient' => 3.1,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 4,
            'user_id' => 1,
            'amount' => 1500,
            'coefficient' => 1.2,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 1,
            'user_id' => 1,
            'amount' => 2900,
            'coefficient' => 2.1,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 5,
            'user_id' => 1,
            'amount' => 2800,
            'coefficient' => 1.9,
            'status' => 'in_progress',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 1,
            'user_id' => 2,
            'amount' => 2200,
            'coefficient' => 1.5,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 2,
            'user_id' => 2,
            'amount' => 1900,
            'coefficient' => 1.8,
            'status' => 'in_progress',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 1,
            'user_id' => 3,
            'amount' => 3100,
            'coefficient' => 66,
            'status' => 'win',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('bets')->insert([
            'match_id' => 2,
            'user_id' => 3,
            'amount' => 4100,
            'coefficient' => 18,
            'status' => 'loss',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
