<?php

namespace App\Http\Controllers\Backend\Sector;

use App\Http\Controllers\Controller;
use App\Models\Tag\TagModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectorController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $items = TagModel::all();

        return response()->json($items);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|max:255",
        ]);

        if($validator->fails())
            return response()->json(["errors" => $validator->errors()], 422);

        if(!$request->id) {
            $item = TagModel::create([
                'name' => $request->name,
            ]);
        } else {
            $item = TagModel::find($request->id);
            $data = $request->only(['name']);
            $item->update($data);
        }

        return response()->json($item);
    }

    public function get($id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:sectors,id",
        ]);

        if($validator->fails())
            return response()->json($validator->errors()->first(), 422);


        $item = TagModel::find($id);
        return response()->json($item);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:sectors,id",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->first(), 422);
        }

        if(TagModel::destroy($id)){
            return response()->json("Bilgiler sistemden kalıcı olarak silindi.");
        } else {
            return response()->json("Bilgiler sistemden silinemedi!", 422);
        }
    }
}
