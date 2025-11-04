<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }
    
    public function login(Request $request) {
        $validated = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string'
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'view' => route('competitions.index')
            ]);
        }
    }
    
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'view' => route('show.login') 
        ]);
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email'=> 'required|email|unique:users|max:120',
            'nationality' => 'required|string|max:100',
            'phone_number' => [
                'required',
                'string',
                'regex:/^(?:\+36|06)(?:20|30|31|50|70|1)\d{7}$/'
            ],
            'address' => 'required|string',
            // Minimum 8 karakter, 1 nagy, 1 kisbetű, 1 szám
            'password' => [
                'required',
                'string',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9]{8,}$/',
                'confirmed'
            ],

        ]);

        $user = User::create($validated);

        Auth::login($user);
        
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'view' => route('competitions.index'),
        ]);

    }

}

