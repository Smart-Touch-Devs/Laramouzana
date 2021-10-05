<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            "Abidjan" => 3,
            "Bamako" => 4,
            "Bobo Dioulasso" => 2,
            "Cotonou" => 1,
            "Lomé" => 6,
            "Niamey" => 5,
            "Ouagadougou" => 2
        ];

        foreach ($cities as $cityName => $countryId) {
            DB::table('cities')
                ->insert([
                    'belongedCountry' => $countryId,
                    'cityName' => $cityName
                ]);
        }
    }
}
