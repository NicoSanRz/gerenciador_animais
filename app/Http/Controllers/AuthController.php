<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('autenticacao.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', bcrypt('senha'));

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros!',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
