<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\UserRankEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $user = UserModel::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return redirect()->route(UserRankEnum::Admin->id() === $user->rank_id ? 'admin' : 'home');
        } else {
            return back()->withErrors([
                'email' => 'Geçersiz giriş bilgileri.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
