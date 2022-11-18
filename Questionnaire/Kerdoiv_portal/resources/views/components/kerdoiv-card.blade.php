@props(['kerdoiv'])


<x-card>
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/kerdoivek/{{ $kerdoiv->id }}">{{ $kerdoiv->cim }}</a>
            </h3>
        </div>
    </div>
</x-card>
