{{-- @extends('layout') --}}

{{-- @section('content') --}}

<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 sm: mx-4">
        @auth
            @if (count($surveys) >= 1)
                @foreach ($surveys as $survey)
                    <x-survey-card :survey='$survey' />
                @endforeach
            @else
            <div class="mt-28 p-12align-middle flex flex-col items-center justify-center text-center">
                <p class="align-middle align-center text-xl font-bold text-cyan-600 animate-bounce">Nem található kérdőív</p>
            </div>
            @endunless
        @else
            <x-survey-card :survey='$surveys' />
        @endauth

</div>
</x-layout>
{{-- @endsection --}}
