<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => '1', 'code' => 'O'],
            ['name' => '2', 'code' => 'T'],
            ['name' => '3', 'code' => 'TH'],
        ];

        DB::table('class_types')->insert($data);

    }
}
