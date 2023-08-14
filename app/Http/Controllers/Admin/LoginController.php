<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('backend.auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->get('email'), 'password' => $request->get('password')],
            $request->get('remember'))) {
            return Redirect::route('admin.index');
        }

        return Redirect::route('admin.login')
            ->withErrors(trans('auth.failed'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::route('admin.login');
    }
}
