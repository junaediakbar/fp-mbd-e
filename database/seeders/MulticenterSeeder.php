<?php

namespace Database\Seeders;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MulticenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 100001; $i <= 300000; $i++) {
            $offset = rand(1, 100000);
            $faker = Factory::create();

             DB::table('multicenter')->insert([
                "kep_id" => rand(5, 1000000),
                "pr_id"=> rand(5, 1000000),
                "kep_utama"=> rand(0, 1)
            ]);

            // DB::table('sk_kep')->insert([
            //     "sk_id" => $i+143862,
            //     "kep_id" => $offset,
            //     "sk_nomorsk" => 'SK/KEPK/2029.932-12/TP',
            //     "sk_validstart" => '2017-07-01',
            //     "sk_validend" => '2021-07-01',
            // ]);
        }
    }
}
