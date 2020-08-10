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
        DB::table('student')->insert([
            [
                'full_name' => Str::random(20),
                'email'=>Str::random(20).'@gmail.com',
                'gender' =>rand(0,1),
                'date_of_birth' =>rand(1990,2010).'/'.rand(1,12).'/'.rand(1,30),
                'country_id' =>rand(1,10),
                'images' =>'default.png'
            ],
        ]);
    }
}
