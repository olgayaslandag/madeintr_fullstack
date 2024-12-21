<?php

namespace App\Contracts\Tag;

interface TagInterface
{
    public function all(array $where=[]): \Illuminate\Database\Eloquent\Collection;
    public function updateCompanyTags(array $tagNames, int $companyId): void;
    public function relationDelete(int $companyId);
}
