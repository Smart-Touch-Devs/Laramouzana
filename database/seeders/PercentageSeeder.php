<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PercentageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deposit_percentages')
        ->insert([
            "deposit_percentage" => 5,
        ]);

        DB::table('retrait_percentages')
        ->insert([
            "retrait_percentage" => 5,
        ]);

        DB::table('transfere_percentages')
        ->insert([
            "transfere_percentage" => 1,
        ]);
    }

}
