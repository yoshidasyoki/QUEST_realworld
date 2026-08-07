<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function auth(LoginRequest $request)
    {
        $form = $request->validated();

        $result = Auth::attempt($form);

        if (!$result) {
            return back()->withInput()->withErrors('Authentication failed');
        }

        $request->session()->regenerate();
        session()->flash('success', 'Login successful!');
        return to_route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('success', 'Logout successful!');
        return to_route('home');
    }
}
