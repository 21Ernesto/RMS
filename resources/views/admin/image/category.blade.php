<x-admin-layout>
    <h1 class="font-bold text-xl">{{ $category->name }}</h1>

    <form action="{{ route('updateImageCategory', $category) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="px-5 mb-3">
            <label for="image">Imagen:</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
            @error('image')
                <span class="text-red-400 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear</button>

    </form>
</x-admin-layout>
