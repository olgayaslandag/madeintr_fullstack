<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Login(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|exists:users,email",
            "password" => "required|min:8"
        ]);

        if($validator->fails())
            return response()->json(['errors' => $validator->errors()], 422);

        $user = UserModel::where(["email" => $request->email])->first();


        if(!Hash::check($request->password, $user->password))
            return response()->json(['errors' => ['password' => "Hatalı şifre gönderdiniz!"]], 422);

        Auth::login($user);
        Auth::user()->token = Auth::user()->createToken('satis_paneli')->plainTextToken;

        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
