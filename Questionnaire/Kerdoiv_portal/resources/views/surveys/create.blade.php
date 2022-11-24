<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-3xl mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Kérdőív létrehozása
            </h2>
        </header>

        <form action="/surveys" method="POST">
            @csrf
            <div class="mb-6">
                <label for="cim" class="inline-block text-lg mb-2"> Kérdőív címe </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="cim"
                    value="{{ old('cim') }}" />
                @error('cim')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="leiras" class="inline-block text-lg mb-2"> Kérdőív rövid leírása </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="leiras"
                    value="{{ old('leiras') }}" />
                @error('leiras')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="container mb-6">
                <div class="kerdes_container pt-7 pb-7">
                    <label for="kerdeshozzaad" class="inline-block text-lg text-2xl mb-2"> Kérdés hozzáadása
                    </label>
                    <button type="button"
                        class="bg-cyan-600 text-white text-2xl rounded py-2 px-6 hover:bg-black float-right fa-solid fa-plus"
                        id="add_question_btn">
                    </button>
                </div>

                {{-- Dinamikus input mezők generálása --}}
                <div class="question_answers_container" id="questions_answers">
                    <div class="kerdes_item pt-7 pb-7">
                        <label for="kerdes" class="inline-block text-lg mb-2"> Kérdés
                            <input class="border border-gray-200 rounded p-2 w-full" type="text"
                                name="kerdes"></input>
                        </label>
                        <button type="button"
                            class="bg-red-600 text-white text-xl rounded py-2 px-6 hover:bg-black float-right mt-5 fa-solid fa-trash"
                            id="remove_question_btn"></button>
                    </div>

                    <label for="valasz1" class="inline-block text-lg mb-2"> 1. válasz
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="valasz1"></input>
                    </label>

                    <label for="valasz2" class="inline-block text-lg mb-2"> 2. válasz
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="valasz2"></input>
                    </label>

                    <label for="valasz3" class="inline-block text-lg mb-2"> 3. válasz
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="valasz3"></input>
                    </label>

                    <label for="valasz4" class="inline-block text-lg mb-2"> 4. válasz
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="valasz4"></input>
                    </label>


                </div>
            </div>

            <div class="mb-6">
                <button class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black">
                    Kérdőív létrehozása
                </button>

                <a href="/" class="text-black ml-4"> Vissza </a>
            </div>
        </form>
    </div>
</x-layout>
