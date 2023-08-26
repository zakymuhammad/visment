<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormitoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dormitories')->delete();
        $data = [
            ['name' => 'Lab RPL'],
            ['name' => 'Lab AKL'],
            ['name' => 'Lab OTKP'],
            ['name' => 'Lab PM'],
            ['name' => 'Lab UPW'],
            ['name' => 'Lab MM'],
            ['name' => 'Lab PFPT'],
        ];
        DB::table('dormitories')->insert($data);
    }
}
