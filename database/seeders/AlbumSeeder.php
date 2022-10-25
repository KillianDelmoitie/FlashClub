<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'date' => now(),
            'name' => 'TEMPLATE ALBUM',
            'important' => false,
            'cover' => ' ',
            'fb' => ' ',
            'count' => 0
       ]);
    }
}
