<x-admin-layout>
    <h1 class="font-bold text-xl">{{ $trip->name }}</h1>

    <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="trip_id" value="{{ $trip->id }}">

        <div class="mt-5 mb-5">
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen:</label>
            <input type="file" name="image" id="image"
                class="mb-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
            @error('image')
                <span class="text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear</button>

    </form>

    @if (session('success'))
        <div class="text-green-500">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5">
        @foreach ($trip->images as $carGallery)
            <div class="bg-white rounded-lg shadow-md p-4">
                <img src="{{ asset($carGallery->image) }}" alt="Car Image" class="w-full h-48 object-cover mb-4 rounded">
                <div class="flex justify-between">
                    <form action="{{ route('image.destroy', $carGallery->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</x-admin-layout>
