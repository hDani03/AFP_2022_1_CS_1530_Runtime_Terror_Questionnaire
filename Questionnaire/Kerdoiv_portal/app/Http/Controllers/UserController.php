<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //REGISZTRÁCIÓ

    //Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'

        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);
        return redirect('/kerdoivek')->with('message', 'A felhasználó létrehozva, kérjük jelentkezzen be');
    }

    //BEJELENTKEZÉS

    // Felhasználó kijelentkeztetése
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect("/")->with("message", "Sikeres kijelentkezés!");
    }

    // Logint form
    public function login()
    {
        return view("users.login");
    }

    // User autentikációja (regisztrált felhasználók)
    public function authenticate(Request $request)
    {
        $formField = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (auth()->attempt($formField)) {
            $request->session()->regenerate();

            return redirect("/kerdoivek")->with("message", "Sikeres bejelentkezés!");
        }

        return back()->withErrors(["email" => "Érvénytelen adatok"])->onlyInput("email");
    }

    // Belépés vendégként
    public function loginasguest()
    {
        return view("/kerdoivek")->with("message", "Vendégként lépett be.");
    }
}
