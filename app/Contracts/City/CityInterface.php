<?php

namespace App\Contracts\City;

interface CityInterface
{
    public function all(array $where=[]);
    public function find(array $where=[]);
}
