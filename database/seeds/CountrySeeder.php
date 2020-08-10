<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
           [
               'id' =>'1',
               'name' =>'Hà nội',
               'code' => 'HN',
               'continent_name' =>'vietnam'
           ],
            [
                'id' =>'2',
                'name' =>'Quảng ninh',
                'code' => 'QN',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'3',
                'name' =>'Quảng nam',
                'code' => 'QN1',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'4',
                'name' =>'Hồ chí minh',
                'code' => 'HCM',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'5',
                'name' =>'Nha trang',
                'code' => 'NT',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'6',
                'name' =>'Hải phòng',
                'code' => 'HP',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'7',
                'name' =>'Nghệ An',
                'code' => 'NA',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'8',
                'name' =>'Thanh hóa',
                'code' => 'TH',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'9',
                'name' =>'Huế',
                'code' => 'HU',
                'continent_name' =>'vietnam'
            ],
            [
                'id' =>'10',
                'name' =>'Yên bái',
                'code' => 'YB',
                'continent_name' =>'vietnam'
            ],
        ]);
    }
}
