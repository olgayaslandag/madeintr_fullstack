<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Contracts\Tag\TagInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected TagInterface $repository;

    public function __construct(TagInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $data = [
            "tags" => $this->repository->all()
        ];

        return view('admin.tag.tags', $data);
    }
}
