<?php

namespace App\Contracts\Ai;

interface AiInterface
{
    public function find(array $where = []): ?\Illuminate\Database\Eloquent\Model;
    public function store(array $data, int $id = null);
}
