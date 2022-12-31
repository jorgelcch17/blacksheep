<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span><a href="{{ route('admin.locations') }}">Ubicaciones</a>
                    <span></span> {{ $department->name }}
                    <span></span> {{ $province->name }}
                    <span></span> {{ $city->name }}
                    <span></span> Tipos de Envío
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Tipos de envio - {{ $city->name }}
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Añadir nuevo
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir
                                                            tipo de envio</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if (Session::has('message'))
                                                            <div class="alert alert-success" role="alert">
                                                                {{ Session::get('message') }}</div>
                                                        @endif
                                                        <div class="mb-3 mt-3">
                                                            <select class="form-control" wire:model="shipping_type_id">
                                                                <option value="" selected disabled>Tipo de envio:
                                                                </option>
                                                                @foreach ($all_shipping_types as $all_shipping_type)
                                                                    <option value="{{ $all_shipping_type->id }}">
                                                                        {{ $all_shipping_type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('shipping_type_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="name" class="form-label">Slug</label> --}}
                                                            <input type="text" name="slug" class="form-control"
                                                                placeholder="Precio (opcional)"
                                                                wire:model="shipping_type_price">
                                                            @error('shipping_type_price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="name" class="form-label">Slug</label> --}}
                                                            <input type="text" name="slug" class="form-control"
                                                                placeholder="Detalle (opcional)"
                                                                wire:model="shipping_type_detail">
                                                            @error('shipping_type_detail')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal"
                                                            wire:click.prevent="storeCityShippingType">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                @if (Session::has('warning'))
                                    <div class="alert alert-warning" role="alert">{{ Session::get('warning') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tipo de envio</th>
                                            <th>Precio</th>
                                            <th>Detalle</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($shipping_types as $shipping_type)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    {{ $shipping_type->name }}
                                                    <!-- Button trigger modal -->
                                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop2" wire:click.prevent="editCityShippingType({{ $shipping_type->id }})">
                                                        <svg style="width:18px;height:18px" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td>{{ $shipping_type->pivot->price }}</td>
                                                <td>{{ $shipping_type->pivot->details }}</td>
                                                @if ($shipping_type->is_active == 1)
                                                    <td><a href="#"
                                                            wire:click.prevent="changeStatusCityShippingType({{ $shipping_type->id }})"><span
                                                                class="badge bg-success">Habilitado</span></a></td>
                                                @else
                                                    <td><a href="#"
                                                            wire:click.prevent="changeStatusCityShippingType({{ $shipping_type->id }})"><span
                                                                class="badge bg-danger">Deshabilitado</span></a></td>
                                                @endif
                                                <td class="text-end">
                                                    <a href="#"
                                                        onclick="deleteConfirmation({{ $shipping_type->id }})">
                                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir
                        tipo de envio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}</div>
                    @endif
                    <div class="mb-3 mt-3">
                        {{-- <select class="form-control" wire:model="for_edit_shipping_type_name" disabled>
                            <option value="">Tipo de envio:</option>
                            @foreach ($all_shipping_types as $all_shipping_type)
                                <option value="{{ $all_shipping_type->id }}">
                                    {{ $all_shipping_type->name }}</option>
                            @endforeach
                        </select> --}}
                        <input type="text" name="slug" class="form-control" placeholder="{{ $for_edit_shipping_type_name }}"
                            wire:model="for_edit_shipping_type_name" disabled>
                        @error('for_edit_shipping_type_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        {{-- <label for="name" class="form-label">Slug</label> --}}
                        <input type="text" name="slug" class="form-control" placeholder="Precio (opcional)"
                            wire:model="for_edit_shipping_type_price">
                        @error('for_edit_shipping_type_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        {{-- <label for="name" class="form-label">Slug</label> --}}
                        <input type="text" name="slug" class="form-control" placeholder="Detalle (opcional)"
                            wire:model="for_edit_shipping_type_detail">
                        @error('for_edit_shipping_type_detail')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        wire:click.prevent="updateCityShippingType">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Quieres borrar este registro?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmation">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCityShippingType()">Sí,
                            Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
            @this.set('for_delete_city_shipping_type_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCityShippingType() {
            @this.call('deleteCityShippingType');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
