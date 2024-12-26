<?php

namespace App\Repositories\User;

use App\Contracts\User\UserInterface;
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
        return $this->model->where($where)->get();
    }
}
