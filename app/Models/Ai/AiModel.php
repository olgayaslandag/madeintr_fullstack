<?php

namespace App\Models\Ai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiModel extends Model
{
    use HasFactory;

    protected $table = 'ai';

    protected $fillable = [
        'prompt',
        'model',
        'created_by',
        'updated_by',
    ];
}
