<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show logint form
    public function login(){
        return view("users.login");
    }
}
