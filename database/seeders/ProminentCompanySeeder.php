<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProminentCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyIds = DB::table('companies')->pluck('id')->toArray();
        $faker = Faker::create('tr_TR');

        for ($i = 0; $i < 100; $i++) {
            $startDate = $faker->dateTimeBetween('-1 year', 'now');
            $monthsToAdd = rand(1, 12); // 1 ile 12 ay arasında rastgele
            $endDate = (clone $startDate)->modify("+$monthsToAdd months");

            DB::table('prominent_companies')->insert([
                'company_id' => $faker->randomElement($companyIds),
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'status_id' => $faker->randomElement([0, 3]),
                'created_by' => 1,
                'updated_by' => null,
            ]);
        }
    }
}
