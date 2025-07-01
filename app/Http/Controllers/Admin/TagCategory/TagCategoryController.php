<?php

namespace App\Http\Controllers\Admin\TagCategory;

use App\Contracts\TagCategory\TagCategoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagCategoryController extends Controller
{
    protected TagCategoryInterface $repository;

    public function __construct(TagCategoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $items = $this->repository->all();
        return view('admin.tag_category.categories', compact('items'));
    }

    public function form(int $id=0)
    {
        $item = $id ? $this->repository->find(['id' => $id]) : null;
        return view('admin.tag_category.category_form', compact('item'));
    }

    public function store(Request $request)
    {
        $this->repository->store($request->all());

        return redirect()
            ->route('admin.tag.category.all')
            ->with('success', 'Kategori başarıyla kaydedildi.');
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);

        return redirect()
            ->route('admin.tag.category.all')
            ->with('success', 'Kategori başarıyla silindi.');
    }
}
