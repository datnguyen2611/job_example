<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class StudenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 50; $i++) {
            DB::table('student')->insert([
                'full_name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'gender' => rand(0, 1),
                'date_of_birth' => rand(1990, 2010) . '/' . rand(1, 12) . '/' . rand(1, 29),
                'country_id' => rand(1, 10),
                'images' => 'default.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);

        }
    }
}
