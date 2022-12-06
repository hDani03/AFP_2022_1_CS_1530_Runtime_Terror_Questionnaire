<x-layout>

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Vissza
    </a>

    <div class="mx-4">
        <x-card class="p-24">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('images/clipboard.png') }}" alt="" />
                <h1 class="text-4xl mb-2 font-bold"> {{ $survey->cim }} </h1>
                <p class="text-xl mb-4"> {{ $survey->rovid_leiras }} </p>
            </div>

            <div id="show_question">
                <div class="sm:grid-cols-10  xs:row grid grid-cols-3 gap-4">
                    <div class="col-md-4 mb-3 col-start-1 col-span-8">
                        <p class="text-lg mb-2 font-bold"> 1. Kérdés: Kérdés helye </p>
                    </div>


                    <div class="xs:col-start-1 sm:col-md-3 mb-3 col-start-1 col-span-5">
                        <label for="answer1" class="text-lg mb-2" id="question_counter"> 1. Válasz </label>
                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 60%"> 60%
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-start-6 xs:col-md-3 mb-3 col-start-1 col-span-5 ">
                        <label for="answer2" class="text-lg mb-2" id="question_counter"> 2. Válasz </label>
                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 19%"> 19%
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-md-3 mb-3 col-start-1 col-span-5">
                        <label for="answer3" class="text-lg mb-2" id="question_counter"> 3. Válasz </label>
                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 45%"> 45%
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-start-6 xs:col-md-3 mb-3 col-start-1 col-span-5">
                        <label for="answer3" class="text-lg mb-2" id="question_counter"> 4. Válasz </label>
                        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                style="width: 77%"> 77%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </x-card>
    </div>

</x-layout>
