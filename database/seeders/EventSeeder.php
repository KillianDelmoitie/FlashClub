<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'date' => '2020/02/02',
            'start' => '00:00',
            'end' => ' 00:00',
            'theme' => '',
            'dj' => '{}',
            'description' => ' ',
            'picture' => ' '
       ]);
    }
}
