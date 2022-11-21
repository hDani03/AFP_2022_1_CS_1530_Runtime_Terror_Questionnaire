{{-- @extends('layout') --}}

{{-- @section('content') --}}

<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{-- Vagy itt kéne ellenőrizni? --}}
        @auth
            @unless(count($surveys) == 0)
                @foreach ($surveys as $survey)
                    <x-survey-card :survey='$survey' />
                @endforeach
            @else
                <p> Nem található kérdőív </p>
            @endunless
        @else
            @if (count($surveys) != 0)
                <x-survey-card :surveys[0]='$surveys' />
            @else
                <p> Nem található kérdőív </p>
            @endif
        @endauth

    </div>

    <div class="mt-6 p-4">
        {{ $surveys->links() }}
    </div>

</x-layout>
{{-- @endsection --}}
