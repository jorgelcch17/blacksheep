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
                    <span></span>Tipos de Envío
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
                                        Tipos de envio
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Nueva tipo de envio
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo tipo
                                                            de envio</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if (Session::has('message'))
                                                            <div class="alert alert-success" role="alert">
                                                                {{ Session::get('message') }}</div>
                                                        @endif
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="name" class="form-label">Nombre</label> --}}
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Nombre para este envio"
                                                                wire:model="shipping_type_name">
                                                            @error('name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="description" class="form-label">descripción</label> --}}
                                                            <input type="text" name="description"
                                                                class="form-control"
                                                                placeholder="Breve descripción del envio"
                                                                wire:model="shipping_type_description">
                                                            @error('description')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="price" class="form-label">Precio</label> --}}
                                                            <input type="text" name="price" class="form-control"
                                                                placeholder="Precio del envio"
                                                                wire:model="shipping_type_price">
                                                            @error('price')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="delivery_time" class="form-label">Tiempo de entrega</label> --}}
                                                            <input type="text" name="delivery_time"
                                                                class="form-control"
                                                                placeholder="Tiempo promedio de entrega"
                                                                wire:model="shipping_type_delivery_time">
                                                            @error('delivery_time')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            {{-- <label for="delivery_time" class="form-label">Tiempo de entrega</label> --}}
                                                            <select class="form-control"
                                                                wire:model="shipping_type_is_active">
                                                                <option value="" disabled>Seleccione el estado
                                                                </option>
                                                                <option value="1">Habilitar</option>
                                                                <option value="0">Deshabilitar</option>
                                                            </select>
                                                            @error('delivery_time')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal"
                                                            wire:click.prevent="storeShippingType">Guardar</button>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Tiempo de entrega</th>
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
                                                    <a wire:click.prevent="selectForEdit({{ $shipping_type->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                        <svg style="width:18px;height:18px" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td>{{ $shipping_type->description }}</td>
                                                <td>{{ $shipping_type->price }}</td>
                                                <td>{{ $shipping_type->delivery_time }}</td>
                                                @if ($shipping_type->is_active == 1)
                                                    <td><span class="badge bg-success">Habilitado</span></td>
                                                @else
                                                    <td><span class="badge bg-danger">Deshabilitado</span></td>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo tipo de envio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}</div>
                    @endif
                    <div class="mb-3 mt-3">
                        {{-- <label for="name" class="form-label">Nombre</label> --}}
                        <input type="text" name="name" class="form-control"
                            placeholder="Nombre para este envio" wire:model="for_edit_shipping_type_name">
                        @error('for_edit_shipping_type_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        {{-- <label for="description" class="form-label">descripción</label> --}}
                        <input type="text" name="description" class="form-control"
                            placeholder="Breve descripción del envio" wire:model="for_edit_shipping_type_description">
                        @error('for_edit_shipping_type_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        {{-- <label for="price" class="form-label">Precio</label> --}}
                        <input type="text" name="price" class="form-control" placeholder="Precio del envio"
                            wire:model="for_edit_shipping_type_price">
                        @error('for_edit_shipping_type_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        {{-- <label for="delivery_time" class="form-label">Tiempo de entrega</label> --}}
                        <input type="text" name="delivery_time" class="form-control"
                            placeholder="Tiempo promedio de entrega"
                            wire:model="for_edit_shipping_type_delivery_time">
                        @error('for_edit_shipping_type_delivery_time')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        {{-- <label for="delivery_time" class="form-label">Tiempo de entrega</label> --}}
                        <select class="form-control" wire:model="for_edit_shipping_type_is_active">
                            <option value="" disabled>Seleccione el estado</option>
                            <option value="1">Habilitar</option>
                            <option value="0">Deshabilitar</option>
                        </select>
                        @error('for_edit_shipping_type_is_active')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        wire:click.prevent="updateShippingType">Guardar</button>
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
                        <button type="button" class="btn btn-danger" onclick="deleteShippingType()">Sí,
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
            @this.set('for_delete_shipping_type_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteShippingType() {
            @this.call('deleteShippingType');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
