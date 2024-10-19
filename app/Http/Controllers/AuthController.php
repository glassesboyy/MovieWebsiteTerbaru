<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showRegister()
    {
        return view('register');
    }
    function submitRegister(Request $request)
    {
        $user = New User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // dd ($user);
        return redirect()->route('login');

    }

    function showLogin()
    {
        return view('login');
    }

    function submitLogin(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('home'); // Ini sudah benar karena sesuai dengan route yang ada
        } else {
            return back()->withErrors([
                'message' => 'email atau password yang anda masukkan salah!',
            ]);
        }
    }
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}