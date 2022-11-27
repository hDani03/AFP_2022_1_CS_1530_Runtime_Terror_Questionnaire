<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Question\Question;

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
        $nextSurveyIdStatement  = DB::select("SHOW TABLE STATUS LIKE 'surveys'");
        $nextSurveyId = $nextSurveyIdStatement[0]->Auto_increment;


        $questions = $request['question'];
        $answers = array($request['answer1'], $request['answer2'], $request['answer3'], $request['answer4']);


        $formFields = $request->validate([
            'cim' => 'required',
            'leiras' => 'required',
        ]);


        //Surveys tábla
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


        //Questions és Answers tábla
        $i = 0;
        foreach ($questions as $question) {
            //Questions tábla
            $nextQuestionIdStatement = DB::select("SHOW TABLE STATUS LIKE 'questions'");
            $nextQuestionId = $nextQuestionIdStatement[0]->Auto_increment;
            DB::table('questions')->insert(
                array(
                    'survey_id' => $nextSurveyId,
                    'user_id' => auth()->id(),
                    'kerdes' => $question,
                    'created_at' => $dt,
                    'updated_at' => $dt
                )
            );

            //Answers tábla
            DB::table('answers')->insert(
                array(
                    'survey_id' => $nextSurveyId,
                    'user_id' => auth()->id(),
                    'question_id' => $nextQuestionId,
                    'valasz1' => $answers[0][$i],
                    'valasz2' => $answers[1][$i],
                    'valasz3' => $answers[2][$i],
                    'valasz4' => $answers[3][$i],
                    'created_at' => $dt,
                    'updated_at' => $dt
                )
            );
            $i++;
        }

        //Answers tábla
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
