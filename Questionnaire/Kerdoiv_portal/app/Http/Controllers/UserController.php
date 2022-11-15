<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Logint form
    public function login(){
        return view("users.login");
    }

    // User autentikációja
    public function authenticate(Request $request){
        $formField = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);

        if (auth()->attempt($formField)) {
            $request->session()->regenerate();

            return redirect("/kerdoivek")->with("message", "Sikeres belépés!");
        }

        return back()->withErrors(["email" => "Érvénytelen adatok"])->onlyInput("email");
    }
}
