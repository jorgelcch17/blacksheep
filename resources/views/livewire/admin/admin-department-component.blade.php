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
                    <span></span> Ubicaciones
                    <span></span> Departamentos
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
                                        Departamentos
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <a href="{{ route('admin.category.add') }}" class="btn btn-success float-end">Nueva Categoría</a> --}}
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
                                        @foreach($departments as $department)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    {{ $department->name }}
                                                </td>
                                                <td>{{ $department->slug }}</td>
                                                @if ($department->status == 1)
                                                    <td><a href="#" wire:click.prevent="changeStatusDepartment({{$department->id}})"><span class="badge bg-success">Habilitado</span></a></td>
                                                @else
                                                    <td><a href="#" wire:click.prevent="changeStatusDepartment({{$department->id}})"><span class="badge bg-danger">Deshabilitado</span></a></td>
                                                @endif
                                                <td class="text-end">
                                                    <a href="{{ route('admin.provinces', $department) }}">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                          <path d="M8.59 16.34L13.17 12L8.59 7.66L10 6L16 12L10 18L8.59 16.34Z" fill="currentColor"/>
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
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Quieres borrar este registro?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Sí, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory(){
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush