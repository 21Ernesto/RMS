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
                <input type="radio" id="tour" name="type_trips" value="tour" wire:model.live="type_trips">
                <label for="tour">Tour</label>
            </div>

            <div>
                <input type="radio" id="combo_amigo" name="type_trips" value="friendscombos"
                    wire:model.live="type_trips">
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
                            Paquete</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Cliente</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Correo electrónico</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
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
                                <div class="text-sm text-gray-900">{{ $saleinn->trip_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saleinn->customer_name }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saleinn->customer_email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button wire:click="selectSaleInn({{ $saleinn->id }})"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-eye text-xl"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="mt-3">
            {{ $saleinns->links() }}
        </div>

        <!-- Modal -->
        @if ($selectedSaleInn)
            <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                <div class="bg-white rounded-lg shadow-lg w-1/3 p-4">
                    <h2 class="text-2xl font-bold mb-4">Detalles de la Venta</h2>

                    <div class="mb-3">
                        <p><strong>FOLIO:</strong> {{ $selectedSaleInn->uuid }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Nombre del Paquete:</strong> {{ $selectedSaleInn->trip_name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Tipo de Viaje:</strong> {{ $selectedSaleInn->type_trips }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Cliente:</strong> {{ $selectedSaleInn->customer_name }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Correo Electrónico:</strong> {{ $selectedSaleInn->customer_email }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Cantidad:</strong> {{ $selectedSaleInn->quantity }}</p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Total:</strong> ${{ $selectedSaleInn->total }}</p>
                    </div>
                    <!-- Agrega más campos según tus necesidades -->

                    <div class="mt-4 flex justify-end">
                        <button wire:click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-lg">Cerrar</button>

                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
