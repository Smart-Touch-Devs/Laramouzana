<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            "Benin" => [
                "BN",
                "229"
            ],
            "Burkina Faso" => [
                "BF",
                "226"
            ],
            "Côte d'Ivoire" => [
                "CI",
                "225"
            ],
            "Mali" => [
                "ML",
                "223"
            ],
            "Niger" => [
                "NG",
                "227"
            ],
            "Togo" => [
                "TG",
                "228"
            ]
        ];
        foreach ($countries as $country => $detail) {
            DB::table('countries')
            ->insert([
                'countryName' => $country,
                'abbreviation' => $detail[0],
                'indicative' => $detail[1]
            ]);
        }
    }
}

