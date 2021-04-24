<?php

namespace Database\Seeders;

use App\Models\Match;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matches')->insert([
            'first_player' => 'Барселона',
            'second_player' => 'Реал Мадрид',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('matches')->insert([
            'first_player' => 'Ливерпуль',
            'second_player' => 'ПСЖ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('matches')->insert([
            'first_player' => 'Барти Эшли',
            'second_player' => 'Свитолина Элина',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('matches')->insert([
            'first_player' => 'Камару Усман',
            'second_player' => 'Хорхе Масвидал',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('matches')->insert([
            'first_player' => 'HAVU',
            'second_player' => 'BIG',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
