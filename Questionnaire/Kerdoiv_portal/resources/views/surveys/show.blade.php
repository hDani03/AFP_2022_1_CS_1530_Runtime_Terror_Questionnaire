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


            <form method="POST" action=""
                class="bg-gray-50 border border-gray-200 p-10 rounded max-w-3xl mx-auto mt-5">

                <div class="row grid grid-cols-10 gap-4">

                    <div class="col-md-4 mb-3 col-start-2 col-span-8">
                        <h2 class="justify-center font-bold text-3xl"> 1. Kérdés </h2>
                        <p class="justify-center font-bold text-2xl pt-5"> Mi a kedvenc színem? </p>
                    </div>

                    <div class="col-md-3 mb-3 col-start-1 col-span-5">
                        <div class="flex items-center">
                            <input id="answer_option_1" name="answers" type="radio" value=""
                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked="">
                            <label for="option_1" class="text-lg font-medium text-gray-900 ml-2 block">
                                Igen
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 col-start-6 col-span-5">
                        <div class="flex items-center">
                            <input id="answer_option_2" name="answers" type="radio" value=""
                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked="">
                            <label for="option_2" class="text-lg font-medium text-gray-900 ml-2 block">
                                Nem
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 col-start-1 col-span-5">
                        <div class="flex items-center">
                            <input id="answer_option_3" name="answers" type="radio" value=""
                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked="">
                            <label for="option_3" class="text-lg font-medium text-gray-900 ml-2 block">
                                Villamos
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 col-start-6 col-span-5">
                        <div class="flex items-center">
                            <input id="answer_option_4" name="answers" type="radio" value=""
                                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" checked="">
                            <label for="option_4" class="text-lg font-medium text-gray-900 ml-2 block">
                                Kecske
                            </label>
                        </div>
                    </div>

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