<div>
    <div x-data="{ open: false }">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Lista de menú de navegación</h1>
            <div>
                <button class="bg-blue-400 px-2 py-1 rounded text-white font-bold" @click="open = true">Crear
                    nuevo</button>
            </div>
        </div>

        <div x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <form wire:submit.prevent="saveMenu" class="mb-4 mt-4">
                    <h1 class="pl-5 text-3xl font-semibold mb-4">Crear nuevo menú de navegación</h1>
                    <div class="px-5 mb-3">
                        <label for="name">Nombre:</label>
                        <input type="text" wire:model="name" id="name" placeholder="Nombre"
                            class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                        @error('name')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="px-5">
                        <label for="slug">Slug:</label>
                        <input type="text" wire:model="slug" id="slug" placeholder="Slug"
                            class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                        @error('slug')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="px-5">
                        <label class="inline-flex items-center ml-2">
                            <input type="checkbox" wire:model.defer="status" class="form-checkbox">
                            <span class="ml-2">Activo</span>
                        </label>
                    </div>

                    <div class="flex p-4 bg-gray-50 sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $editMenuId ? 'Actualizar' : 'Crear' }}</button>

                        <button type="button" wire:click="cancelEdit" @click="open = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mx-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado</th>
                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <div wire:transition>
                        @foreach ($menus as $menu)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $menu->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $menu->status ? 'Activo' : 'Inactivo' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-end">
                                    <button wire:click="edit({{ $menu->id }})" @click="open = true"
                                        title="Editar {{ $menu->name }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:click="delete({{ $menu->id }})"
                                        title="Eliminar {{ $menu->name }}"
                                        class="text-red-600 hover:text-red-900 mr-4">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>

            <div class="mt-3">
                {{ $menus->links() }}
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
                $slug = trimmed.replace(/[^a-z  0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }
        </script>
    @endpush
</div>
