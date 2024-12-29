<?php

namespace App\Repositories\User;

use App\Contracts\User\UserInterface;
use App\Enums\UserRankEnum;
use App\Models\User\UserModel;

class UserRepository implements UserInterface
{
    protected UserModel $model;

    public function __construct(UserModel $model)
    {
        $this->model = $model;
    }

    public function all(array $where=[])
    {
        $items = $this->model->where($where)->get();

        foreach($items as $item)
        {
            $item->rank_label = UserRankEnum::getLabel($item->rank_id);
        }

        return $items;
    }

    public function find(array $where=[])
    {
        return $this->model->where($where)->first();
    }

    public function store(array $data, int $id = null): UserModel
    {
        if (!$id) {
            return $this->model->create($data);
        } else {
            $user = $this->model->findOrFail($id);
            $user->update($data);

            return $user;
        }
    }
}
