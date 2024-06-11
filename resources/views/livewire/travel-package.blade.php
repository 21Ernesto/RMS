<div>
    <div x-data="{ open: false }">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Lista de paque viajes</h1>
            <div>
                <button class="bg-blue-400 px-2 py-1 rounded text-white font-bold" @click="open = true">Crear
                    nuevo</button>
            </div>
        </div>

        <div x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-4xl mx-auto">
                <form wire:submit.prevent="save" class="mb-4 mt-4">
                    <h1 class="pl-5 text-3xl font-semibold mb-4">Crear nuevo paque viajes</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-5">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                            <input type="text" wire:model="name" id="name" placeholder="Nombre"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('name')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug:</label>
                            <input type="text" wire:model="slug" id="slug" placeholder="Slug"
                                class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('slug')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="day" class="block text-sm font-medium text-gray-700">Día:</label>
                            <input type="text" wire:model="day" id="day" placeholder="1"
                                class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('day')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="outstanding" class="block text-sm font-medium text-gray-700">Destacado:</label>
                            <div class="mt-2 flex items-center">
                                <input type="checkbox" wire:model.defer="outstanding" id="outstanding"
                                    class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 rounded">
                                <label for="outstanding" class="ml-2 block text-sm text-gray-900">Marcar como
                                    destacado</label>
                            </div>
                            @error('outstanding')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label for="first_email" class="block text-sm font-medium text-gray-700">Primero correo
                                electrónico:</label>
                            <input type="email" wire:model="first_email" id="first_email"
                                placeholder="Primero correo electrónico"
                                class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('first_email')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="second_email" class="block text-sm font-medium text-gray-700">Segundo correo
                                electrónico:</label>
                            <input type="email" wire:model="second_email" id="second_email"
                                placeholder="Segundo correo electrónico"
                                class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('second_email')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="px-5">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select wire:model="category_id" id="category_id"
                            class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end p-4 sm:px-6">
                        <button type="submit" wire:loading.class="opacity-50"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $editId ? 'Actualizar' : 'Crear' }}</button>
                        <button type="button" @click="open = false"
                            class="ml-3 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <div class="mb-3 text-end">
                <input wire:model.live="search"
                    class="w-full h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="text" name="search" placeholder="Buscar">
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 bg-white sm:rounded-lg">
                <table class="min-w-full bg-white">
                    <!-- Encabezados de la tabla -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoría</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody class="bg-white">
                        @foreach ($travelpackages as $travelpackage)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $travelpackage->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $travelpackage->category->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('editPhototrip', $travelpackage) }}"
                                        title="Editar {{ $travelpackage->name }}"
                                        class="text-green-600 hover:text-green-900 mr-2">
                                        <i class="fa-regular fa-image text-xl"></i>
                                    </a>
                                    <button wire:click="edit({{ $travelpackage->id }})" @click="open = true"
                                        title="Editar {{ $travelpackage->name }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        <i class="fas fa-edit text-xl"></i>
                                    </button>
                                    <button wire:click="delete({{ $travelpackage->id }})"
                                        title="Eliminar {{ $travelpackage->name }}"
                                        class="mr-3 text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash-alt text-xl"></i>
                                    </button>
                                    <a href="{{ route('paqueviajes.hotel', $travelpackage) }}" title="Crear hotel" class="mr-3 text-green-600 hover:text-green-900">
                                        <i class="fa-solid fa-hotel text-xl"></i>
                                    </a>
                                    <a href="{{ route('paqueviajes.complement', $travelpackage) }}" title="Complementos" class="text-violet-600 hover:text-violet-900">
                                        <i class="fa-solid fa-list text-xl"></i>
                                    </a>
                                    <a href="{{ route('image.index', $friendCombo) }}" title="Complementos" class="text-violet-600 hover:text-violet-900">
                                        <i class="fa-solid fa-photo-film text-xl ml-3"></i>
                                    </a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="mt-3">
                {{ $travelpackages->links() }}
            </div>
        </div>



    </div>
    @push('js')
        <script>
            document.getElementById("name").addEventListener('keyup', slugChange);

            function slugChange() {

                name = document.getElementById("name").value;
                document.getElementById("slug").value = slug(name);

            }

            function slug(str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }
        </script>
    @endpush
</div>
