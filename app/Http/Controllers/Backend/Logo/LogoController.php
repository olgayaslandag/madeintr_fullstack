<?php

namespace App\Http\Controllers\Backend\Logo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo\LogoModel;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function show($id)
    {
        $logo = LogoModel::find($id);

        if (!$logo) {
            abort(404);
        }

        $path = $logo->path;

        $fileContent = Storage::disk('local')->get($path);
        $mimeType = Storage::disk('local')->mimeType($path);

        return response($fileContent, 200)->header('Content-Type', $mimeType);
    }
}
