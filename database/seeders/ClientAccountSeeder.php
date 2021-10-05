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
       DB::table('clients_accounts')
       ->insert([
           "client_id" => 1,
           "amount" => 17500
       ]);
       DB::table('clients_accounts')
       ->insert([
           "client_id" => 2,
           "amount" => 0
       ]);
    }
}
