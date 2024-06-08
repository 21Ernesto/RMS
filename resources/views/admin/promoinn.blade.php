<x-admin-layout :trip="$trip">
    <h1 class="font-bold text-2xl">Hotel de: <span class="font-extralight">{{ $trip->name }}</span></h1>

    <div class="mt-7">
        @livewire('promo-inn', ['trip' => $trip], key('promo-inn' . $trip->id))
    </div>

</x-admin-layout>
