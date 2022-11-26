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
                    value="{{ old('cim') }}" required />
                @error('cim')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="leiras" class="inline-block text-lg mb-2"> Kérdőív rövid leírása </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="leiras"
                    value="{{ old('leiras') }}" required />
                @error('leiras')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
                @enderror
            </div>

            <div id="show_question">
                <div class="row grid grid-cols-10 gap-4">

                    <div class="col-md-4 mb-3 col-start-2 col-span-8">
                        <label for="question[]" class="text-lg mb-2" id="question_counter"> Kérdés</label>
                        <input type="text" name="question[]" class="border border-gray-200 rounded p-2 w-full"
                            required>
                    </div>

                    <div class="col-md-3 mb-3 col-start-1 col-span-5">
                        <input type="text" name="answer1[]" class="border border-gray-200 rounded p-2 w-full"
                            placeholder="1. válasz" required>
                    </div>

                    <div class="col-md-3 mb-3 col-start-6 col-span-5">
                        <input type="text" name="answer2[]" class="border border-gray-200 rounded p-2 w-full"
                            placeholder="2. válasz" required>
                    </div>

                    <div class="col-md-3 mb-3 col-start-1 col-span-5">
                        <input type="text" name="answer3[]" class="border border-gray-200 rounded p-2 w-full"
                            placeholder="3. válasz" required>
                    </div>

                    <div class="col-md-3 mb-3 col-start-6 col-span-5">
                        <input type="text" name="answer4[]" class="border border-gray-200 rounded p-2 w-full"
                            placeholder="4. válasz" required>
                    </div>

                    <div class="col-md-2 mb-3 d-grid">
                        <button
                            class="btn btn-success bg-cyan-600 text-white text-2xl rounded py-2 px-6 hover:bg-black fa-solid fa-plus add_question_btn"></button>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <button class="bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black" id="store_survey">
                    Kérdőív létrehozása
                </button>

                <a href="/" class="text-black ml-4"> Vissza </a>
            </div>
        </form>
    </div>

</x-layout>
