<x-admin-layout :trip="$trip">
    <h1 class="font-bold text-2xl">Complemento de: <span class="font-extralight">{{ $trip->name }}</span></h1>

    <div class="mt-7">
        @livewire('itinerary', ['trip' => $trip], key('itinerary' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('message', ['trip' => $trip], key('message' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('includes', ['trip' => $trip], key('includes' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('excluded', ['trip' => $trip], key('excluded' . $trip->id))
    </div>


    <div class="mt-7">
        @livewire('recommendation', ['trip' => $trip], key('recommendation' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('suggestion', ['trip' => $trip], key('suggestion' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('note', ['trip' => $trip], key('note' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('schedule', ['trip' => $trip], key('schedule' . $trip->id))
    </div>


    <div class="mt-7">
        @livewire('high-season-component', ['trip' => $trip], key('high-season-component' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('low-season-component', ['trip' => $trip], key('low-season-component' . $trip->id))
    </div>
    <div class="mt-7">
        @livewire('food-component', ['trip' => $trip], key('food-component' . $trip->id))
    </div>


</x-admin-layout>
