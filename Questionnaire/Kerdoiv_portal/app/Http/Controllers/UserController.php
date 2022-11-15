<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Logint form
    public function login(){
        return view("users.login");
    }

    // User autentikációja (regisztrált felhasználók)
    public function authenticate(Request $request){
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
    public function loginasguest(){
        return view("/kerdoivek")->with("message", "Vendégként lépett be.");
    }
}
