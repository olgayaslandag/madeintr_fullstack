<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\Company\CompanyModel;
use App\Models\Logo\LogoModel;
use App\Models\Tag\TagModel;
use App\Models\Tag\TagRelationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $itemList = CompanyModel::with(['city:id,name', 'sectors', 'logo:id,path'])->get();

        $items = $itemList->map(function($item) {
            $logoPath = optional($item->logo)->path; // Logo yolu
            return [
                ...$item->toArray(),
                'path' => Storage::url($logoPath) ?? null // Dinamik anahtar
            ];
        });

        return response()->json($items);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "name"      => "required",
            "webpage"   => "required",
            "desc"      => "required",
            "city_id"   => "required|exists:cities,id",
            //"logo"      => "nullable|file",
            "franchising" => "required",
            "user_id" => "required|exists:users,id"
        ]);

        if($validator->fails())
            return response()->json(["errors" => $validator->errors()], 422);


        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $file = $file->store('app/logos');
        }

        if(isset($file)) {
            $logo = LogoModel::create([
                'path' => $file
            ]);
        }

        if(!$request->id) {
            $company = CompanyModel::create([
                "name"      => $request->name,
                "webpage"   => $request->webpage,
                "desc"      => $request->desc,
                "city_id"   => $request->city_id,
                "logo_id"   => $logo->id ?? 0,
                "franchising" => $request->franchising,
                "user_id"   => $request->user_id
            ]);
        } else {
            $company = CompanyModel::findOrFail($request->id);
            $data = $request->only(['name', 'webpage', 'desc', 'city_id', 'franchising', 'user_id']);

            $data['logo_id'] = isset($logo->id) ? $logo->id : 0;

            $company->update($data);
        }

        $sectors = $request->sectors ?? [];
        if(count($sectors) > 0) {
            TagRelationModel::where('company_id', $company->id)->delete();
            foreach ($sectors as $sector_id) {
                $sector = TagModel::find($sector_id);
                if(!$sector)
                    continue;

                $processSector = TagRelationModel::create([
                    'sector_id' => $sector_id,
                    'company_id' => $company->id
                ]);

                if($processSector)
                    $company->sectors[] = $sector;
            }
        }

        $company = CompanyModel::with(['city:id,name', 'sectors', 'logo:id,path'])->find($company->id);
        $logoPath = optional($company->logo)->path;
        $company->path = Storage::url($logoPath) ?? null;

        return response()->json($company);
    }

    public function get($id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:companies,id",
        ]);

        if($validator->fails())
            return response()->json($validator->errors()->first(), 422);

        $item = CompanyModel::with(['city:id,name', 'sectors', 'logo:id,path'])->find($id);
        $logoPath = optional($item->logo)->path;
        $item->path = Storage::url($logoPath) ?? null;

        return response()->json($item);
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "id"      => "required|exists:companies,id",
            "user_id" => "required|exists:users,id"
        ]);

        if($validator->fails())
            return response()->json(["errors" => $validator->errors()], 422);

        $file = $request->file('logo');
        if($file) {
            $file = $file->store(storage_path('app/logos'));
            $logo = LogoModel::create([
                'path' => $file
            ]);
        }
        $item = CompanyModel::find($request->id);
        $item->user_id = $request->user_id;

        if($request->name)
            $item->name = $request->name;
        if($request->webpage)
            $item->webpage = $request->webpage;
        if($request->desc)
            $item->desc = $request->desc;
        if($request->city_id)
            $item->city_id = $request->city_id;
        if(isset($logo))
            $item->logo_id = $logo->id;
        if($request->franchising)
            $item->franchising = $request->franchising;

        if($item->save()){
            return response()->json([
                "message" => "Bilgiler başarıyla güncellendi.",
                "result" => $item
            ]);
        } else {
            return response()->json("Bilgiler güncellenemedi!", 401);
        }
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:companies,id",
        ]);

        if($validator->fails())
            return response()->json($validator->errors()->first(), 422);

        if(CompanyModel::destroy($id)){
            TagRelationModel::where('company_id', $id)->delete();

            return response()->json("Bilgiler sistemden kalıcı olarak silindi.");
        } else {
            return response()->json("Bilgiler sistemden silinemedi!", 422);
        }
    }
}
