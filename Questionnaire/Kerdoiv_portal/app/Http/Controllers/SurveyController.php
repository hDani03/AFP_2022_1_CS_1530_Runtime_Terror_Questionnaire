<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Psy\Command\WhereamiCommand;
use Symfony\Component\Console\Question\Question;

class SurveyController extends Controller
{
    // Összes kérdőív mutatása
    public function index()
    {
        if (Auth::check()) {
            return view('surveys.index', [
                'surveys' => Survey::latest()->filter(request(['search']))->paginate()
            ]);
        } else {
            return view('surveys.index', [
                'surveys' => Survey::latest()->first()
            ]);
        }
    }

    public static function getSurveyId(Survey $survey)
    {
        $questionList = DB::table('surveys')
            ->select('id')
            ->where('survey_id', $survey['id'])
            ->get();

        return $questionList;
    }
    public static function getQuestionId(Survey $survey)
    {
        $questionList = DB::table('questions')
            ->select('id')
            ->where('survey_id', $survey['id'])
            ->get();

        return $questionList;
    }

    public static function getQuestions(Survey $survey)
    {
        $questionList = DB::table('questions')
            ->select('kerdes')
            ->where('survey_id', $survey['id'])
            ->get();

        return $questionList;
    }

    public static function getAnswers(Survey $survey)
    {
        $answerList = DB::table('answers')
            ->select('valasz1', 'valasz2', 'valasz3', 'valasz4')
            ->where('survey_id', $survey['id'])
            ->get();


        return $answerList;
    }

    public static function getAllQuestions(Survey $survey)
    {
        $allQuestionsList = DB::table('completed_questions')
            ->select('question_id')
            ->distinct()
            ->where('survey_id', $survey['id'])
            ->get();

        return $allQuestionsList;
    }

    public static function getAllAnswers(Survey $survey)
    {
        $allAnswersList = array();
        $allQuestionsList = DB::table('completed_questions')
            ->select('question_id')
            ->distinct()
            ->where('survey_id', $survey['id'])
            ->get();

        $allAnswers = DB::table('completed_questions')
                ->select('answer')
                ->where('survey_id', '=', $survey['id'])
                ->count();

        foreach ($allQuestionsList as $question) {
            array_push(
                $allAnswersList,
                (round(DB::table('completed_questions')
                    ->select('answer')
                    ->where('survey_id', '=', $survey['id'])
                    ->where('question_id', '=', $question->question_id)
                    ->where('answer', '=', 1)
                    ->count() / $allAnswers * count($allQuestionsList),2)*100),

                (round(DB::table('completed_questions')
                    ->select('answer')
                    ->where('survey_id', '=', $survey['id'])
                    ->where('question_id', '=', $question->question_id)
                    ->where('answer', '=', 2)
                    ->count()/$allAnswers * count($allQuestionsList),2)*100),

                (round(DB::table('completed_questions')
                    ->select('answer')
                    ->where('survey_id', '=', $survey['id'])
                    ->where('question_id', '=', $question->question_id)
                    ->where('answer', '=', 3)
                    ->count()/$allAnswers* count($allQuestionsList),2)*100),

                (round(DB::table('completed_questions')
                    ->select('answer')
                    ->where('survey_id', '=', $survey['id'])
                    ->where('question_id', '=', $question->question_id)
                    ->where('answer', '=', 4)
                    ->count()/$allAnswers* count($allQuestionsList),2)*100)
            );
        }


        return $allAnswersList;
    }

    public function complete(Request $request)
    {
        $data = $request->except('_token');
        $requestKeys = collect($request->except('_token'))->keys();
        $end = 0;

        for ($i = 0; $i < $request['count']; $i++) {
            $formFields = array(
                $request['survey_id']
            );
            $j = $end;
            array_push($formFields, $request[$requestKeys[$j]]);
            array_push($formFields, $request[$requestKeys[$j + 1]]);
            $j = $j + 2;
            $end = $j;
            DB::table('completed_questions')->insert(
                array(
                    'survey_id' => $formFields[0],
                    'answer' => $formFields[1],
                    'question_id' => $formFields[2]
                )
            );
        }




        if (true) {
            return redirect('/')->with('message', 'Sikeres kitöltés.');
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

        return redirect('/')->with('message', 'A kérdőív sikeresen létrehozva!');
    }

    // Egy kérdőív mutatása
    public function show(Survey $survey)
    {
        return view('surveys.show', [
            'survey' => $survey
        ]);
    }


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


        $questionsGet = DB::table('questions')
            ->select('id', 'kerdes')
            ->where('survey_id', $survey['id'])
            ->get();


        $answersGet = DB::table('answers')
            ->select('id', 'valasz1', 'valasz2', 'valasz3', 'valasz4')
            ->where('survey_id', $survey['id'])
            ->get();



        $surveyEdit = array($survey['id'], $survey['user_id'], $survey['cim'], $survey['rovid_leiras'], $questionsGet, $answersGet);

        return view('surveys.edit', ['survey' => $surveyEdit]);
    }

    public function update(Request $request, Survey $survey)
    {
        $questionsGet = DB::table('questions')
            ->select('id', 'kerdes')
            ->where('survey_id', $survey['id'])
            ->get();

        $answersGet = DB::table('answers')
            ->select('id', 'valasz1', 'valasz2', 'valasz3', 'valasz4')
            ->where('survey_id', $survey['id'])
            ->get();

        $surveyEdit = array($survey['id'], $survey['user_id'], $survey['cim'], $survey['rovid_leiras'], $questionsGet, $answersGet);
        $survey = $surveyEdit;
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

        DB::table('surveys')
            ->where('survey_id', $survey[0])
            ->update(
                [
                    'cim' =>  $formFields['cim'],
                    'rovid_leiras' => $formFields['leiras'],
                    'updated_at' => $dt
                ]
            );


        for ($i = 0; $i < count($survey[4]); $i++) {
            DB::table('questions')
                ->where('id', $survey[4][$i]->id)
                ->update([
                    'kerdes' => $request->kerdes[$i],
                    'updated_at' => $dt
                ]);
            //Answers tábla
            DB::table('answers')
                ->where('question_id', $survey[4][$i]->id)
                ->update([
                    'valasz1' => $request->valasz1[$i],
                    'valasz2' => $request->valasz2[$i],
                    'valasz3' => $request->valasz3[$i],
                    'valasz4' => $request->valasz4[$i],
                    'updated_at' => $dt
                ]);
        }

        return back()->with('message', 'A kérdőív sikeresen módosítva');
    }

    public function destroy(Survey $survey)
    {

        if ($survey->user_id != auth()->id()) {
            abort('403', 'Unauthorized action');
        }

        $survey->delete();
        return redirect('/')->with('message', 'A kérdőív sikeresen törölve');
    }
}
