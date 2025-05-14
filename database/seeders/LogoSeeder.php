<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $logos = [
            "img/logos/1.jpg",
            "img/logos/2.png",
            "img/logos/3.webp",
            "img/logos/4.png",
            "img/logos/5.jpg",
            "img/logos/6.png",
        ];

        foreach($logos as $logo) {
            DB::table('logos')->insert([
                'path' => $logo,
                'created_by' => 1,
                'updated_by' => null,
            ]);
        }
    }
}
