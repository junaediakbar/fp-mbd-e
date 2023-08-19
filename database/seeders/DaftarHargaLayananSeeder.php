<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarHargaLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 300002; $i <= 400000; $i++) {
            $offset = rand(300002, 400000);
            $faker = Factory::create();

             DB::table('daftar_harga_layanan')->insert([
                "dhl_id" => $i,
                "kep_id" => $i+1,
                "dhl_nama" => $faker->name,
                "dhl_biaya" => rand(200000,300000),
                "dhl_hargavalidstart" => $faker->date,
                "dhl_hargavalidend" => '2021-07-01'
            ]);
        }
    }
}
