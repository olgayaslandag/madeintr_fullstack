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

}
