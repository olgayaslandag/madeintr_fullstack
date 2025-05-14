<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->truncate();
        $cities = [
            ['name' => 'Adana', 'plate' => 1],
            ['name' => 'Adıyaman', 'plate' => 2],
            ['name' => 'Afyonkarahisar', 'plate' => 3],
            ['name' => 'Ağrı', 'plate' => 4],
            ['name' => 'Amasya', 'plate' => 5],
            ['name' => 'Ankara', 'plate' => 6],
            ['name' => 'Antalya', 'plate' => 7],
            ['name' => 'Artvin', 'plate' => 8],
            ['name' => 'Aydın', 'plate' => 9],
            ['name' => 'Balıkesir', 'plate' => 10],
            ['name' => 'Bilecik', 'plate' => 11],
            ['name' => 'Bingöl', 'plate' => 12],
            ['name' => 'Bitlis', 'plate' => 13],
            ['name' => 'Bolu', 'plate' => 14],
            ['name' => 'Burdur', 'plate' => 15],
            ['name' => 'Bursa', 'plate' => 16],
            ['name' => 'Çanakkale', 'plate' => 17],
            ['name' => 'Çankırı', 'plate' => 18],
            ['name' => 'Çorum', 'plate' => 19],
            ['name' => 'Denizli', 'plate' => 20],
            ['name' => 'Diyarbakır', 'plate' => 21],
            ['name' => 'Edirne', 'plate' => 22],
            ['name' => 'Elazığ', 'plate' => 23],
            ['name' => 'Erzincan', 'plate' => 24],
            ['name' => 'Erzurum', 'plate' => 25],
            ['name' => 'Eskişehir', 'plate' => 26],
            ['name' => 'Gaziantep', 'plate' => 27],
            ['name' => 'Giresun', 'plate' => 28],
            ['name' => 'Gümüşhane', 'plate' => 29],
            ['name' => 'Hakkâri', 'plate' => 30],
            ['name' => 'Hatay', 'plate' => 31],
            ['name' => 'Isparta', 'plate' => 32],
            ['name' => 'Mersin', 'plate' => 33],
            ['name' => 'İstanbul', 'plate' => 34],
            ['name' => 'İzmir', 'plate' => 35],
            ['name' => 'Kars', 'plate' => 36],
            ['name' => 'Kastamonu', 'plate' => 37],
            ['name' => 'Kayseri', 'plate' => 38],
            ['name' => 'Kırklareli', 'plate' => 39],
            ['name' => 'Kırşehir', 'plate' => 40],
            ['name' => 'Kocaeli', 'plate' => 41],
            ['name' => 'Konya', 'plate' => 42],
            ['name' => 'Kütahya', 'plate' => 43],
            ['name' => 'Malatya', 'plate' => 44],
            ['name' => 'Manisa', 'plate' => 45],
            ['name' => 'Kahramanmaraş', 'plate' => 46],
            ['name' => 'Mardin', 'plate' => 47],
            ['name' => 'Muğla', 'plate' => 48],
            ['name' => 'Muş', 'plate' => 49],
            ['name' => 'Nevşehir', 'plate' => 50],
            ['name' => 'Niğde', 'plate' => 51],
            ['name' => 'Ordu', 'plate' => 52],
            ['name' => 'Rize', 'plate' => 53],
            ['name' => 'Sakarya', 'plate' => 54],
            ['name' => 'Samsun', 'plate' => 55],
            ['name' => 'Siirt', 'plate' => 56],
            ['name' => 'Sinop', 'plate' => 57],
            ['name' => 'Sivas', 'plate' => 58],
            ['name' => 'Tekirdağ', 'plate' => 59],
            ['name' => 'Tokat', 'plate' => 60],
            ['name' => 'Trabzon', 'plate' => 61],
            ['name' => 'Tunceli', 'plate' => 62],
            ['name' => 'Şanlıurfa', 'plate' => 63],
            ['name' => 'Uşak', 'plate' => 64],
            ['name' => 'Van', 'plate' => 65],
            ['name' => 'Yozgat', 'plate' => 66],
            ['name' => 'Zonguldak', 'plate' => 67],
            ['name' => 'Aksaray', 'plate' => 68],
            ['name' => 'Bayburt', 'plate' => 69],
            ['name' => 'Karaman', 'plate' => 70],
            ['name' => 'Kırıkkale', 'plate' => 71],
            ['name' => 'Batman', 'plate' => 72],
            ['name' => 'Şırnak', 'plate' => 73],
            ['name' => 'Bartın', 'plate' => 74],
            ['name' => 'Ardahan', 'plate' => 75],
            ['name' => 'Iğdır', 'plate' => 76],
            ['name' => 'Yalova', 'plate' => 77],
            ['name' => 'Karabük', 'plate' => 78],
            ['name' => 'Kilis', 'plate' => 79],
            ['name' => 'Osmaniye', 'plate' => 80],
            ['name' => 'Düzce', 'plate' => 81],
        ];

        foreach ($cities as &$city) {
            $city['created_at'] = Carbon::now();
            $city['updated_at'] = Carbon::now();
        }

        DB::table('cities')->insert($cities);
    }
}
