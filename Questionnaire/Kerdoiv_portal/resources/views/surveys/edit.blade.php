<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Kérdőív szerkesztése
            </h2>
            <p class="mb-4">Szerkesztés: {{ $survey->cim }}</p>
        </header>
        <form method="POST" action="/surveys/{{ $survey->survey_id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{--Cím--}}
            <div class="mb-6">
                <label for="cim" class="inline-block text-lg mb-2"> Kérdőív címe </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="cim"
                    value="{{ $survey->cim }}" />
                @error('cim')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{--Leírás--}}
            <div class="mb-6">
                <label for="leiras" class="inline-block text-lg mb-2"> Kérdőív leírása </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="leiras"
                    value="{{ $survey->rovid_leiras }}" />
                @error('leiras')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{--Kérdés--}}
            <div class="mb-6">
                <label for="kerdes" class="inline-block text-lg mb-2"> Kérdés </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="kerdes"
                    value="{{ $survey->kerdes }}" />
                @error('kerdes')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{--Válaszok--}}
            <div class="mb-6">
                <label for="valasz1" class="inline-block text-lg mb-2"> 1. Válasz </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="valasz1"
                    value="{{ $survey->valasz1 }}" />
                @error('valasz1')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="valasz2" class="inline-block text-lg mb-2"> 2. Válasz </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="valasz2"
                    value="{{ $survey->valasz2 }}" />
                @error('valasz2')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="valasz3" class="inline-block text-lg mb-2"> 3. Válasz </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="valasz3"
                    value="{{ $survey->valasz3 }}" />
                @error('valasz3')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="valasz4" class="inline-block text-lg mb-2"> 4. Válasz </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="valasz4"
                    value="{{ $survey->valasz4 }}" />
                @error('lvalsz4')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <button class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black">
                    Frissítés
                </button>

                <a href="/surveys/manage" class="text-black ml-4"> Vissza </a>
            </div>
        </form>
    </x-card>
</x-layout>
