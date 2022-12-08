@props(['survey'])

<x-card>
    <div class="flex h-36">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/clipboard.png') }}" alt="" />
        <div>
            <h2 class="text-2xl font-bold">
                <a href="/surveys/{{ $survey->survey_id }}"> {{ $survey->cim }} </a>
            </h2>
            <div class="xxs: text-xl mb-3 md:text-xl mb-4"> {{ $survey->rovid_leiras }} </div>

            @auth
                @if (Auth::user()->isAdmin)
                    <div class="xxs: h-24 w-24 md:absolute h-32 w-32">
                        <a href="/surveys/{{ $survey->survey_id }}/statistic">
                            <button
                                class="fa fa-pie-chart bg-cyan-600 text-white rounded py-2 px-4 hover:bg-black relative bottom-0 left-0 h-12 w-12 mt-2"
                                aria-hidden="true">
                            </button>
                        </a>
                    </div>
                @endif
            @endauth


        </div>


    </div>
</x-card>
