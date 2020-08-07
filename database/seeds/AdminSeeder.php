<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' =>'admin',
                'email' =>'admin@admin.com',
                'password' => bcrypt('adminadmin')
            ]
        ];
       $user =DB::table('users')->insert($data);
    }
}
