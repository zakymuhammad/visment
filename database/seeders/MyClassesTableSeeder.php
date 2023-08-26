<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Rekayasa Perangkat Lunak', 'class_type_id' => $ct[0]],
            ['name' => 'Akuntansi dan Keuangan Lembaga', 'class_type_id' => $ct[0]],
            ['name' => 'Tata Kelola Perkantoran', 'class_type_id' => $ct[0]],
            ['name' => 'Pemasaran', 'class_type_id' => $ct[0]],
            ['name' => 'Usaha Perjalanan Pariwisata', 'class_type_id' => $ct[0]],
            ['name' => 'Multimedia', 'class_type_id' => $ct[0]],
            ['name' => 'Produksi Film dan Program Televisi', 'class_type_id' => $ct[0]],
            ];

        DB::table('my_classes')->insert($data);

    }
}
