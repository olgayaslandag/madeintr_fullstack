<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;

    protected $table="companies";

    protected $fillable = [
        "name",
        "webpage",
        "desc",
        "city_id",
        "logo_id",
        "franchising",
        "user_id"
    ];

    public function city(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\City\CityModel::class, 'id', 'city_id');
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(
            \App\Models\Tag\TagModel::class,
            \App\Models\Tag\TagRelationModel::class,
            'company_id', // TagRelationModel'deki yabancı anahtar
            'id', // TagModel'deki anahtar
            'id', // CompanyModel'deki anahtar
            'tag_id' // TagRelationModel'deki sektör id'si
        );
    }

    public function logo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Logo\LogoModel::class, 'id', 'logo_id');
    }
}
