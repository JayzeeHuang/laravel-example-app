<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Container\Container;

class UsersSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Fake ten million users around five mins
        // best performer for mine 30000/s
        // Database\Seeders\UsersSeeder ........................................................................................................ 1,015ms DONE

        // echo bcrypt('abcd1234');
        $password = '$2y$10$kWaQiyzf1uOlmZkdqfJYleRw0zOMuMNUtnVWJ8RHDQ.46ZyMt1lqi';
        for ($j = 0; $j < 1; $j++) {
            $sql = "insert into users (hash_id,name,email,password) values ";
            // $sql = "insert into users (" . implode(",", ["hash_id","name","email","password"]) . ") values ";
            $email = round(microtime(true) * 1000) . '@gmail.com'; // avoid crash because email unique
            for ($i = 0; $i < 30000; $i++) { // config with your max, mine was 30000 each time
                $sql .= "(" . implode(",", ["UUID()", "'user--" . $i . "'", "'" . $j . $i . $email . "'", "'" . $password . "'"]) . "),";
                // $sql .= "(UUID(),'user--" . $i. "','" . $j. $i . $email . "','". $password ."'),";
            }
            $sql = rtrim($sql, ',');
            $sql .= ";";
            // echo $sql;
            DB::insert(DB::raw($sql));
        }
    }
}
