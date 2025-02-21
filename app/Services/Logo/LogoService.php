<?php

namespace App\Services\Logo;

use App\Models\Logo\LogoModel;
use Illuminate\Http\UploadedFile;


class LogoService
{
    protected LogoModel $model;

    public function __construct(LogoModel $model)
    {
        $this->model = $model;
    }

    public function uploadLogo(UploadedFile $file): LogoModel
    {
        #$path = $file->store('app/logos', 'public');
        $path = 'logos/' . $file->hashName();
        $file->move(public_path('logos'), $file->hashName());

        return $this->model->create(['path' => $path]);
    }
}
