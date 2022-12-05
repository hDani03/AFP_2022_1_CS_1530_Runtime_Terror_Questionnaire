<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Psy\Command\WhereamiCommand;
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

    public static function getQuestions(Survey $survey){
        $questionList = DB::table('questions')
            ->select('kerdes')
            ->where('survey_id', $survey['id'])
            ->get();

        //dd($questionList);
        return $questionList;
    }

    public static function getAnswers(Survey $survey){
        $answerList = DB::table('answers')
        ->select('valasz1', 'valasz2', 'valasz3', 'valasz4')
        ->where('survey_id', $survey['id'])
        ->get();

        //dd($answerList);
        return $answerList;
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

        return redirect('/')->with('message', 'A kérdőív sikeresen létrehozva!');
    }

    // Egy kérdőív mutatása
    public function show(Survey $survey)
    {
        return view('surveys.show', [
            'survey' => $survey
        ]);
    }

    //Kérdőív módosítása

    // Egy kérdőívhez tartozó statisztikák mutatása
    public function statistic(Survey $survey)
    {
        return view('surveys.statistic', [
            'survey' => $survey
        ]);
    }

    // Kérdőív létrehozása form mutatása
    public function create()
    {
        return view('surveys.create');
    }

    // Kérdőív módosítása form mutatása
    public function manage()
    {
        return view('surveys.manage', ['surveys' => auth()->user()->surveys()->get()]);
    }


    // Kérdőív szerkesztése form mutatása
    public function edit(Survey $survey)
    {

        //dd($survey['id']);

        //dd($surveyEdit[0]);
        //dd(DB::table('questions')->where('survey_id','=', $surveyEdit[0])->get());

        $questionsGet = DB::table('questions')
            ->select('id', 'kerdes')
            ->where('survey_id', $survey['id'])
            ->get();

        //dd($questionsGet);

        $answersGet = DB::table('answers')
            ->select('id', 'valasz1', 'valasz2', 'valasz3', 'valasz4')
            ->where('survey_id', $survey['id'])
            ->get();

        //dd($questionsGet);

        $surveyEdit = array($survey['id'], $survey['user_id'], $survey['cim'], $survey['rovid_leiras'], $questionsGet, $answersGet);
        //dd($surveyEdit);

        return view('surveys.edit', ['survey' => $surveyEdit]);
    }

    public function update(Request $request, Survey $survey)
    {
        dd($survey);
        $questionsGet = DB::table('questions')
            ->select('id', 'kerdes')
            ->where('survey_id', $survey['id'])
            ->get();

        $answersGet = DB::table('answers')
            ->select('id', 'valasz1', 'valasz2', 'valasz3', 'valasz4')
            ->where('survey_id', $survey['id'])
            ->get();

        //dd($questionsGet);
        $surveyEdit = array($survey['id'], $survey['user_id'], $survey['cim'], $survey['rovid_leiras'], $questionsGet, $answersGet);
        $survey = $surveyEdit;
        //dd($survey);
        $dt = new DateTime(now());
        $questions = $survey[4];
        $answers = $survey[5];

        if ($survey[1] != auth()->id()) {
            abort('403', 'Unauthorized action');
        }

        $formFields = $request->validate([
            'cim' => 'required',
            'leiras' => 'required',
        ]);

        //dd($survey);
        DB::table('surveys')
            ->where('survey_id', $survey[0])
            ->update(
                [
                    'cim' =>  $formFields['cim'],
                    'rovid_leiras' => $formFields['leiras'],
                    'updated_at' => $dt
                ]
            );


        for ($i=0; $i < count($survey[4]); $i++) { 
            dd($survey[4][1]->kerdes);
            DB::table('questions')
            ->where('survey_id', $survey[0])
            ->update([
                'kerdes' => $survey[4][$i]->kerdes,
                'updated_at' => $dt
            ]);
        //Answers tábla
        DB::table('answers')
            ->where('survey_id', $survey[0])
            ->update([
                'valasz1' => $survey[5][$i]->valasz1,
                'valasz2' => $survey[5][$i]->valasz2,
                'valasz3' => $survey[5][$i]->valasz3,
                'valasz4' => $survey[5][$i]->valasz4,
                'updated_at' => $dt
            ]);
        }

        return back()->with('message', 'Survey updated successfully!');
    }

        //Delete Listing
        public function destroy(Survey $survey)
        {
            //Make sure logged in user is owner
            if ($survey->user_id != auth()->id()) {
                abort('403', 'Unauthorized action');
            }
    
            $survey->delete();
            return redirect('/')->with('message', 'Survey deleted successfully');
        }
}
