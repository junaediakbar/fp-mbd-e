<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberPenelaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 1; $i <= 1000000; $i++) {
            $ch = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
            $in = rand(10, 999);

            $ag_id = $ch . str_pad($in, 3, '0', STR_PAD_LEFT);

            $row = DB::table('member_kep')->select('sk_id')->where('ag_id', $ag_id)->first();

            while (is_null($row)) {
                $ch = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
                $in = rand(10, 999);

                $ag_id = $ch . str_pad($in, 3, '0', STR_PAD_LEFT);
                $row = DB::table('member_kep')->select('sk_id')->where('ag_id', $ag_id)->first();
            }

            DB::table('member_penelaah')->insert([
                "ag_id" => $ag_id,
                "sk_id" => $row->sk_id,
                "ht_id" => rand(1, 1000000),
            ]);
        }
    }
}
