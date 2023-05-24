<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = [
            [
                'gender_desc' => 'Laki Laki',
            ],
            [
                'gender_desc' => 'Perempuan',
            ]
        ];
        Gender::insert($genders);
    }
}
