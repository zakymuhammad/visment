<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();

        $this->createSkills();
    }

    protected function createSkills()
    {

        $types = ['MT', 'OR']; // Mata Pelajaran & Olahraga Traits/Skills
        $d = [

            [ 'name' => 'MATEMATIKA', 'skill_type' => $types[0] ],
            [ 'name' => 'BAHASA INGGRIS', 'skill_type' => $types[0] ],
            [ 'name' => 'PBB', 'skill_type' => $types[1] ],

        ];
        DB::table('skills')->insert($d);
    }

}
