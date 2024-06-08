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
                <input type="radio" id="packages" name="type_trips" value="packages" wire:model.live="type_trips">
                <label for="packages">Paquetes</label>
            </div>

            <div>
                <input type="radio" id="mayantrains" name="type_trips" value="mayantrains"
                    wire:model.live="type_trips">
                <label for="mayantrains">Tren Maya</label>
            </div>
            <div>
                <input type="radio" id="travelpackages" name="type_trips" value="travelpackages"
                    wire:model.live="type_trips">
                <label for="travelpackages">Paque viajes</label>
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
                    @foreach ($saledeliveries as $saledelivery)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saledelivery->uuid }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saledelivery->customer_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $saledelivery->customer_email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a class="text-blue-500 cursor-pointer underline modal-link"
                                    data-details="{{ $saledelivery->uuid }} - {{ $saledelivery->customer_name }} - {{ $saledelivery->customer_email }}">
                                    <i class="fa-regular fa-eye text-green-400 font-extrabold"></i> Ver detalles
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="mt-3">
            {{ $saledeliveries->links() }}
        </div>

        <!-- Modal -->
        

    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-content"></p>
        </div>
    </div>
</div>
