<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($kerdoivek) == 0)
            @foreach ($kerdoivek as $kerdoiv)
                <x-kerdoiv-card :kerdoiv="$kerdoiv" />
            @endforeach
        @else
            <p> Nem található kérdőív </p>
        @endunless

    </div>

    <div class="mt-6 p-5">
        {{ $kerdoivek->links() }}
    </div>

</x-layout>
