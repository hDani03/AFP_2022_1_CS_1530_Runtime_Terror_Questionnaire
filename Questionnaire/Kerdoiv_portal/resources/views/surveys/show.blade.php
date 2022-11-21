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

            <div class="my-10" />

            <form method="POST" action="" class="w-full max-w-sm">
                <div class="grid grid-cols-1 divide-y">

                    <h2 class="item-left justify-center font-bold text-2xl"> 1. Kérdés </h2>

                    <div class="flex flex-col items-left justify-center text-center">
                        <div class="flex item-stretch text-xl">

                            <div class="py-4 mr-6"> Válasz 1 </div>
                            <div class="py-4 mr-6"> Válasz 2 </div>
                            <div class="py-4 mr-6"> Válasz 3 </div>
                            <div class="py-4 mr-6"> Válasz 4 </div>

                        </div>
                        <!-- KÉRDÉSEK VÁLASZOK BEJÁRÁSA -->
                    </div>
                </div>
                <button type="submit" class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black">
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
