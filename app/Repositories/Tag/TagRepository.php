<?php

namespace App\Repositories\Tag;

use App\Models\Tag\TagModel;
use App\Models\Tag\TagRelationModel;
use Illuminate\Support\Facades\DB;

class TagRepository implements \App\Contracts\Tag\TagInterface
{
    protected TagModel $model;

    protected TagRelationModel $relationModel;

    public function __construct(TagModel $model, TagRelationModel $relationModel)
    {
        $this->model = $model;
        $this->relationModel = $relationModel;
    }

    public function all(array $where = []): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model
            ->select("tags.id", "tags.name")
            ->selectRaw('COUNT(tag_relations.id) as usage_count') // Kullanım sayısını hesapla
            ->leftJoin('tag_relations', 'tags.id', '=', 'tag_relations.tag_id') // İlişkiyi kur
            ->groupBy('tags.id', 'tags.name')
            ->orderBy('usage_count', 'desc')
            ->where($where)
            ->get();
    }

    public function updateCompanyTags(array $tagNames, int $companyId): void
    {
        DB::transaction(function () use ($tagNames, $companyId) {
            $tags = collect($tagNames)->map(function ($tagName) {
                return $this->model->firstOrCreate(['name' => $tagName])->id;
            });

            $this->relationModel->where('company_id', $companyId)->delete();
            $relations = $tags->map(fn($tagId) => [
                'tag_id' => $tagId,
                'company_id' => $companyId,
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray();

            $this->relationModel->insert($relations);
        });
    }

    public function relationDelete(int $companyId)
    {
        return $this->relationModel->where('company_id', $companyId)->delete();
    }

    public function find(array $where = [])
    {
        return $this->model
            ->select("tags.id", "tags.name")
            ->groupBy('tags.id', 'tags.name')
            ->where($where)
            ->first();
    }

    public function store(array $data, int $id = null): TagModel
    {
        if (!$id) {
            return $this->model->create($data);
        } else {
            $user = $this->model->findOrFail($id);
            $user->update($data);

            return $user;
        }
    }

    public function delete(int $id): int
    {
        return $this->model->destroy($id);
    }

    public function companies(array $where=[])
    {
        return $this->model
            ->where($where)
            ->with(["companies.logo:id,path", "companies.city:id,name", "companies.tags"])
            ->first();
    }
}
