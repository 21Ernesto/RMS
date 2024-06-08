<div>
    <div x-data="{ open: false }">
        <div class="flex justify-end mb-3">
            <button class="bg-blue-400 px-2 py-1 rounded text-white font-bold" @click="open = true">Crear nuevo</button>
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
                            <label for="hotel_name" class="block text-xs font-semibold text-gray-700">Nombre del
                                Hotel:</label>
                            <input type="text" wire:model="hotel_name" id="hotel_name" placeholder="Nombre del Hotel"
                                class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('hotel_name')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="duration_days_nights" class="block text-xs font-semibold text-gray-700">Duración
                                (Días/Noches):</label>
                            <input type="number" wire:model="duration_days_nights" id="duration_days_nights"
                                placeholder="Duración"
                                class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('duration_days_nights')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="city" class="block text-xs font-semibold text-gray-700">Ciudad:</label>
                            <input type="text" wire:model="city" id="city" placeholder="Ciudad"
                                class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('city')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="stars" class="block text-xs font-semibold text-gray-700">Estrellas:</label>
                            <input type="number" wire:model="stars" id="stars" placeholder="Estrellas"
                                class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('stars')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Temporadas bajas y altas precios --}}

                        <div>
                            <h1 class="font-bold text-xl mb-3">Precios</h1>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="adult_price_client"
                                        class="block text-xs font-semibold text-gray-700">Precio Adulto Cliente:</label>
                                    <input type="number" step="0.1" wire:model="adult_price_client"
                                        id="adult_price_client" placeholder="Precio Adulto Cliente"
                                        class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('adult_price_client')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="child_price_client"
                                        class="block text-xs font-semibold text-gray-700">Precio Niño Cliente:</label>
                                    <input type="number" step="0.1" wire:model="child_price_client"
                                        id="child_price_client" placeholder="Precio Niño Cliente"
                                        class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('child_price_client')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <h1 class="font-bold text-xl mb-3">Precios proveedor</h1>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="adult_price_provider"
                                        class="block text-xs font-semibold text-gray-700">Precio Adulto
                                        Proveedor:</label>
                                    <input type="number" step="0.1" wire:model="adult_price_provider"
                                        id="adult_price_provider" placeholder="Precio Adulto Proveedor"
                                        class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('adult_price_provider')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="child_price_provider"
                                        class="block text-xs font-semibold text-gray-700">Precio Niño Proveedor:</label>
                                    <input type="number" step="0.1" wire:model="child_price_provider"
                                        id="child_price_provider" placeholder="Precio Niño Proveedor"
                                        class="border-gray-300 text-xs rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                    @error('child_price_provider')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end p-4 sm:px-6">
                        <button type="submit" wire:loading.class="opacity-50"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $editId ? 'Actualizar' : 'Crear' }}</button>
                        <button type="button" @click="open = false"
                            class="ml-3 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancelar</button>
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
                        @foreach ($promoInns as $promoInn)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-900">{{ $promoInn->hotel_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-xs text-gray-900">{{ $promoInn->city }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-semibold">
                                    <button wire:click="edit({{ $promoInn->id }})" @click="open = true"
                                        title="Editar {{ $promoInn->hotel_name }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        <i class="fas fa-edit text-xl"></i>
                                    </button>
                                    <button wire:click="delete({{ $promoInn->id }})"
                                        title="Eliminar {{ $promoInn->hotel_name }}"
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
                {{ $promoInns->links() }}
            </div>
        </div>
    </div>
</div>
