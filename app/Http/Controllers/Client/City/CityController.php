<?php

namespace App\Http\Controllers\Client\City;

use App\Contracts\City\CityInterface;
use App\Contracts\Company\CompanyInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected CityInterface $repository;
    protected CompanyInterface $companyRepository;

    public function __construct(
        CityInterface $repository,
        CompanyInterface $companyRepository
    )
    {
        $this->repository = $repository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $items = $this->repository->all();

        return view('client.city.cities', compact('items'));
    }

    public function get(int $id)
    {
        $city = $this->repository->find(['id' => $id]);
        $companies = $this->companyRepository->all(['city_id' => $id]);

        return view('client.city.city', compact('city', 'companies'));
    }
}
