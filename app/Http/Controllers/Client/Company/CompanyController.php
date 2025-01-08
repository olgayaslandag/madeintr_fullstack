<?php

namespace App\Http\Controllers\Client\Company;

use App\Contracts\City\CityInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected CityInterface $cityRepository;

    public function __construct(CityInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }
    public function form()
    {
        $data = [
            "cities" => $this->cityRepository->all()
        ];

        return view('client/company/company_form', $data);
    }
}
