<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    //Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    //BEJELENTKEZÉS

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
