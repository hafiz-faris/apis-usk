<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ]);

    // Menggunakan callback Auth::attempt untuk memaksa pencarian email case-sensitive (BINARY)
    $authenticated = Auth::attempt([
        'password' => $credentials['password'],
        fn ($query) => $query->whereRaw('BINARY email = ?', [$credentials['email']]),
    ], $request->boolean('remember'));

    if ($authenticated) {
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Kredensial yang Anda masukkan tidak cocok dengan data kami.',
    ])->onlyInput('email');
}
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}