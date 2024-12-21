<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagRelationModel extends Model
{
    use HasFactory;

    protected $table="tag_relations";

    protected $fillable = [
        'tag_id',
        'company_id'
    ];

    public function company(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Company\CompanyModel::class, 'id', 'company_id');
    }

    public function sector(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\Tag\TagModel::class, 'id', 'tag_id');
    }
}
