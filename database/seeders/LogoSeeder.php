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
            "img/logos/logo_1.jpg",
            "img/logos/logo_2.png",
            "img/logos/logo_3.webp",
            "img/logos/logo_4.png",
            "img/logos/logo_5.png",
            "img/logos/logo_6.png",
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
