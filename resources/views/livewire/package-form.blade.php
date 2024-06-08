<div>
    <form action="{{ route('payment-package', $trip) }}" method="POST" class="p-4 border rounded border-1 border-lg-2">
        @csrf
        <div>
            <h6 class="page-title">{!! $trip['name'] !!}</h6>
        </div>

        <div>
            <input type="text" name="total" hidden wire:model.live="total">
            <input type="text" name="total_real" hidden wire:model.live="total_real">
        </div>

        <div class="mt-3">
            <span class="text-success fw-bold" wire:loading.remove wire:target="quantity">Total:
                ${{ number_format($total, 2) }} MXN</span>
            <div wire:loading wire:target="quantity">
                <div role="status">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

        <div class="mt-3 form-group">
            <span for="dias"><span class="fw-bold">Duración</span>: {{ $trip['day'] }}</span>
        </div>

        <div class="mt-3 form-group">
            <label for="date_start" class="fw-bold">Fecha de inicio: *</label>
            <input required type="date" class="form-control" id="date_start" name="date_start"
                min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" wire:model="date_start"
                wire:change="calculateTotal">
        </div>

        <div class="mt-3 form-group">
            <label for="hotel" class="fw-bold">Hotel: *</label>
            <select required class="form-control" id="hotel" name="hotel" wire:model.live="selectedHotel"
                wire:change="calculateTotal" style="font-size: 13px;">
                <option style="font-size: 13px;" value="">Seleccione un hotel</option>
                @foreach ($hotels as $hotel)
                    <option style="font-size: 13px;" value="{{ $hotel->id }}">{{ $hotel->hotel_name }} -
                        {{ $hotel->city }} - {{ $hotel->stars }} 🌟</option>
                @endforeach
            </select>
        </div>

        @if ($selectedHotel)
            <div class="mt-3 form-group">
                <div class="row">
                    <h6>Habitaciones</h6>
                    <div class="row">
                        @if ($trip->type_trips == 'mayantrains')
                        @else
                            <div class="col-lg-6">
                                <label for="quantity_simple" style="font-size: 15px; font-weight: 900;">Sencilla:</label>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary"
                                        wire:click="decrease('quantity_simple')">-</button>
                                    <input type="number" class="form-control" id="quantity_simple" name="quantity_simple"
                                        wire:model="quantity_simple" min="0" readonly>
                                    <button type="button" class="btn btn-outline-secondary"
                                        wire:click="increase('quantity_simple')">+</button>
                                </div>
                            </div>
                        @endif


                        <div class="col-lg-6">
                            <label for="quantity_double" style="font-size: 15px; font-weight: 900;">Doble:</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="decrease('quantity_double')">-</button>
                                <input type="number" class="form-control" id="quantity_double" name="quantity_double"
                                    wire:model="quantity_double" min="0" readonly>
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="increase('quantity_double')">+</button>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="quantity_triple" style="font-size: 15px; font-weight: 900;">quantity_triple:</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="decrease('quantity_triple')">-</button>
                                <input type="number" class="form-control" id="quantity_triple" name="quantity_triple"
                                    wire:model="quantity_triple" min="0" readonly>
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="increase('quantity_triple')">+</button>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="quantity_quadruple" style="font-size: 15px; font-weight: 900;">Cuádruple:</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="decrease('quantity_quadruple')">-</button>
                                <input type="number" class="form-control" id="quantity_quadruple" name="quantity_quadruple"
                                    wire:model="quantity_quadruple" min="0" readonly>
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="increase('quantity_quadruple')">+</button>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="quantity_children_under_10" style="font-size: 15px; font-weight: 900;">Niños menores a
                                10 años:</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="decrease('quantity_children_under_10')">-</button>
                                <input type="number" class="form-control" id="quantity_children_under_10"
                                    name="quantity_children_under_10" wire:model="quantity_children_under_10" min="0" readonly>
                                <button type="button" class="btn btn-outline-secondary"
                                    wire:click="increase('quantity_children_under_10')">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <button type="submit" class="mt-4 btn btn-success">
            <i class="fa fa-money"></i> Comprar
        </button>
    </form>
</div>
