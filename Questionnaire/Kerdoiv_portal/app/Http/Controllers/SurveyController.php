<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    // Összes kérdőív mutatása
    public function index()
    {
        if (Auth::check()) {
            return view('surveys.index', [
                'surveys' => Survey::latest()->filter(request(['search']))->paginate()->withQueryString()
            ]);
        } else {
            return view('surveys.index', [
                'surveys' => Survey::latest()->first()
            ]);
        }
    }

    //A kérdőív adatainak eltárolása
    public function store(Request $request)
    {
        $dt = new DateTime(now());
        $statement  = DB::select("SHOW TABLE STATUS LIKE 'surveys'");
        $nextSurveyId = $statement[0]->Auto_increment;
        $formFields = $request->validate([
            'cim' => 'required',
            'leiras' => 'required',
        ]);
        DB::table('surveys')->insert(
            array(
                'survey_id' => $nextSurveyId,
                'user_id' => auth()->id(), 
                'cim' => $formFields['cim'], 
                'rovid_leiras' => $formFields['leiras'],
                'created_at' => $dt,
                'updated_at' => $dt
                )
        );
        return redirect('/')->with('message', 'A kérdőív sikeresen létrehozva!');
        
    }

    // Egy kérdőív mutatása
    public function show(Survey $survey)
    {
        return view('surveys.show', [
            'survey' => $survey
        ]);
    }

    // Kérdőív létrehozása form mutatása
    public function create()
    {
        return view('surveys.create');
    }
}
