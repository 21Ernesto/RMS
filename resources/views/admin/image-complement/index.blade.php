<x-admin-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Galería de complementos</h1>

        {{-- <a href="{{ route('images.create', $trip) }}"
            class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear</a> --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5">
            @foreach ($images as $image)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="{{ asset($image->image) }}" alt="Car Image" class="w-full h-48 object-cover mb-4 rounded">
                    <div class="flex justify-between">
                        <a href="{{ route('cars.edit', $image->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                        <form action="{{ route('cars.destroy', $image->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>