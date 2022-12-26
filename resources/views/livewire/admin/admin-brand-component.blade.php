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
                    <span></span> Todas las marcas
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
                                        Todas las marcas
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.brand.add') }}" class="btn btn-success float-end">Nueva Marca</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Nombre</th>
                                            <th>Slug</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = ($brands->currentPage()-1)*$brands->perPage();
                                    @endphp
                                        @foreach($brands as $brand)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/imgs/brands') }}/{{ $brand->logo }}" alt="logo {{ $brand->name }}" width="60">
                                                </td>
                                                <td>{{ $brand->name }}</td>
                                                <td>{{ $brand->slug }}</td>
                                                <td>{{ $brand->status == 1 ? 'Si':'No'}}</td>
                                                <td>
                                                    <a href="{{ route('admin.brand.edit', $brand->id) }}" class="text-info">Editar</a>
                                                    <a href="#" class="text-danger" style="margin-left:20px;" onclick="deleteConfirmation({{$brand->id}})">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $brands->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Quieres borrar este registro?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="deleteBrand()">Sí, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('brand_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteBrand(){
            @this.call('deleteBrand');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush