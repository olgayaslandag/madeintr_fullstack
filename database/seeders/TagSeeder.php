<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        for ($i = 0; $i < 800; $i++) {
            $name = $faker->unique()->jobTitle;
            $slug = Str::slug($name);

            // Slug zaten varsa bu turu atla
            if (DB::table('tags')->where('slug', $slug)->exists()) {
                $i--; // Aynı sırada tekrar denemesi için index'i geri al
                continue;
            }

            DB::table('tags')->insert([
                'name' => $name,
                'order' => $i,
                'slug' => $slug,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
