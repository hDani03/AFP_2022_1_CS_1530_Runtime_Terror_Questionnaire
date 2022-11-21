<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //REGISZTRÁCIÓ

    // Regisztráció/Létrehozás form megjelenítése
    public function create(){
        return view('users.register');
    }

    // Új felhasználó létrehozása
    public function store(Request $request){

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Jelszó hash
        $formFields['password'] = bcrypt($formFields['password']);

        // Felhasználó létrehozása
        $user = User::create($formFields);

        // Bejelentkezés
        auth()->login($user);

        return redirect('/')->with('message', 'Felhasználó létrehozva és bejeletkezve!');
    }

    //BEJELENTKEZÉS

    // Felhasználó kijelentkeztetése
    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Kijelentkezett.');
    }

    // Bejelentkező form megjelenítése
    public function login(){
        return view('users.login');
    }

    // Felhasználó hitelesítése
    public function authenticate(Request $request){

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Sikeres bejelentkezés.');
        }

        return back()->withErrors(['email' => 'Helytelen adatok!'])->onlyInput('email');
    }
}
