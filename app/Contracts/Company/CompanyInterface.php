<?php

namespace App\Contracts\Company;

interface CompanyInterface
{
    public function all(array $where=[]);
    public function find(int $id);
    public function store(array $data, int $id = null);
    public function delete(int $id): int;
}
