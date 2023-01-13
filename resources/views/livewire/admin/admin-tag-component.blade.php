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
                    <span></span> Todas las Etiquetas
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
                                        Todas las Etiquetas
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Nueva Etiqueta
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva
                                                            Etiqueta</h1>
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
                                                                placeholder="Enter tag name" wire:model="new_name"
                                                                wire:keyup="generateSlug">
                                                            @error('new_name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="name" class="form-label">Slug</label>
                                                            <input type="text" name="slug" class="form-control"
                                                                placeholder="Enter tag slug" wire:model="new_slug">
                                                            @error('new_slug')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary"
                                                            wire:click.prevent="storeTag">Guardar</button>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($tags->currentPage() - 1) * $tags->perPage();
                                        @endphp
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>{{ $tag->slug }}</td>
                                                <td>
                                                    <a class="text-info" wire:click.prevent="editTag({{ $tag->id }})" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                        Editar
                                                    </a>
                                                    <a href="#" class="text-danger" style="margin-left:20px;"
                                                        onclick="deleteConfirmation({{ $tag->id }})">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $tags->links() }}
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
                    wire:click.prevent="updateTag">Guardar</button>
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
                        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Sí, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="deleteConfirmation2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Quieres borrar este registro?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmation2">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSubcategory()">Sí, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
            @this.set('for_delete_tag_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory() {
            @this.call('deleteTag');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
