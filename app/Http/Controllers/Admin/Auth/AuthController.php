<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
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

    public function login(Request $request)
    {
        // Form verilerini doğrulama
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kullanıcıyı doğrulama
        $user = UserModel::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Başarılı giriş işlemi
            Auth::login($user);

            // Giriş yaptıktan sonra yönlendirme
            return redirect()->route('admin'); // veya başka bir sayfa
        } else {
            // Hatalı giriş
            return back()->withErrors([
                'email' => 'Geçersiz giriş bilgileri.',
            ]);
        }
    }
}
