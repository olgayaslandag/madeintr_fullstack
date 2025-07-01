<?php

namespace App\Repositories\TagCategory;

use App\Contracts\TagCategory\TagCategoryInterface;
use App\Models\TagCategory\TagCategoryModel;

class TagCategoryRepository implements TagCategoryInterface
{
    protected TagCategoryModel $model;

    public function __construct(TagCategoryModel $model)
    {
        $this->model = $model;
    }

    public function all(array $where=[])
    {
        return $this->model->where($where)->get();
    }

    public function find(array $where=[])
    {
        return $this->model->where($where)->first();
    }

    public function store(array $data)
    {
        if (!isset($data['id']) || !$data['id']) {
            return $this->model->create($data);
        } else {
            $item = $this->model->findOrFail($data['id']);
            $item->update($data);
            return $item;
        }
    }

    public function delete(int $id)
    {
        return $this->model->destroy($id);
    }
}
