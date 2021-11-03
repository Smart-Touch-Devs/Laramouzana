<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            CountrieSeeder::class,
            CitieSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            ClientSeeder::class,
            AdminAccountSeeder::class,
            ClientAccountSeeder::class,
            CommandSeeder::class,
            DepositSeeder::class,
            WithdrawSeeder::class,
            PercentageSeeder::class,
            ImageSeeder::class
           // CommandedProductSeeder::class
        ]);
    }
}
