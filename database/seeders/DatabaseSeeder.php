<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        DB::statement('SET foreign_key_checks = 0;');

        User::factory()->createMany([
            [
                'name' => 'Test User',
                'rank_id' => 1,
                'status_id' => rand(1, 4),
                'email' => 'test@example.com',
                'password' => '123123123',
            ],
            [
                'name' => 'Olgay Aslandağ',
                'rank_id' => 1,
                'status_id' => 1,
                'email' => 'olgayaslandag@gmail.com',
                'password' => '123123123',
            ],
        ]);

        $this->call([
            CitySeeder::class,
            LogoSeeder::class,
            CompanySeeder::class,
            TagSeeder::class,
            TagRelationSeeder::class,
            ProminentCompanySeeder::class,
        ]);

        DB::statement('SET foreign_key_checks = 1;');
    }
}
