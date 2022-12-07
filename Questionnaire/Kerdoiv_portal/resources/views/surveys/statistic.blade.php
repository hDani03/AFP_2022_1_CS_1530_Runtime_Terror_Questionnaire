<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Vissza
    </a>

    @php
        $questions = App\Http\Controllers\SurveyController::getQuestions($survey);
        $answers = App\Http\Controllers\SurveyController::getAnswers($survey);
        $allQuestionId = App\Http\Controllers\SurveyController::getAllQuestions($survey);
        $allAnswers = App\Http\Controllers\SurveyController::getAllAnswers($survey);
        
    @endphp

    <div class="mx-4">
        <x-card class="p-24">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('images/clipboard.png') }}" alt="" />
                <h1 class="text-4xl mb-2 font-bold"> {{ $survey->cim }} </h1>
                <p class="text-xl mb-4"> {{ $survey->rovid_leiras }} </p>
            </div>

            <div id="show_question">
                <div class="sm:grid-cols-10  xs:row grid grid-cols-3 gap-4">
                    @for ($i = 0; $i < count($questions); $i++)
                        <div class="col-md-4 mb-3 col-start-1 col-span-8 mt-10">
                            <p class="text-lg mb-2 font-bold"> {{ $questions[$i]->kerdes }} </p>
                        </div>

                        <div class="xs:col-start-1 sm:col-md-3 mb-3 col-start-1 col-span-5">
                            <label for="answer1" class="text-lg mb-2" id="question_counter">
                                {{ $answers[$i]->valasz1 }}
                            </label>
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                    style="width: {{$allAnswers[$i*4]}}%"> {{$allAnswers[$i*4]}}%
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-start-6 xs:col-md-3 mb-3 col-start-1 col-span-5 ">
                            <label for="answer2" class="text-lg mb-2" id="question_counter">
                                {{ $answers[$i]->valasz2 }}
                            </label>
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                    style="width: {{$allAnswers[$i*4+1]}}%"> {{$allAnswers[$i*4+1]}}%
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-md-3 mb-3 col-start-1 col-span-5">
                            <label for="answer3" class="text-lg mb-2" id="question_counter">
                                {{ $answers[$i]->valasz3 }}
                            </label>
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                    style="width: {{$allAnswers[$i*4+2]}}%"> {{$allAnswers[$i*4+2]}}%
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-start-6 xs:col-md-3 mb-3 col-start-1 col-span-5">
                            <label for="answer3" class="text-lg mb-2" id="question_counter">
                                {{ $answers[$i]->valasz4 }}
                            </label>
                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                    style="width: {{$allAnswers[$i*4+3]}}%"> {{$allAnswers[$i*4+3]}}%
                                </div>
                            </div>
                        </div>



                    @endfor


                </div>
            </div>

        </x-card>
    </div>

</x-layout>
