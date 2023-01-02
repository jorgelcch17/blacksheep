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
                    <span></span> Cupones
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
                                        Cupones
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Nuevo cupon
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo
                                                            cupon</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @if (Session::has('message'))
                                                                <div class="alert alert-success" role="alert">
                                                                    {{ Session::get('message') }}</div>
                                                            @endif
                                                            @if (Session::has('error_message'))
                                                                <div class="alert alert-danger" role="alert">
                                                                    {{ Session::get('error_message') }}</div>
                                                            @endif
                                                            <div class="col-lg-12 mb-2">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nombre del cupon" wire:model="name">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-12 mb-2">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Cogido de cupon" wire:model="code">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <select class="form-control" wire:model="type">
                                                                    <option value="" selected disabled>Tipo de
                                                                        cupon</option>
                                                                    <option value="percent">Porcentaje</option>
                                                                    <option value="fixed">Fijo</option>
                                                                </select>
                                                                @error('type')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Valor de descuento" wire:model="value">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Valor de orden min." wire:model="min_order_value">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <input type="text" class="form-control {{ $type == 'percent' ? '' : 'invisible' }}"
                                                                    placeholder="Descuento max." wire:model="max_discount">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <label for="start_date" class="mb-0">Fecha
                                                                    inicio (opcional)</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="start_date" placeholder="Fecha inicio" wire:model="start_date">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <label for="end_date" class="mb-0">Fecha fin (opcional)</label>
                                                                <input type="datetime-local" id="end_date"
                                                                    class="form-control" placeholder="Fecha fin (opcional)" wire:model="end_date">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Uso maximo (opcional)" wire:model="max_use">
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <select class="form-control {{ $active == 0 ? 'bg-danger' : '' }} {{ $active == 1 ? 'bg-success':'' }}" wire:model="active">
                                                                    <option value="" disabled>Estado</option>
                                                                    <option value="0">No habilitado</option>
                                                                    <option value="1">Habilitado</option>
                                                                </select>
                                                                @error('code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary"
                                                            wire:click.prevent="storeCoupon">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}
                                    </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                            <th>Tipo</th>
                                            <th>Valor</th>
                                            <th>Valor min</th>
                                            <th>Descuento Max</th>
                                            <th>Inicio</th>
                                            <th>Fin</th>
                                            <th>Uso maximo</th>
                                            <th>Uso actual</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    {{ $coupon->name }}
                                                    <!-- Button trigger modal -->
                                                    {{-- <a wire:click.prevent="editCity({{ $city->id }})" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                        <svg style="width:18px;height:18px" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                        </svg>
                                                    </a> --}}
                                                </td>
                                                <td>{{ $coupon->code }}</td>
                                                <td>{{ $coupon->value }}</td>
                                                @if ($coupon->type == 'fixed')
                                                    <td><span class="badge bg-secondary">Fijo</span></td>
                                                @else
                                                    <td><span class="badge bg-secondary">%</span></td>
                                                @endif
                                                <td>{{ $coupon->min_order_value }}</td>
                                                <td>{{ $coupon->max_discount }}</td>
                                                <td>{{ $coupon->start_date }}</td>
                                                <td>{{ $coupon->end_date }}</td>
                                                <td>{{ $coupon->max_use }}</td>
                                                <td>{{ $coupon->current_use }}</td>
                                                @if ($coupon->active == 1)
                                                    <td><a href="#"
                                                            wire:click.prevent="changeStatusCity({{ $coupon->id }})"><span
                                                                class="badge bg-success">Habilitado</span></a></td>
                                                @else
                                                    <td><a href="#"
                                                            wire:click.prevent="changeStatusCity({{ $coupon->id }})"><span
                                                                class="badge bg-danger">Deshabilitado</span></a></td>
                                                @endif
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Ciudad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}</div>
                    @endif
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter category name"
                            wire:model="edit_name" wire:keyup="generateSlug">
                        @error('edit_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Enter category slug"
                            wire:model="edit_slug">
                        @error('edit_slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateCity">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
