<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    // Összes kérdőív mutatása
    public function index(){
        if (Auth::check()) {
            return view('surveys.index', [
                'surveys' => Survey::latest()->filter(request(['search']))->paginate(6) 
                //paginate()->lastItem() regisztrálatlan felhasználóknak
            ]);
        }else {
            return view('surveys.index', [
                'surveys' => Survey::latest()->first()
            ]);
        }  
    }

    // Egy kérdőív mutatása
    public function show(Survey $survey){
        return view('surveys.show', [
            'survey' => $survey
        ]);
    }

    // Kérdőív létrehozása form mutatása
    public function create(){
        return view('surveys.create');
    }
}
