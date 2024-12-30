<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Contracts\Tag\TagInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function edit(int $id)
    {
        $data = [
            "item" => $this->repository->find(['id' => $id])
        ];

        return view('admin.tag.tag_edit', $data);
    }

    public function store(TagRequest $request)
    {
        $data = $request->all();


        $this->repository->store($data, $data['id'] ?? null);
        return redirect()->route('tag.all');
    }

    public function delete(TagRequest $request): \Illuminate\Http\RedirectResponse
    {
        $delete = $this->repository->delete($request->id);
        if(!$delete)
            return redirect()->route('tag.all')->with('error', 'Bilgiler sistemden silinemedi!');

        return redirect()->route('tag.all')->with('success', 'Bilgiler sistemden kalıcı olarak silindi.');
    }

    public function create()
    {
        return view("admin.tag.tag_form");
    }
}
