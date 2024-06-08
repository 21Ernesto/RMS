<x-admin-layout>
    {{-- <h1 class="font-bold text-2xl">Hotel de: <span class="font-extralight">{{ $trip->name }}</span></h1> --}}

    <div class="mt-7">
        @livewire('sale-promo', key('sale-promo'))
    </div>

</x-admin-layout>
