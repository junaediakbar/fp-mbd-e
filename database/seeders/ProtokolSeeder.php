<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtokolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 6; $i <= 1000000; $i++) {
            $faker = Factory::create('id_ID');
            $rand_id = rand(1, 1000000);

            DB::table('pengusul')->insert([
                "pu_id" => $i + 1,
                "p_id" => $rand_id,
                "pu_nama" => $faker->name(),
                "pu_instansi" => $faker->company,
                "pu_nik" => $faker->nik,
                "pu_email" => $faker->safeEmail,
                "pu_password" => 12345,
                "pu_nokontak" => $faker->phoneNumber,
            ]);

            DB::table('protokol')->insert([
                "pr_id" => $i,
                "pu_id" => $i + 1,
                "pr_judul" => $faker->sentence(),
                "pr_tglpengajuan" => $faker->date(),
                "pr_tglkeputusankep" => $faker->date(),
                "pr_tglpenugasantim" => $faker->date(),
                "pr_klasifikasikep" => $faker->randomElement(['E2', 'E1', 'FB', '']),
            ]);
        }


    }
}
