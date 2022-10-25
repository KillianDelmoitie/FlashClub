<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dj')->insert([
            'name' => 'Alex Chesko',
            'description' => 'DJ&Manager',
            'picture' => 'Alex.jpg',
            'priority' => '100',
            'snapchat' => 'https://www.snapchat.com/add/dj.alexchesko',
            'instagram' => 'https://www.instagram.com/alexchesko/',
            'facebook' => 'https://www.facebook.com/djalexchesko',
            'linkedin' => '',
            'mix' => '',
       ]);
    }
}
