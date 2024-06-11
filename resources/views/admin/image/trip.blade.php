<x-admin-layout>
    <h1 class="font-bold text-xl">{{ $trip->name }}</h1>

    <form action="{{ route('updateImagetrip', $trip) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mt-5">
            <label for="front_page" class="block text-sm font-medium text-gray-700">Portada:</label>
            <input type="file" name="front_page" id="front_page"
                class="mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
            @error('front_page')
                <span class="text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-5 mb-5">
            <label for="banner" class="block text-sm font-medium text-gray-700">Banner:</label>
            <input type="file" name="banner" id="banner"
                class="mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
            @error('banner')
                <span class="text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear</button>

    </form>


    <div class="mt-7">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label for="">Portada:</label>
                <img class="h-80" src="{{ asset($trip->front_page) }}" class="rounded" alt="">
            </div>
            <div>
                <label for="">Banner:</label>
                <img class="h-80" src="{{ asset($trip->banner) }}" class="rounded" alt="">
            </div>
        </div>

    </div>
</x-admin-layout>
