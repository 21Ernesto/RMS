<div class="container mx-auto">
    <div x-data="{ showModal: false, modalData: {} }">
        <!-- Modal -->
        <div x-show="showModal"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-200 bg-opacity-100 transition-opacity" aria-hidden="true"></div>

            <!-- Modal panel -->
            <div
                class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-3lg sm:w-full">
                <!-- Modal content -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mt-3 text-start sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg font-bold text-center leading-6 text-gray-900 mb-2" id="modal-headline">
                                Detalle de la venta
                            </h3>
                            <!-- Contenido dinámico del modal -->
                            <div class="p-4 bg-white border rounded-lg shadow-lg">
                                <div class="mb-2">
                                    <p class="text-sm text-gray-600"><span class="font-bold">Código:</span> <span
                                            x-text="modalData.uuid"></span></p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Tipo:</span> <span
                                            x-text="modalData.type_trips"></span></p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Cliente:</span> <span
                                            x-text="modalData.customer_name"></span></p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Correo Electrónico:</span>
                                        <span x-text="modalData.customer_email"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Nombre del Viaje:</span>
                                        <span x-text="modalData.trip_name"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Nombre del Hotel:</span>
                                        <span x-text="modalData.hotel_name"></span>
                                    </p>
                                    <p class="text-sm text-gray-600"><span class="font-bold">Fecha de Inicio:</span>
                                        <span x-text="modalData.datestart"></span>
                                    </p>

                                    <!-- Precio Adulto Cliente -->
                                    <template x-if="modalData.quantity_adult > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600"><span class="font-bold">Cantidad de
                                                    Adultos:</span> <span x-text="modalData.quantity_adult"></span></p>
                                            <p class="text-sm text-gray-600"><span class="font-bold">Precio Adulto
                                                    Cliente:</span> $<span x-text="modalData.adult_price_client"></span>
                                            </p>
                                        </div>
                                    </template>

                                    <!-- Precio Niño Cliente -->
                                    <template x-if="modalData.quantity_child > 0">
                                        <div class="mt-2 mb-2">
                                            <p class="text-sm text-gray-600"><span class="font-bold">Cantidad de
                                                    Niños:</span> <span x-text="modalData.quantity_child"></span></p>
                                            <p class="text-sm text-gray-600"><span class="font-bold">Precio Niño
                                                    Cliente:</span> $<span x-text="modalData.child_price_client"></span>
                                            </p>
                                        </div>
                                    </template>
                                </div>

                                <div class="mt-4">
                                    <p class="text-sm text-gray-600"><span class="font-bold">Total:</span> $<span
                                            x-text="modalData.total"></span></p>
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
        <div class="overflow-x-auto rounded-lg">
            <h1 class="font-bold text-2xl mb-4">Promociones</h1>

            <div class="mb-3 mt-5 flex items-center gap-4">
                <!-- Filtros y controles de búsqueda -->
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
                    <!-- Totales y estadísticas -->
                    <div>
                        <p><span class="font-bold">Diferencial:</span> ${{ $total_real }}</p>
                    </div>
                    <div>
                        <p><span class="font-bold">Ganancias:</span> ${{ $total }}</p>
                    </div>
                </div>
            </div>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="min-w-full overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-50">
                            <tr>
                                <!-- Encabezados de la tabla -->
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Código
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo
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
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Iterar sobre los datos de venta -->
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button
                                            @click="showModal = true; modalData = {
                                        uuid: '{{ $saleinn->uuid }}',
                                        type_trips: '{{ $saleinn->type_trips }}',
                                        customer_name: '{{ $saleinn->customer_name }}',
                                        customer_email: '{{ $saleinn->customer_email }}',
                                        trip_name: '{{ $saleinn->trip_name }}',
                                        hotel_name: '{{ $saleinn->hotel_name }}',
                                        quantity_child: '{{ $saleinn->quantity_child }}',
                                        quantity_adult: '{{ $saleinn->quantity_adult }}',
                                        datestart: '{{ $saleinn->datestart }}',
                                        payment_method: '{{ $saleinn->payment_method }}',
                                        payment_status: '{{ $saleinn->payment_status }}',
                                        currency: '{{ $saleinn->currency }}',
                                        adult_price_client: '{{ $saleinn->adult_price_client }}',
                                        child_price_client: '{{ $saleinn->child_price_client }}',
                                        adult_price_provider: '{{ $saleinn->adult_price_provider }}',
                                        child_price_provider: '{{ $saleinn->child_price_provider }}',
                                        total: '{{ $saleinn->total }}',
                                        total_real: '{{ $saleinn->total_real }}'
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
            </div>

            <div class="mt-3">
                <!-- Paginación u otros elementos al final -->
                {{ $saleinns->links() }}
            </div>
        </div>
    </div>
</div>
