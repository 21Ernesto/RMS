<div class="container mx-auto">
    <div x-data="{ showModal: false, modalData: {} }">
        <!-- Modal -->
        <div x-show="showModal" class=" z-10 inset-0 flex items-center justify-center" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div
                class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-2xl sm:w-full">
                <!-- Modal content -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mt-3 text-start sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg text-center leading-6 font-bold text-gray-900 mb-2" id="modal-headline">
                                Detalle de la venta
                            </h3>
                            <div class="p-4 bg-white border rounded-lg shadow-lg">
                                <div class="mb-2">
                                    <p class="text-sm text-gray-600"><span class="font-bold">Código:</span> <span
                                            x-text="modalData.uuid"></span></p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Nombre del Viaje:</span>
                                        <span x-text="modalData.trip_name"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Nombre del Hotel:</span>
                                        <span x-text="modalData.hotel_name"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Fecha de Inicio:</span>
                                        <span x-text="modalData.datestart"></span>
                                    </p>

                                    <!-- Cantidad Simple -->
                                    <template x-if="modalData.quantity_simple > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600"><span class="font-bold">Cantidad
                                                    Simple:</span>
                                                <span x-text="modalData.quantity_simple"></span>
                                            </p>
                                            <p class="text-sm text-gray-600"><span class="font-bold">Precio Cliente
                                                    Simple:</span> $<span x-text="modalData.client_simple"></span></p>
                                        </div>
                                    </template>

                                    <!-- Cantidad Doble -->
                                    <template x-if="modalData.quantity_double > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">Cantidad Doble:</span>
                                                <span x-text="modalData.quantity_double"></span>
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold">Precio Cliente Doble:</span> $<span
                                                    x-text="modalData.client_double"></span>
                                            </p>
                                        </div>
                                    </template>

                                    <!-- Cantidad Triple -->
                                    <template x-if="modalData.quantity_triple > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600"><span class="font-bold">Cantidad
                                                    Triple:</span>
                                                <span x-text="modalData.quantity_triple"></span>
                                            </p>
                                            <p class="text-sm text-gray-600"><span class="font-bold">Precio Cliente
                                                    Triple:</span> $<span x-text="modalData.client_triple"></span></p>
                                        </div>
                                    </template>

                                    <!-- Cantidad Cuádruple -->
                                    <template x-if="modalData.quantity_quadruple > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600"><span class="font-bold">Cantidad
                                                    Cuádruple:</span> <span
                                                    x-text="modalData.quantity_quadruple"></span>
                                            </p>
                                            <p class="text-sm text-gray-600"><span class="font-bold">Precio Cliente
                                                    Cuádruple:</span> $<span x-text="modalData.client_quadruple"></span>
                                            </p>

                                        </div>
                                    </template>

                                    <!-- Cantidad Niños Menores de 10 años -->
                                    <template x-if="modalData.quantity_children_under_10 > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600"><span class="font-bold">Cantidad Niños
                                                    Menores
                                                    de 10 años:</span> <span
                                                    x-text="modalData.quantity_children_under_10"></span></p>
                                            <p class="text-sm text-gray-600"><span class="font-bold">Precio Cliente
                                                    Niños
                                                    Menores de 10 años:</span> $<span
                                                    x-text="modalData.client_children_under_10"></span></p>
                                        </div>
                                    </template>
                                </div>

                                <div class="mb-2">
                                    <p class="text-sm text-gray-600"><span class="font-bold">Nombre del Cliente:</span>
                                        <span x-text="modalData.customer_name"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Correo Electrónico del
                                            Cliente:</span> <span x-text="modalData.customer_email"></span></p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Método de Pago:</span>
                                        <span x-text="modalData.payment_method"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Estado de Pago:</span>
                                        <span x-text="modalData.payment_status"></span>
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <p class="text-sm text-gray-600"><span class="font-bold">Total:</span> $<span
                                            x-text="modalData.total"></span></p>
                                    {{-- <p class="text-sm text-gray-600"><span class="font-bold">Total Real:</span> $<span
                                            x-text="modalData.total_real"></span></p> --}}
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- Botones del modal -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="showModal = false"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Contenido original -->
        <div class="overflow-x-auto rounded-lg mt-6">
            <h1 class="font-bold text-2xl mb-4">Otros</h1>

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
                    <input type="radio" id="todos" name="type_trips" value=""
                        wire:model.live="type_trips">
                    <label for="todos">Todos</label>
                </div>

                <div>
                    <input type="radio" id="packages" name="type_trips" value="packages"
                        wire:model.live="type_trips">
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
                                Código
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Correo electrónico
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
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
                                    <button
                                        @click="showModal = true; modalData = {
                                    uuid: '{{ $saledelivery->uuid }}',
                                    trip_name: '{{ $saledelivery->trip_name }}',
                                    hotel_name: '{{ $saledelivery->hotel_name }}',
                                    quantity_simple: '{{ $saledelivery->quantity_simple }}',
                                    quantity_double: '{{ $saledelivery->quantity_double }}',
                                    quantity_triple: '{{ $saledelivery->quantity_triple }}',
                                    quantity_quadruple: '{{ $saledelivery->quantity_quadruple }}',
                                    quantity_children_under_10: '{{ $saledelivery->quantity_children_under_10 }}',
                                    datestart: '{{ $saledelivery->datestart }}',
                                    type_trips: '{{ $saledelivery->type_trips }}',
                                    currency: '{{ $saledelivery->currency }}',
                                    customer_name: '{{ $saledelivery->customer_name }}',
                                    customer_email: '{{ $saledelivery->customer_email }}',
                                    payment_method: '{{ $saledelivery->payment_method }}',
                                    payment_status: '{{ $saledelivery->payment_status }}',
                                    provider_simple: '{{ $saledelivery->provider_simple }}',
                                    provider_double: '{{ $saledelivery->provider_double }}',
                                    provider_triple: '{{ $saledelivery->provider_triple }}',
                                    provider_quadruple: '{{ $saledelivery->provider_quadruple }}',
                                    provider_children_under_10: '{{ $saledelivery->provider_children_under_10 }}',
                                    client_simple: '{{ $saledelivery->client_simple }}',
                                    client_double: '{{ $saledelivery->client_double }}',
                                    client_triple: '{{ $saledelivery->client_triple }}',
                                    client_quadruple: '{{ $saledelivery->client_quadruple }}',
                                    client_children_under_10: '{{ $saledelivery->client_children_under_10 }}',
                                    total: '{{ $saledelivery->total }}',
                                    total_real: '{{ $saledelivery->total_real }}'
                                }"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Ver detalles
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <!-- Paginación u otros elementos al final -->
                {{ $saledeliveries->links() }}
            </div>
        </div>
    </div>
</div>
