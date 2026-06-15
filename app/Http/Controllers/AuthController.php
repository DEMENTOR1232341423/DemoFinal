<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }
    public function showLogin(){
        return view('login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    public function register(Request $request){
        $validated = $request->validate([
            'login' => 'required|min:6|unique:users',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',
            'db' => 'required|date',
            'full_name' => 'required'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = Auth::create($validated);

        
        return redirect()->route('dashboard');
    }
    public function login(Request $request){
        $cr = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($cr)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors('login', 'Неверный логин или пароль!')->onlyInput('login');
    }
}
