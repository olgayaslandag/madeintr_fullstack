<?php

namespace App\Models\City;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;

    protected $table="cities";

    protected $fillable = [
        "name",
        "plate",
        "phone_code"
    ];
}
