{{-- @extends('layout') --}}

{{-- @section('content') --}}

<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Vissza
    </a>
    <div class="mx-4">
        <x-card class="p-24">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('images/clipboard.png') }}" alt="" />
                <h1 class="text-4xl mb-2 font-bold"> {{ $survey->cim }} </h1>
            </div>

            @php
                $questions = App\Http\Controllers\SurveyController::getQuestions($survey);
                $answers = App\Http\Controllers\SurveyController::getAnswers($survey);
                $questionId = App\Http\Controllers\SurveyController::getQuestionId($survey);
                $surveyId = App\Http\Controllers\SurveyController::getSurveyId($survey);
            @endphp




                <form method="POST" action="/surveys/complete"
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-3xl mx-auto mt-5">
                @csrf
                <div class="row grid grid-cols-10 gap-4">

                    @for ($i = 0; $i < count($questions); $i++)
                        <div class="col-md-4 mb-3 col-start-1 col-span-10">
                            <p class="justify-center font-bold text-2xl pt-5"> {{ $questions[$i]->kerdes }} </p>
                        </div>
                        <div class="col-md-3 mb-3 col-start-1 col-span-5">
                            <div class="flex items-center">
                                <input id="answer_option_1" name="answers{{ $i }}" type="radio"
                                    value="1" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    checked="">
                                <label for="option_1" class="text-lg font-medium text-gray-900 ml-2 block">
                                    {{ $answers[$i]->valasz1 }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 col-start-6 col-span-5">
                            <div class="flex items-center">
                                <input id="answer_option_2" name="answers{{ $i }}" type="radio"
                                    value="2" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    checked="">
                                <label for="option_2" class="text-lg font-medium text-gray-900 ml-2 block">
                                    {{ $answers[$i]->valasz2 }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 col-start-1 col-span-5">
                            <div class="flex items-center">
                                <input id="answer_option_3" name="answers{{ $i }}" type="radio"
                                    value="3" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    checked="">
                                <label for="option_3" class="text-lg font-medium text-gray-900 ml-2 block">
                                    {{ $answers[$i]->valasz3 }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3 col-start-6 col-span-5">
                            <div class="flex items-center">
                                <input id="answer_option_4" name="answers{{ $i }}" type="radio"
                                    value="4" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                    checked="">
                                <label for="option_4" class="text-lg font-medium text-gray-900 ml-2 block">
                                    {{ $answers[$i]->valasz4 }}
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="question_id{{ $i }}"
                            id="question_id{{ $i }}" value="{{ $questionId[$i]->id }}">
                    @endfor
                    <input type="hidden" name="survey_id" id="survey_id" value="{{ $surveyId[0]->id }}">

                    <input type="hidden" name="count" id="count" value="{{ count($questions) }}">
                </div>
                <button type="submit" class="bg-cyan-600 text-white rounded mt-10 py-2 px-4 mr-5 hover:bg-black">
                    Kérdőív leadása
                </button>



            </form>
            
        </x-card>


    </div>
</x-layout>
{{-- @endsection --}}
