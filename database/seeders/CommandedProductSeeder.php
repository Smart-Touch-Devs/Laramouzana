<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commanded_products')
        ->insert([
            'command_id' => 1,
            'product_id' => 55,
            'quantity' => 2
        ]);
        DB::table('commanded_products')
        ->insert([
            'command_id' => 1,
            'product_id' => 57,
            'quantity' => 3
        ]);
    }
}
