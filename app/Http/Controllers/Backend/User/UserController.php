<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $items = UserModel::all();

        return response()->json($items);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|max:255",
            "email" => !$request->id ? "required|email|unique:users,email" : "required|email",
            "password" => "required|min:8"
        ]);

        if($validator->fails())
            return response()->json(["errors" => $validator->errors()], 422);

        if(!$request->id) {
            $user = UserModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'rank_id' => $request->rank_id,
                "password" => Hash::make($request->password),
            ]);
        } else {
            $user = UserModel::find($request->id);
            $data = $request->only(['name', 'email', 'password', 'rank_id']);
            $user->update($data);
        }

        return response()->json($user);
    }

    public function get($id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:users,id",
        ]);

        if($validator->fails())
            return response()->json($validator->errors()->first(), 422);


        $item = UserModel::find($id);
        return response()->json($item);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make(["id" => $id], [
            "id" => "required|integer|exists:users,id",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->first(), 422);
        }

        if(UserModel::destroy($id)){
            return response()->json("Bilgiler sistemden kalıcı olarak silindi.");
        } else {
            return response()->json("Bilgiler sistemden silinemedi!", 422);
        }
    }
}
