<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedesSocialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media')->insert([
            ['nombre' => 'Facebook', 'url' => ''],
            ['nombre' => 'YouTube', 'url' => ''],
            ['nombre' => 'Instagram', 'url' => ''],
            ['nombre' => 'Threads', 'url' => ''],
            ['nombre' => 'X', 'url' => ''],
            ['nombre' => 'WhatsApp', 'url' => ''],
        ]);
    }
}
