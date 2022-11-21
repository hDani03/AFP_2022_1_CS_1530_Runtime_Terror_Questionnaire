@props(['survey'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/clipboard.png') }}" alt="" />
        <div>
            <h2 class="text-2xl font-bold">
                <a href="/surveys/{{ $survey->survey_id }}"> {{ $survey->cim }} </a>
            </h2>
            <div class="text-xl mb-4"> {{ $survey->rovid_leiras }} </div>
        </div>
    </div>
</x-card>
