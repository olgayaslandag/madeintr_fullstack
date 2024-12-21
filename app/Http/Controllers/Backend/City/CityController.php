<?php

namespace App\Http\Controllers\Backend\City;

use App\Http\Controllers\Controller;
use App\Models\City\CityModel;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $items = CityModel::all();

        return response()->json($items);
    }
}
