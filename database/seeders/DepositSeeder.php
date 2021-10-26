<?php

namespace Database\Seeders;

use App\Models\Deposit;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deposit::create([
            'client_id' => 2,
            'amount' => 10000
        ]);

        Deposit::create([
            'client_id' => 2,
            'amount' => 25000
        ]);
    }
}
