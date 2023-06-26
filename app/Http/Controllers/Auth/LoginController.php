<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            if (! Auth::attempt($request->only('username', 'password'), $request->filled('remember_me'))) {
                return redirect()
                    ->back()
                    ->withErrors([
                        'error' => 'Gagal melakukan proses login.',
                    ]);
            }
            $request->session()->regenerate();

            return redirect()->route('dashboard.index');
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->withErrors([
                    'error' => $e->getMessage(),
                ]);
        }
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.show-login-form');
    }
}
