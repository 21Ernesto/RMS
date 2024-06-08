<div>
    <div x-data="{ open: false }">
        <div class="flex justify-end mb-3">
            <button class="bg-blue-400 px-2 py-1 rounded text-white font-bold" @click="open = true">Crear
                nuevo</button>
        </div>

        <div x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-4xl mx-auto">
                <form wire:submit.prevent="save" class="mb-4 mt-4">
                    <h1 class="pl-5 text-3xl font-semibold mb-4">
                        {{ $editId ? 'Actualizar hotel' : 'Crear nuevo hotel' }}</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-5">
                        <div>
                            <label for="hotel_name" class="block text-sm font-medium text-gray-700">Nombre del
                                Hotel:</label>
                            <input type="text" wire:model="hotel_name" id="hotel_name" placeholder="Nombre del Hotel"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('hotel_name')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="days_nights"
                                class="block text-sm font-medium text-gray-700">Días/Noches:</label>
                            <input type="number" wire:model="days_nights" id="days_nights" placeholder="Días/Noches"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('days_nights')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Ciudad:</label>
                            <input type="text" wire:model="city" id="city" placeholder="Ciudad"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('city')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="stars" class="block text-sm font-medium text-gray-700">Estrellas:</label>
                            <input type="number" wire:model="stars" id="stars" placeholder="Estrellas"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('stars')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <h1 class="mb-3 font-bold text-xl">Precio proveedor</h1>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="provider_simple" class="block text-sm font-medium text-gray-700">Precio
                                        Simple:</label>
                                    <input type="number" step="0.01" wire:model="provider_simple"
                                        id="provider_simple" placeholder="Precio Simple"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('provider_simple')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="provider_double" class="block text-sm font-medium text-gray-700">Precio

                                        Doble:</label>
                                    <input type="number" step="0.01" wire:model="provider_double"
                                        id="provider_double" placeholder="Precio Doble"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('provider_double')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="provider_triple" class="block text-sm font-medium text-gray-700">Precio

                                        Triple:</label>
                                    <input type="number" step="0.01" wire:model="provider_triple"
                                        id="provider_triple" placeholder="Precio Triple"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('provider_triple')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="provider_quadruple"
                                        class="block text-sm font-medium text-gray-700">Precio

                                        Cuádruple:</label>
                                    <input type="number" step="0.01" wire:model="provider_quadruple"
                                        id="provider_quadruple" placeholder="Precio Cuádruple"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('provider_quadruple')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="provider_children_under_10"
                                        class="block text-sm font-medium text-gray-700">Precio
                                        Niño : </label>
                                    <input type="number" step="0.01" wire:model="provider_children_under_10"
                                        id="provider_children_under_10" placeholder="Precio Niños"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('provider_children_under_10')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <h1 class="mb-3 font-bold text-xl">Precio Cliente</h1>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="client_simple" class="block text-sm font-medium text-gray-700">Precio
                                        Simple:</label>
                                    <input type="number" step="0.01" wire:model="client_simple" id="client_simple"
                                        placeholder="Precio Simple"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('client_simple')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="client_double" class="block text-sm font-medium text-gray-700">Precio
                                        Doble:</label>
                                    <input type="number" step="0.01" wire:model="client_double"
                                        id="client_double" placeholder="Precio Doble"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('client_double')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="client_triple" class="block text-sm font-medium text-gray-700">Precio
                                        Triple:</label>
                                    <input type="number" step="0.01" wire:model="client_triple"
                                        id="client_triple" placeholder="Precio Triple"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('client_triple')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="client_quadruple"
                                        class="block text-sm font-medium text-gray-700">Precio
                                        Cuádruple:</label>
                                    <input type="number" step="0.01" wire:model="client_quadruple"
                                        id="client_quadruple" placeholder="Precio Cuádruple"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('client_quadruple')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="client_children_under_10"
                                        class="block text-sm font-medium text-gray-700">Precio
                                        Niños:</label>
                                    <input type="number" step="0.01" wire:model="client_children_under_10"
                                        id="client_children_under_10" placeholder="Precio Niños"
                                        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('client_children_under_10')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex justify-center mt-6 px-5">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $editId ? 'Actualizar' : 'Crear' }}</button>

                        <button type="button" wire:click="cancelEdit" @click="open = false"
                            class="ml-3 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <div class="mb-3 text-end">
                <input wire:model.live="search"
                    class="w-full h-10 text-xs bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="text" name="search" placeholder="Buscar">
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 bg-white sm:rounded-lg">
                <table class="min-w-full bg-white">
                    <!-- Encabezados de la tabla -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Ciudad</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody class="bg-white">
                        @foreach ($packagedeliveries as $packagedelivery)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-900">{{ $packagedelivery->hotel_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-900">{{ $packagedelivery->city }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-semibold">
                                    <button @click="open = true" wire:click="edit({{ $packagedelivery->id }})"
                                        title="Editar {{ $packagedelivery->name }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        <i class="fas fa-edit text-xl"></i>
                                    </button>
                                    
                                    
                                    <button wire:click="delete({{ $packagedelivery->id }})"
                                        title="Eliminar {{ $packagedelivery->hotel_name }}"
                                        class="mr-3 text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash-alt text-xl"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $packagedeliveries->links() }}
            </div>
        </div>
    </div>

    

</div>
