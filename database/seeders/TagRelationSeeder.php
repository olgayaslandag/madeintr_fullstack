<?php

namespace Database\Seeders;

use App\Models\Company\CompanyModel;
use App\Models\Tag\TagModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TagRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagIds = TagModel::pluck('id')->toArray();
        $companyIds = CompanyModel::pluck('id')->toArray();

        $faker = Faker::create('tr_TR');

        for ($i = 0; $i < 1000; $i++) {
            $tagId = $faker->randomElement($tagIds);
            $companyId = $faker->randomElement($companyIds);

            // Aynı eşleşme varsa geç
            $exists = DB::table('tag_relations')
                ->where('tag_id', $tagId)
                ->where('company_id', $companyId)
                ->exists();

            if ($exists) {
                $i--; // Aynı sayıda giriş için index geri alınır
                continue;
            }

            DB::table('tag_relations')->insert([
                'tag_id' => $tagId,
                'company_id' => $companyId,
                'created_by' => 1,
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
