<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtokolPenelitiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 100001; $i <= 1000000; $i++) {
            $faker = Factory::create('id_ID');

            DB::table('protokol_peneliti')->insert([
                "pr_id" => rand(1, 1000000),
                "p_id" => rand(1, 1000000),
                "prp_role" => $faker->randomElement(['KETUA', ''])
            ]);
        }
    }
}
