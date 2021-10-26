<?php

namespace Database\Seeders;

use App\Models\Withdraw;
use Illuminate\Database\Seeder;

class WithdrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Withdraw::create([
            'client_id' => 2,
            'amount' => 10000,
            'done' => true
        ]);

        Withdraw::create([
            'client_id' => 2,
            'amount' => 25000,
            'done' => false
        ]);
    }
}
