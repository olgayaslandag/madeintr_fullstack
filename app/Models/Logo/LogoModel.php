<?php

namespace App\Models\Logo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoModel extends Model
{
    use HasFactory;

    protected $table = "logos";

    protected $fillable = [
        "path"
    ];
}
