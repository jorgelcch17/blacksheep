<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Mi cuenta
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="dashboard-tab" data-bs-toggle="tab"
                                                href="#dashboard" role="tab" aria-controls="dashboard"
                                                aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Panel
                                                de control</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"
                                                role="tab" aria-controls="orders" aria-selected="false"><i
                                                    class="fi-rs-shopping-bag mr-10"></i>Ordenes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab"
                                                href="#track-orders" role="tab" aria-controls="track-orders"
                                                aria-selected="false"><i
                                                    class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="address-tab" data-bs-toggle="tab"
                                                href="#address" role="tab" aria-controls="address"
                                                aria-selected="true"><i class="fi-rs-marker mr-10"></i>Mis
                                                direcciones</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                                                href="#account-detail" role="tab" aria-controls="account-detail"
                                                aria-selected="true"><i class="fi-rs-user mr-10"></i>Detalle de la
                                                cuenta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login.html"><i
                                                    class="fi-rs-sign-out mr-10"></i>Cerrar Sesión</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade" id="dashboard" role="tabpanel"
                                        aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello Rosie! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a
                                                        href="#">recent orders</a>, manage your <a
                                                        href="#">shipping and billing addresses</a> and <a
                                                        href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel"
                                        aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>#1357</td>
                                                                <td>March 45, 2022</td>
                                                                <td>Processing</td>
                                                                <td>$125.00 for 2 item</td>
                                                                <td><a href="#" class="btn-small d-block">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>#2468</td>
                                                                <td>June 29, 2022</td>
                                                                <td>Completed</td>
                                                                <td>$364.00 for 5 item</td>
                                                                <td><a href="#" class="btn-small d-block">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>#2366</td>
                                                                <td>August 02, 2022</td>
                                                                <td>Completed</td>
                                                                <td>$280.00 for 3 item</td>
                                                                <td><a href="#" class="btn-small d-block">View</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                        aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Orders tracking</h5>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>To track your order please enter your OrderID in the box below and
                                                    press "Track" button. This was given to you on your receipt and in
                                                    the confirmation email you should have received.</p>
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="#"
                                                            method="post">
                                                            <div class="input-style mb-20">
                                                                <label>Order ID</label>
                                                                <input name="order-id"
                                                                    placeholder="Found in your order confirmation email"
                                                                    type="text" class="square">
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>Billing email</label>
                                                                <input name="billing-email"
                                                                    placeholder="Email you used during checkout"
                                                                    type="email" class="square">
                                                            </div>
                                                            <button class="submit submit-auto-width"
                                                                type="submit">Track</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active show" id="address" role="tabpanel"
                                        aria-labelledby="address-tab">
                                        <div class="row">
                                            @if ($addresses)
                                                @foreach ($addresses as $address)
                                                    <div class="col-lg-6 mb-2">
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
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#staticBackdrop2" wire:click.prevent="editAddress({{ $address->id }})">
                                                                    Editar
                                                                </a>
                                                                {{-- enlace de eliminar --}}
                                                                <a href="#" class="text-danger ps-2"
                                                                    wire:click.prevent="deleteAddress({{ $address->id }})">Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="col-lg-6">
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
                                                                                    <input type="text"
                                                                                        name="alias"
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
                                                                                    <input type="text"
                                                                                        name="name"
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
                                                                                    <input type="text"
                                                                                        name="phone-number"
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
                                                                                    <input type="text"
                                                                                        name="email"
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
                                                                                    <input type="text"
                                                                                        name="company_name"
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
                                                                                    <input type="text"
                                                                                        name="nit"
                                                                                        class="form-control"
                                                                                        placeholder="CI/NIT"
                                                                                        wire:model="nit">
                                                                                    @error('nit')
                                                                                        <p class="text-danger">
                                                                                            {{ $message }}</p>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="col-lg-12 mt-2">
                                                                                    {{-- <label for="nit"
                                                                                        class="form-label">Departamento</label> --}}
                                                                                    <select
                                                                                        class="form-control form-select"
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
                                                                                    <select
                                                                                        class="form-control form-select"
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
                                                                                    <select
                                                                                        class="form-control form-select"
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
                                                                                    <input type="text"
                                                                                        name="address"
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
                                                                                    <input type="text"
                                                                                        name="reference"
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
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cerrar</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary"
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
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel"
                                        aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <p>Already have an account? <a href="login.html">Log in instead!</a>
                                                </p>
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>First Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="name" type="text">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Last Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="phone">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Display Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="dname" type="text">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span
                                                                    class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="email" type="email">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Current Password <span
                                                                    class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="password" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>New Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="npassword" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Confirm Password <span
                                                                    class="required">*</span></label>
                                                            <input required="" class="form-control square"
                                                                name="cpassword" type="password">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit"
                                                                name="submit" value="Submit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateAddress">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
