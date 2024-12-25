<?php

namespace App\Http\Controllers\Admin\Company;

use App\Contracts\Company\CompanyInterface;
use App\Contracts\Tag\TagInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyRequest;
use App\Contracts\City\CityInterface;
use App\Services\Company\CompanyService;
use App\Services\Logo\LogoService;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    protected CityInterface $cityRepository;
    protected TagInterface $tagRepository;
    protected CompanyInterface $repository;
    protected CompanyService $companyService;
    protected LogoService $logoService;

    public function __construct(
        CityInterface $cityRepository,
        TagInterface $tagRepository,
        CompanyInterface $repository,
        CompanyService $companyService,
        LogoService $logoService
    )
    {
        $this->cityRepository = $cityRepository;
        $this->tagRepository = $tagRepository;
        $this->repository = $repository;
        $this->companyService = $companyService;
        $this->logoService = $logoService;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        $data = [
            "items" => $this->companyService->getAll(),
            "cities" => $this->cityRepository->all(),
            "tags" => $this->tagRepository->all()
        ];

        return view('admin.company.companies', $data);
    }

    public function store(CompanyRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->all();
        $company = $this->companyService->store($data, $request->id);

        $logoPath = optional($company->logo)->path;
        $company->path = Storage::url($logoPath) ?? null;

        return response()->json($company);
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $data = [
            "cities" => $this->cityRepository->all(),
        ];

        return view('admin.company.form', $data);
    }

    public function form(int $id): \Illuminate\Contracts\View\View
    {
        $data = [
            'item' => $this->repository->find($id),
            "cities" => $this->cityRepository->all(),
        ];

        return view('admin.company.form', $data);
    }

    public function edit(int $id): \Illuminate\Contracts\View\View
    {
        $item = $this->repository->find($id);
        $logoPath = optional($item->logo)->path;
        $item->path = Storage::url($logoPath) ?? null;

        $data = [
            "item" => $item,
            "cities" => $this->cityRepository->all(),
        ];

        return view("admin.company.company-edit", $data);
    }

    public function delete(CompanyRequest $request): \Illuminate\Http\RedirectResponse
    {
        $delete = $this->repository->delete($request->id);
        if(!$delete)
            return redirect()->route('company.all')->with('error', 'Bilgiler sistemden silinemedi!');

        $this->tagRepository->relationDelete($request->id);
        return redirect()->route('company.all')->with('success', 'Bilgiler sistemden kalıcı olarak silindi.');
    }
}
