<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('clients')
            ->insert([
                'role' => 2,
                'firstname' => "Issac",
                'lastname' => "Drabo",
                'email' => 'issacdrabo@gmail.com',
                'email_verified' => now(),
                'birthday' => now(),
                'phone' => '65215421',
                'phone_verified' => now(),
                'country' => 2,
                'city' => 7,
                'affiliate_code' => "issac0051",
                'password' => Hash::make('issac'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('clients')
            ->insert([
                'role' => 1,
                'firstname' => "Samed",
                'lastname' => "Dao",
                'email' => 'sameddao@gmail.com',
                'email_verified' => now(),
                'birthday' => now(),
                'phone' => '50255025',
                'phone_verified' => now(),
                'country' => 2,
                'city' => 3,
                'sup_code' => 'issac0051',
                'affiliate_code' => "samed0050",
                'password' => Hash::make('samed'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
