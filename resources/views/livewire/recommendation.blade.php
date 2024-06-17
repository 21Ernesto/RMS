<section>
    <h1 class="text-lg font-bold">Recomendaciones</h1>

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit="save">
                <div class="mt-3">
                    <textarea wire:model="description" id="description"
                        class="editor block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>

                    @error('description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <input type="hidden" wire:model="trip_id">
                    @error('trip_id')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end mt-2">
                    <button type="submit"
                        class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ $editId ? 'Actualizar' : 'Crear' }}
                    </button>
                    @if ($editId)
                        <button type="button" wire:click="cancelEdit"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    @endif
                </div>
            </form>
        </div>
    </article>

    <article class="card mt-4">
        <div class="card-body">
            @foreach ($recommendations as $recommendation)
                <div class="border-b border-gray-200 mb-2 pb-2">
                    <p class="text-xs">{!! Str::limit($recommendation->description, 100) !!}</p>
                    <button wire:click="edit({{ $recommendation->id }})" title="Editar {{ $recommendation->name }}"
                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="recommendations({{ $recommendation->id }})" title="Eliminar {{ $recommendation->name }}"
                        class="text-red-600 hover:text-red-900 mr-4">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </article>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function recommendations(id) {
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