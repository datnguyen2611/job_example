<?php

use Illuminate\Database\Seeder;

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
                'full_name' => 'Nguyen van A',
                'email'=>'abc@gmail.com',
                'gender' =>'0',
                'date_of_birth' =>'2010/09/10',
                'country_id' =>'2',
            ],
            [
                'full_name' => 'Nguyen van B',
                'email'=>'ss@gmail.com',
                'gender' =>'0',
                'date_of_birth' =>'2010/09/10',
                'country_id' =>'1',
            ],
            [
                'full_name' => 'Nguyen nam C',
                'email'=>'cc@gmail.com',
                'gender' =>'0',
                'date_of_birth' =>'2010/09/10',
                'country_id' =>'1',
            ],
        ]);
    }
}
