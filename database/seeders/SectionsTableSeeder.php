<?php
namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $c = MyClass::pluck('id')->all();

        $data = [
            ['name' => '10', 'my_class_id' => $c[0], 'active' => 1],

            ['name' => '11', 'my_class_id' => $c[0], 'active' => 1],

            ['name' => '12', 'my_class_id' => $c[1], 'active' => 1],

            ['name' => '13', 'my_class_id' => $c[2], 'active' => 1],
        ];

        DB::table('sections')->insert($data);
    }
}
