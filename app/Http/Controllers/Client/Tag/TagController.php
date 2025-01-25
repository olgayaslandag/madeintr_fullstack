<?php

namespace App\Http\Controllers\Client\Tag;

use App\Contracts\Company\CompanyInterface;
use App\Contracts\Tag\TagInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected TagInterface $repository;
    protected CompanyInterface $companyRepository;

    public function __construct(TagInterface $repository, CompanyInterface $companyRepository)
    {
        $this->repository = $repository;
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
        $data = [
            "letters" => range('a', 'z'),
            "tags" => $this->repository->all()
        ];
        return view('client.tag.tags', $data);
    }

    public function get(int $id)
    {
        $data = [
            "tag" => $this->repository->companies(['tags.id' => $id])
        ];

        return view('client.tag.tag', $data);
    }
}
