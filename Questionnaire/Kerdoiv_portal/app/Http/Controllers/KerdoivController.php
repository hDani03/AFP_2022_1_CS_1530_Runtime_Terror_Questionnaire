<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KerdoivController extends Controller
{
    // Összes kérdőív mutatása
    public function index(){
        return view('kerdoivek.index', [
            'kerdoivek' => Kerdoiv::latest()->filter(request(["tag", "search"]))->paginate(6)
        ]);
    }
}
