<?php

namespace App\Http\Controllers\Client\Company;

use App\Contracts\City\CityInterface;
use App\Contracts\Company\CompanyInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected CityInterface $cityRepository;
    protected CompanyInterface $repository;

    public function __construct(
        CityInterface $cityRepository,
        CompanyInterface $repository
    )
    {
        $this->cityRepository = $cityRepository;
        $this->repository = $repository;
    }

    public function index()
    {
        $data = [
            "letters" => range('a', 'z'),
            "companies" => $this->repository->all()
        ];

        return view('client.company.companies', $data);
    }

    public function form()
    {
        $data = [
            "cities" => $this->cityRepository->all()
        ];

        return view('client.company.company_form', $data);
    }

    public function get(int $id)
    {
        $item = $this->repository->find($id);

        return view('client.company.company', compact('item'));
    }
}
