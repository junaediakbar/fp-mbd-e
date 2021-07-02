<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenelitiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 22; $i <= 1000000; $i++) {
            $faker = Factory::create('id_ID');

            DB::table('peneliti')->insert([
                "p_id" => $i,
                "p_nama" => $faker->name(),
                "p_instansi" => $faker->company,
                "p_email" => $faker->safeEmail,
                "p_nik" => $faker->nik,
            ]);
        }

    }
}
