<?php

namespace App\Repositories\Ai;

use App\Contracts\Ai\AiInterface;
use App\Models\Ai\AiModel;

class AiRepository implements AiInterface
{
    protected AiModel $model;

    public function __construct(AiModel $model)
    {
        $this->model = $model;
    }

    public function find(array $where = []): ?\Illuminate\Database\Eloquent\Model
    {
        return $this->model->where($where)->first();
    }

    public function store(array $data, int $id = null): AiModel
    {
        if (!$id) {
            return $this->model->create($data);
        } else {
            $item = $this->model->findOrFail($id);
            $item->update($data);
            return $item;
        }
    }
}
