<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // ✅ Esta es la correcta
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $user = Auth::user();

    // Redirección según rol
    switch ($user->rol) {
        case 'admin':
            return redirect()->route('admin.panel');
        case 'personal':
            return redirect()->route('personal.panel');
        case 'invitado':
            return redirect()->route('invitado.panel');
        default:
            Auth::logout();
            return redirect('/login')->withErrors('Rol no válido.');
    }
}

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
