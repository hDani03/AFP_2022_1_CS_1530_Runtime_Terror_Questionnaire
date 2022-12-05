@props(['survey'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/clipboard.png') }}" alt="" />
        <div>
            <h2 class="text-2xl font-bold">
                {{-- dd($survey) --}}
                <a href="/surveys/{{ $survey->survey_id }}"> {{ $survey->cim }} </a>
            </h2>
            <div class="text-xl mb-4"> {{ $survey->rovid_leiras }} </div>

            {{-- Ezt a gombot admin jogkörhöz kötni, ha ő jelentkezett be, neki látszódjon, most csak azt nézem hogy ha valaki bejelentkezik --}}
            @auth
                <div class="absolute h-32 w-32">
                    <a href="/surveys/{{ $survey->survey_id }}/statistic">
                        <button
                            class="fa fa-pie-chart bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black relative bottom-0 left-0 h-12 w-12"
                            aria-hidden="true">
                        </button>
                    </a>
                </div>
            @endauth

        </div>


    </div>
</x-card>
