<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dorms')->delete();
        $data = [
            ['name' => 'Lab RPL'],
            ['name' => 'Lab AKL'],
            ['name' => 'Lab OTKP'],
            ['name' => 'Lab PM'],
            ['name' => 'Lab UPW'],
            ['name' => 'Lab MM'],
            ['name' => 'Lab PFPT'],
        ];
        DB::table('dorms')->insert($data);
    }
}
