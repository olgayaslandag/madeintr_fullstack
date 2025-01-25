<?php

namespace App\Models\Tag;

use App\Models\Company\CompanyModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    use HasFactory;

    protected $table = "tags";

    protected $fillable = [
        "name"
    ];

    public function companies()
    {
        return $this->hasManyThrough(
            CompanyModel::class,
            TagRelationModel::class,
            'tag_id',       // Foreign key on tags_relation table
            'id',           // Foreign key on companies table
            'id',           // Local key on tags table
            'company_id'    // Local key on tags_relation table
        );
    }
}
