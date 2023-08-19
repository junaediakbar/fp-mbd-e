<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($c = 'A'; $c <= 'Z'; $c++) {
        //     if ($c == 'M' || $c == 'F' || $c == 'L' || $c == 'P')
        //         continue;

        //     for ($i = 1; $i < 10000; $i++) {
        //         $faker = Factory::create();

        //         DB::table('anggota')->insert([
        //             "ag_id" => $c.str_pad($i, 4, '0', STR_PAD_LEFT),
        //             "ag_nama" => $faker->name(),
        //             "ag_institusiasal" => $faker->company,
        //             "ag_email" => $faker->safeEmail,
        //             "ag_password" => '12345',
        //         ]);
        //     }
        // }

        $id = 200003;
        $ch = 'AAA3';

        for ($i = 200001; $i <= 1000000; $i++) {
            $offset = rand(200001, 1000000);

            $faker = Factory::create();

            // if ($ch == 'L' || $ch == 'P') {
            //     $ch++;
            // }
            if ($id == 200009) {
                $ch++;
                $id = 200001;
            }

            // if ($ch != 'L' && $ch != 'P') {
                DB::table('anggota')->insert([
                    "ag_id" => $ch . str_pad($id, 1, '0', STR_PAD_LEFT),
                    "ag_nama" => $faker->name(),
                    "ag_institusiasal" => $faker->company,
                    "ag_email" => $faker->safeEmail,
                    "ag_password" => '12345',
                ]);

                DB::table('member_kep')->insert([
                    "ag_id" => $ch . str_pad($id, 1, '0', STR_PAD_LEFT),
                    "sk_id" => $offset,
                    // "mk_role" => 'Ketua',
                    "mk_statusaktif" => 0,
                ]);
            // }

            $id++;
        }

    }
}
