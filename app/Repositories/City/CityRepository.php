<?php

namespace App\Repositories\City;

use App\Contracts\City\CityInterface;
use App\Models\City\CityModel;

class CityRepository implements CityInterface
{
    protected CityModel $model;

    public function __construct(CityModel $model)
    {
        $this->model = $model;
    }

    public function all(array $where=[]): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model
            ->select("cities.id", "cities.name")
            ->selectRaw('COUNT(companies.id) as usage_count') // Kullanım sayısını hesapla
            ->leftJoin('companies', 'cities.id', '=', 'companies.city_id') // İlişkiyi kur
            ->groupBy('cities.id', 'cities.name')
            ->orderBy('cities.name', 'ASC')
            ->where($where)
            ->get();

        return $this->model->all();
    }

    public function find(array $where=[])
    {
        return $this->model->where($where)->first();
    }
}
