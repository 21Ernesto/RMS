<div>

    <div class="overflow-x-auto rounded-lg">
        <div class="mb-3 flex items-center gap-4">
            <div>
                <label for="">Código:</label>
                <input wire:model.live="search"
                    class="w-auto h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="text" name="search" placeholder="Buscar">
            </div>

            <div>
                <label for="">Fecha inicio:</label>
                <input wire:model.live="datestart" value="{{ $datestart }}"
                    class="w-auto h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="date" name="datestart">
            </div>

            <div>
                <label for="">Fecha fin:</label>
                <input wire:model.live="dateend" value="{{ $dateend }}"
                    class="w-auto h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="date" name="dateend">
            </div>

            <div class="flex justify-end gap-6 w-full">
                <div>
                    <p><span class="font-bold">Diferencial:</span> ${{ $total_real }}</p>
                </div>
                <div>
                    <p><span class="font-bold">Ganancias:</span> ${{ $total }}</p>
                </div>
            </div>
        </div>

        <div class="mb-3 ml-3 flex gap-6">
            <div>
                <input type="radio" id="todos" name="type_trips" value="" wire:model.live="type_trips">
                <label for="todos">Todos</label>
            </div>
        
            <div>
                <input type="radio" id="promotions" name="type_trips" value="promotions" wire:model.live="type_trips">
                <label for="promotions">Promociones</label>
            </div>
        
            <div>
                <input type="radio" id="combo_amigo" name="type_trips" value="friendscombos" wire:model.live="type_trips">
                <label for="combo_amigo">Combo Amigo</label>
            </div>
        </div>
        


        <div class="shadow overflow-hidden border-b border-gray-200 bg-white sm:rounded-lg">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Código</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cliente</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Correo electrónico</th>
                            {{-- <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th> --}}
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($saleinns as $saleinn)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saleinn->uuid }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saleinn->type_trips }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saleinn->customer_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saleinn->customer_email }}</div>
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button wire:click="edit({{ $saleinn->id }})" @click="open = true"
                                    title="Editar {{ $saleinn->name }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-2">
                                    <i class="fas fa-eye text-xl"></i>
                                </button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="mt-3">
            {{ $saleinns->links() }}
        </div>
    </div>

</div>
