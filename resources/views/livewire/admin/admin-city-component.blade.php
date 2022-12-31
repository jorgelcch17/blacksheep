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
                    <span></span> Ciudades
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
                                        Ciudades
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Nueva Ciudad
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva
                                                            Ciudad</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if (Session::has('message'))
                                                            <div class="alert alert-success" role="alert">
                                                                {{ Session::get('message') }}</div>
                                                        @endif
                                                        <div class="mb-3 mt-3">
                                                            <label for="name" class="form-label">Nombre</label>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Enter category name" wire:model="new_name"
                                                                wire:keyup="generateSlug">
                                                            @error('new_name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="name" class="form-label">Slug</label>
                                                            <input type="text" name="slug" class="form-control"
                                                                placeholder="Enter category slug" wire:model="new_slug">
                                                            @error('new_slug')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary"
                                                            wire:click.prevent="storeCity">Guardar</button>
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
                                            <th>Slug</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($cities as $city)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    {{ $city->name }}
                                                    <!-- Button trigger modal -->
                                                    <a wire:click.prevent="editCity({{ $city->id }})" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                        <svg style="width:18px;height:18px" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td>{{ $city->slug }}</td>
                                                @if ($city->status == 1)
                                                    <td><a href="#" wire:click.prevent="changeStatusCity({{$city->id}})"><span class="badge bg-success">Habilitado</span></a></td>
                                                @else
                                                    <td><a href="#" wire:click.prevent="changeStatusCity({{$city->id}})"><span class="badge bg-danger">Deshabilitado</span></a></td>
                                                @endif
                                                <td class="text-end">
                                                    <a href="{{ route('admin.cities.deliveries', [$department, $province, $city]) }}">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.59 16.34L13.17 12L8.59 7.66L10 6L16 12L10 18L8.59 16.34Z"
                                                                fill="currentColor" />
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
     <div class="modal fade" id="staticBackdrop2"
     data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true" wire:ignore>
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5"
                     id="staticBackdropLabel">Editar Ciudad</h1>
                 <button type="button" class="btn-close"
                     data-bs-dismiss="modal"
                     aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 @if (Session::has('message'))
                     <div class="alert alert-success" role="alert">
                         {{ Session::get('message') }}</div>
                 @endif
                 <div class="mb-3 mt-3">
                     <label for="name"
                         class="form-label">Nombre</label>
                     <input type="text" name="name"
                         class="form-control"
                         placeholder="Enter category name"
                         wire:model="edit_name"
                         wire:keyup="generateSlug">
                     @error('edit_name')
                         <p class="text-danger">{{ $message }}</p>
                     @enderror
                 </div>
                 <div class="mb-3 mt-3">
                     <label for="slug"
                         class="form-label">Slug</label>
                     <input type="text" name="slug"
                         class="form-control"
                         placeholder="Enter category slug"
                         wire:model="edit_slug">
                     @error('edit_slug')
                         <p class="text-danger">{{ $message }}</p>
                     @enderror
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary"
                     data-bs-dismiss="modal">Cerrar</button>
                 <button type="button" class="btn btn-primary"
                     wire:click.prevent="updateCity">Guardar</button>
             </div>
         </div>
     </div>
 </div>
</div>
