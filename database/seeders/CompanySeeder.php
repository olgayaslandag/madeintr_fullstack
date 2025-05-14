<?php

namespace Database\Seeders;

use App\Models\City\CityModel;
use App\Models\Company\CompanyModel;
use App\Models\Logo\LogoModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('tr_TR');

        $cityIds = DB::table('cities')->pluck('id')->toArray();
        $logoIds = DB::table('logos')->pluck('id')->toArray();

        for ($i = 0; $i < 800; $i++) {
            $name = $faker->company;
            $city_id = $faker->randomElement($cityIds);


            if (DB::table('companies')->where(['name' => $name, 'city_id' => $city_id])->exists()) {
                $i--; // Aynı sırada tekrar denemesi için index'i geri al
                continue;
            }

            DB::table('companies')->insert([
                "name" => $name,
                "webpage" => $faker->url,
                "desc" => $faker->text(500),
                "city_id" => $city_id,
                "logo_id" => $faker->randomElement($logoIds),
                "franchising" => $faker->numberBetween(0, 1),
                "created_by" => 1,
                "updated_by" => null,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
    }
}
