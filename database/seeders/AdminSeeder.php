<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'role_id' => 5,
            'first_name' => "Aboubakary",
            'last_name' => 'Cissé',
            'email' => 'waywardsidick@gmail.com',
            'birthday' => now(),
            'phone' => '0022663154785',
            'country' => 2,
            'city' => 7,
            'password' => Hash::make('test'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('admins')->insert([
            'role_id' => 3,
            'first_name' => "John",
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'birthday' => now(),
            'phone' => '0022665874596',
            'country' => 2,
            'city' => 7,
            'password' => Hash::make('john'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('admins')->insert([
            'role_id' => 4,
            'first_name' => "Jane",
            'last_name' => 'Doe',
            'email' => 'janedoe@gmail.com',
            'birthday' => now(),
            'phone' => '0022668954125',
            'country' => 2,
            'city' => 7,
            'password' => Hash::make('jane'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
