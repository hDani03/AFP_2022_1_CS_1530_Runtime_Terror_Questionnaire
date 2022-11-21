<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    // Összes kérdőív mutatása
    public function index(){
        // Lehet nem itt kellene
        // if (Auth::check()) {
        //     return view('surveys.index', [
        //         'surveys' => Survey::latest()->filter(request(['search']))->paginate(6) 
        //         //paginate()->lastItem() regisztrálatlan felhasználóknak
        //     ]);
        // }else {
        //     return view('surveys.index', [
        //         'surveys' => Survey::latest()->filter(request(['search']))->paginate()->lastItem()
        //         //paginate()->lastItem() regisztrálatlan felhasználóknak
        //     ]);
        // }

        return view('surveys.index', [
            'surveys' => Survey::latest()->filter(request(['search']))->paginate(6)
            //paginate()->lastItem() regisztrálatlan felhasználóknak
        ]);
        
    }

    // Egy kérdőív mutatása
    public function show(Survey $survey){
        return view('surveys.show', [
            'survey' => $survey
        ]);
    }
}
