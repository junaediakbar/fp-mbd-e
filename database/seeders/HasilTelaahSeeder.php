<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilTelaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 5; $i <= 1000000; $i++) {
            $faker = Factory::create('id_ID');
            $rand_id = rand(1, 1000000);

            DB::table('hasil_telaah')->insert([
                "ht_id" => $i,
                "pr_id" => $rand_id,
                "ht_fileproposal" => '\Uploads\Proposal\\'. $i . '.pdf',
                "ht_tglsubmitproposal" => $faker->date(),
                "ht_perbaikanke" => rand(0, 2),
                "ht_statusproses" => $faker->randomElement(['PROSES', 'MENUNGGU', 'SELESAI']),
                "ht_tglapprovalkep" => $faker->date(),
                "ht_uploadic" => '\Uploads\IC\\'. $i . '.pdf',
                "ht_prta1" => $faker->sentence(),
                "ht_prta2" => $faker->sentence(),
                "ht_prta3" => $faker->date(),
                "ht_prta4" => $faker->date(),
                "ht_prta5" => 1,
                "ht_prta6" => $faker->sentence(),
                "ht_prtb1" => $faker->sentence(),
                "ht_prtb2" => $faker->sentence(),
            ]);
        }

    }
}
