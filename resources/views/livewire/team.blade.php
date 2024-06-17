<div>
    <div x-data="{ open: false }">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Lista de equipo</h1>
            <div>
                <button class="bg-blue-400 px-2 py-1 rounded text-white font-bold" @click="open = true">Crear nueva</button>
            </div>
        </div>

        <div x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-3xl mx-auto">
                <form wire:submit.prevent="saveCategory" class="mb-4 mt-4">
                    <h1 class="pl-5 text-3xl font-semibold mb-4">Crear nuevo</h1>
                    
                    <div class="px-5 mb-3">
                        <label for="name">Nombre:</label>
                        <input type="text" wire:model="name" id="name" placeholder="Nombre"
                            class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                        @error('name')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="px-5">
                        <label for="position">Cargo:</label>
                        <input type="text" wire:model.live="position" id="position" placeholder="Cargo"
                            class="mb-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                        @error('position')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    

                    <div class="flex p-4 bg-gray-50 sm:px-6">
                        <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $editId ? 'Actualizar' : 'Crear' }}</button>

                        <button type="button" wire:click="cancelEdit" @click="open = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mx-auto">
            <div class="mb-3 text-end">
                <input wire:model.live="search"
                    class="w-full h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="text" name="search" placeholder="Buscar">
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cargo</th>
                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <div wire:transition>
                        @foreach ($teams as $team)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset($team->image) }}" class="h-20 w-20 rounded" alt="">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $team->position }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-end">
                                    <a href="{{ route('editPhotoTeam', $team) }}"
                                        title="Editar {{ $team->name }}"
                                        class="text-green-600 hover:text-green-900 mr-2">
                                        <i class="fa-regular fa-image text-xl"></i>
                                    </a>
                                    <button wire:click="edit({{ $team->id }})" @click="open = true"
                                        title="Editar {{ $team->name }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="teams({{ $team->id }})" title="Eliminar {{ $team->name }}"
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
                {{ $teams->links() }}
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function teams(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('delete', id);
                        Swal.fire(
                            '¡Eliminado!',
                            'Ha sido eliminado.',
                            'success'
                        )
                    }
                })
            }
        </script>
