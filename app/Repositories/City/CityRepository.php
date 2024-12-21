<?php

namespace App\Repositories\City;

use App\Models\City\CityModel;

class CityRepository implements \App\Contracts\City\CityInterface
{
    protected CityModel $model;

    public function __construct(CityModel $model)
    {
        $this->model = $model;
    }

    public function all(array $where=[]): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model->all();
    }
}
