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
                    <span></span> Mis direcciones
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                Mis direcciones
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if ($addresses)
                                        @foreach ($addresses as $address)
                                            <div class="col-lg-4 mb-2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">{{ $address->alias }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>{{ $address->name }}</p>
                                                        <p>{{ $address->phone_number }}</p>
                                                        <p>{{ $address->email }}</p>
                                                        <p>{{ $address->company_name }}</p>
                                                        <p>{{ $address->nit }}</p>
                                                        <p>{{ $address->department->name }},
                                                            {{ $address->province->name }},
                                                            {{ $address->city->name }}</p>
                                                        <p>{{ $address->address }}</p>
                                                        <p>{{ $address->reference }}</p>
                                                        {{-- <a href="#" class="text-info">Editar</a> --}}
                                                        <!-- Button trigger modal -->
                                                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop2"
                                                            wire:click.prevent="editAddress({{ $address->id }})">
                                                            Editar
                                                        </a>
                                                        {{-- enlace de eliminar --}}
                                                        <a href="#" class="text-danger ps-2"
                                                            wire:click.prevent="deleteAddress({{ $address->id }})">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Dirección de envío</h5>
                                                </div>
                                                <div class="card-body">
                                                    {{-- <a href="#" class="btn-small">Añadir dirección</a> --}}
                                                    <!-- Button trigger modal -->
                                                    <a class="" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">
                                                        Añadir dirección
                                                    </a>

                                                    <!-- Modal para nueva direccion-->
                                                    <div class="modal fade" id="staticBackdrop"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true" wire:ignore.self>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="staticBackdropLabel">Nueva
                                                                        dirección de envío</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        @if (Session::has('message'))
                                                                            <div class="alert alert-success"
                                                                                role="alert">
                                                                                {{ Session::get('message') }}
                                                                            </div>
                                                                        @endif
                                                                        <div class="col-lg-12">
                                                                            {{-- <label for="alias"
                                                                                class="form-label">Alias</label> --}}
                                                                            <input type="text" name="alias"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Ingrese alias. Ej: Casa, Oficina, etc."
                                                                                wire:model="alias">
                                                                            @error('alias')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2">
                                                                            {{-- <label for="name"
                                                                                class="form-label">Nombre
                                                                                completo</label> --}}
                                                                            <input type="text" name="name"
                                                                                class="form-control lh-sm"
                                                                                placeholder="Nombre de la persona que recibirá el pedido"
                                                                                wire:model="name">
                                                                            @error('name')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            {{-- <label for="phone-number"
                                                                                class="form-label">Teléfono/Celular</label> --}}
                                                                            <input type="text" name="phone-number"
                                                                                class="form-control"
                                                                                placeholder="Teléfono/Celular"
                                                                                wire:model="phone_number">
                                                                            @error('phone_number')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            {{-- <label for="email"
                                                                                class="form-label">Correo</label> --}}
                                                                            <input type="text" name="email"
                                                                                class="form-control"
                                                                                placeholder="Correo electrónico"
                                                                                wire:model="email">
                                                                            @error('email')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2">
                                                                            {{-- <label for="company-name"
                                                                                class="form-label">Nombre/Razon
                                                                                Social</label> --}}
                                                                            <input type="text" name="company_name"
                                                                                class="form-control form-control-sm"
                                                                                placeholder="Nombre o Razon social"
                                                                                wire:model="company_name">
                                                                            @error('company_name')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            {{-- <label for="nit"
                                                                                class="form-label">NIT</label> --}}
                                                                            <input type="text" name="nit"
                                                                                class="form-control"
                                                                                placeholder="CI/NIT" wire:model="nit">
                                                                            @error('nit')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2">
                                                                            {{-- <label for="nit"
                                                                                class="form-label">Departamento</label> --}}
                                                                            <select class="form-control form-select"
                                                                                aria-label="Default select example"
                                                                                wire:model="selected_department_id">
                                                                                <option selected disabled
                                                                                    value="">
                                                                                    Departamento</option>
                                                                                @foreach ($departments as $department)
                                                                                    <option
                                                                                        value="{{ $department->id }}">
                                                                                        {{ $department->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('nit')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            {{-- <label for="nit"
                                                                                class="form-label">Provincia:</label> --}}
                                                                            <select class="form-control form-select"
                                                                                aria-label="Default select example"
                                                                                wire:model="selected_province_id">
                                                                                <option selected disabled
                                                                                    value="">Provincia
                                                                                </option>
                                                                                @foreach ($provinces as $province)
                                                                                    <option
                                                                                        value="{{ $province->id }}">
                                                                                        {{ $province->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('selected_province_id')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-6 mt-2">
                                                                            {{-- <label for="nit"
                                                                                class="form-label">Ciudad/Pueblo</label> --}}
                                                                            <select class="form-control form-select"
                                                                                aria-label="Default select example"
                                                                                wire:model="selected_city_id">
                                                                                <option selected disabled
                                                                                    value="">Ciudad
                                                                                </option>
                                                                                @foreach ($cities as $city)
                                                                                    <option
                                                                                        value="{{ $city->id }}">
                                                                                        {{ $city->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('selected_city_id')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2">
                                                                            {{-- <label for="address"
                                                                                class="form-label">Dirección</label> --}}
                                                                            <input type="text" name="address"
                                                                                class="form-control"
                                                                                placeholder="Dirección. Ej: av. 6 de agosto, calle 12, casa 12"
                                                                                wire:model="address">
                                                                            @error('address')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-lg-12 mt-2">
                                                                            {{-- <label for="address"
                                                                                class="form-label">Referencia</label> --}}
                                                                            <input type="text" name="reference"
                                                                                class="form-control"
                                                                                placeholder="Referencia. Ej: a 2 cuadras de la plaza de armas"
                                                                                wire:model="reference">
                                                                            @error('reference')
                                                                                <p class="text-danger">
                                                                                    {{ $message }}</p>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        wire:click.prevent="storeAddress">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal para editar direccion-->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar
                        dirección de envío</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <input type="text" name="alias" class="form-control form-control-sm"
                                placeholder="Ingrese alias. Ej: Casa, Oficina, etc." wire:model="edit_alias">
                            @error('edit_alias')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <input type="text" name="name" class="form-control lh-sm"
                                placeholder="Nombre de la persona que recibirá el pedido" wire:model="edit_name">
                            @error('edit_name')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="phone-number" class="form-control"
                                placeholder="Teléfono/Celular" wire:model="edit_phone_number">
                            @error('edit_phone_number')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="email" class="form-control"
                                placeholder="Correo electrónico" wire:model="edit_email">
                            @error('edit_email')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <input type="text" name="company_name" class="form-control form-control-sm"
                                placeholder="Nombre o Razon social" wire:model="edit_company_name">
                            @error('edit_company_name')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-2">
                            <input type="text" name="nit" class="form-control" placeholder="CI/NIT"
                                wire:model="edit_nit">
                            @error('edit_nit')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <select class="form-control form-select" aria-label="Default select example"
                                wire:model="edit_selected_department_id">
                                <option selected disabled value="">
                                    Departamento</option>
                                @foreach ($edit_departments as $edit_department)
                                    <option value="{{ $edit_department->id }}">
                                        {{ $edit_department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('edit_selected_department_id')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-2">
                            <select class="form-control form-select" aria-label="Default select example"
                                wire:model="edit_selected_province_id">
                                <option selected disabled value="">Provincia</option>
                                @foreach ($edit_provinces as $edit_province)
                                    <option value="{{ $edit_province->id }}">
                                        {{ $edit_province->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('edit_selected_province_id')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-2">
                            <select class="form-control form-select" aria-label="Default select example"
                                wire:model="edit_selected_city_id">
                                <option selected disabled value="">Ciudad</option>
                                @foreach ($edit_cities as $edit_citie)
                                    <option value="{{ $edit_citie->id }}">
                                        {{ $edit_citie->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('edit_selected_city_id')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <input type="text" name="address" class="form-control"
                                placeholder="Dirección. Ej: av. 6 de agosto, calle 12, casa 12"
                                wire:model="edit_address">
                            @error('edit_address')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-12 mt-2">
                            <input type="text" name="reference" class="form-control"
                                placeholder="Referencia. Ej: a 2 cuadras de la plaza de armas"
                                wire:model="edit_reference">
                            @error('edit_reference')
                                <p class="text-danger">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        wire:click.prevent="updateAddress">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
