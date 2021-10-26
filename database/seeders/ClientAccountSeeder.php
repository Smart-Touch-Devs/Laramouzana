<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('client_accounts')
       ->insert([
           "client_id" => 1,
           "amount" => 17500
       ]);
       DB::table('client_accounts')
       ->insert([
           "client_id" => 2,
           "amount" => 10000
       ]);
       DB::table('client_accounts')
       ->insert([
           "client_id" => 3,
           "amount" => 5500
       ]);
       DB::table('client_accounts')
       ->insert([
           "client_id" => 4,
           "amount" => 28000
       ]);
    }
}
