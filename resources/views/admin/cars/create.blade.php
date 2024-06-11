<x-admin-layout>
    @section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Cargar imagen</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
            <input type="file" name="image" id="image" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex justify-end">
            <button type="submit"
            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Crear</button>
        </div>
    </form>
</div>
</x-admin-layout>