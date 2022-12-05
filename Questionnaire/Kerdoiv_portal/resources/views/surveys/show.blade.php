{{-- @extends('layout') --}}

{{-- @section('content') --}}

<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Vissza
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
            @endphp


            <form method="POST" action=""
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-3xl mx-auto mt-5">

                <div class="row grid grid-cols-10 gap-4">



                </div>
                <button type="submit" class="bg-cyan-600 text-white rounded py-2 px-4 mr-5 hover:bg-black">
                    Kérdőív leadása
                </button>

                <button type="submit" class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black">
                    Kitöltés megszakítása
                </button>
            </form>
        </x-card>

        {{-- 
            <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/surveys/{{ $survey->survey_id }}/edit">
                <i class="fa-solid fa-pencil"></i> Módosítás
            </a>

            <form action="/surveys/{{ $survey->survey_id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">
                    <i class="fa-solid fa-trash"></i> Törlés
                </button>

            </form>

        </x-card>
            
            --}}


    </div>
</x-layout>
{{-- @endsection --}}
