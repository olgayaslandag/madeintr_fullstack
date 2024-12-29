<?php

namespace App\Contracts\User;

interface UserInterface
{
    public function all(array $where=[]);

    public function find(array $where=[]);

    public function store(array $data, int $id = null);
}
