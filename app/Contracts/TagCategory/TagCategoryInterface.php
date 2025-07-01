<?php

namespace App\Contracts\TagCategory;

interface TagCategoryInterface
{
    public function all(array $where=[]);
    public function find(array $where=[]);
    public function store(array $data);
    public function delete(int $id);
}
