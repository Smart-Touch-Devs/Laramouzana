<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publicites')
        ->insert([
            "message" => "Shop and save big on hottest tablets",
            "designation" => "starting at",
            "prix" => " 10000 ",
            "imgPublicite" => "assets/img/1400X206/fond_solaire.jpg"
        ]);
    }
}
