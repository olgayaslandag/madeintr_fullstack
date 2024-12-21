<?php

namespace App\Services\Company;

use App\Contracts\Company\CompanyInterface;
use App\Repositories\Tag\TagRepository;
use App\Services\Logo\LogoService;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    protected CompanyInterface $repository;
    protected TagRepository $tagRepository;
    protected LogoService $logoService;

    public function __construct(
        CompanyInterface $repository,
        TagRepository $tagRepository,
        LogoService $logoService
    )
    {
        $this->repository = $repository;
        $this->tagRepository = $tagRepository;
        $this->logoService = $logoService;
    }

    public function getAll()
    {
        return $this->repository->all()->map(function ($item) {
            $logoPath = optional($item->logo)->path;
            $item->path = $logoPath ? Storage::url($logoPath) : null;
            return $item;
        });
    }



    public function store(array $data, ?int $companyId = null)
    {
        if (isset($data['logo'])) {
            $logo = $this->logoService->uploadLogo($data['logo']);
            $data['logo_id'] = $logo->id ?? '';
            unset($data['logo']);
        }

        $company = $this->repository->store($data, $companyId);

        if (!empty($data['tags'])) {
            $this->tagRepository->updateCompanyTags($data['tags'], $company->id);
        }

        return $this->repository->find($company->id);
    }
}
