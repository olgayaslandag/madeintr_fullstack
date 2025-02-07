<?php

namespace App\Repositories\Company;

use App\Models\Company\CompanyModel;

class CompanyRepository implements \App\Contracts\Company\CompanyInterface
{
    protected CompanyModel $model;

    public function __construct(CompanyModel $model)
    {
        $this->model = $model;
    }

    public function all(array $where=[]): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model
            ->where($where)
            ->with(['city:id,name', 'tags', 'logo:id,path'])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function store(array $data, int $id = null): CompanyModel
    {
        if (!$id) {
            return $this->model->create($data);
        } else {
            $company = $this->model->findOrFail($id);
            $company->update($data);
            return $company;
        }
    }

    public function find(int $id)
    {
        return $this->model
            ->with(['city:id,name', 'tags', 'logo:id,path'])
            ->find($id);
    }

    public function delete(int $id): int
    {
        return $this->model->destroy($id);
    }
}
