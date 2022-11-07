<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class mahasiswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nim'=>'876952',
            'name'=>'agustiwan',
            'jurusan'=>'sistem informasi',
            'semester'=>'5',
        ]);
    }
}
