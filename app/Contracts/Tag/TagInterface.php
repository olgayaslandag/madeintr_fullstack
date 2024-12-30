<?php

namespace App\Contracts\Tag;

interface TagInterface
{
    public function all(array $where=[]): \Illuminate\Database\Eloquent\Collection;
    public function updateCompanyTags(array $tagNames, int $companyId): void;
    public function relationDelete(int $companyId);
    public function find(array $where = []);
    public function store(array $data, int $id = null);
    public function delete(int $id): int;
}
