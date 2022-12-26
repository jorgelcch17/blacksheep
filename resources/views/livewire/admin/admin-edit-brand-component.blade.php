<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Editar Marca
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
                                        Editar Marca
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.brands') }}" class="btn btn-success float-end">Todas las marcas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <form wire:submit.prevent="updateBrand">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre de la marca" wire:model="name" wire:keyup="generateSlug" id="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Ingrese el slug de la marca" wire:model="slug">
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Logo</label>
                                        <input type="file" class="form-control" wire:model="newlogo">
                                        @error('newlogo')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @if($newlogo)
                                            <img src="{{ $newlogo->temporaryUrl() }}" width="120">
                                        @else
                                            <img src="{{ asset('assets/imgs/brands') }}/{{ $logo }}" width="120">
                                        @endif
                                    </div>
                                    <div class="mb-3 mt-3">
                                        {{-- tamaño de la imagen para que las marcas mantenga un buen aspecto en el sitio 500x195px --}}
                                        <label class="form-label" for="status">Estado</label>
                                        <select name="status" class="form-control" wire:model="status" id="status">
                                            <option value="0">No Habilitado</option>
                                            <option value="1">Habilitado</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>