{{-- @extends('layout') --}}

{{-- @section('content') --}}

<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 sm: mx-4">
        @auth
            @if (count($surveys) > 1)
                @foreach ($surveys as $survey)
                    <x-survey-card :survey='$survey' />
                @endforeach
            @elseif (count($surveys) == 1)
                <x-survey-card :survey='$surveys' />
            @else
                <p> Nem található kérdőív </p>
            @endunless
        @else
            <x-survey-card :survey='$surveys' />
        @endauth
</div>
</x-layout>
{{-- @endsection --}}
