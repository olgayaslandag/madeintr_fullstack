<?php

namespace App\Models\TagCategory;

use Illuminate\Database\Eloquent\Model;

class TagCategoryModel extends Model
{
    protected $table = 'tag_categories';

    protected $fillable = [
        'name',
    ];
}
