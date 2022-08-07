<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($j = 0; $j < 1; $j++) {
            $sql = "insert into payments (transaction_ref_no,gateway,payment_amount,paid_amount) values ";
            // $email = round(microtime(true) * 1000) . '@gmail.com';
            for ($i = 0; $i < 30000; $i++) {
                $sql .= "(" . implode(",", ["UUID()",  "'Poli'", "FLOOR(RAND()*(200-5+1)+5)", "FLOOR(RAND()*(3-1+1))"]) . "),";
            }
            $sql = rtrim($sql, ',');
            $sql .= ";";
            // echo $sql;
            DB::insert(DB::raw($sql));
        }
    }
}
