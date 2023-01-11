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
                    <span></span> Todas las categorías
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
                                        Todas las categorías
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.category.add') }}"
                                            class="btn btn-success float-end">Nueva Categoría</a>
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
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Slug</th>
                                            <th>Subcategorias</th>
                                            <th>Popular</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($categories->currentPage() - 1) * $categories->perPage();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/imgs/categories') }}/{{ $category->image }}"
                                                        width="60">
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($category->subcategories as $subcategory)
                                                            <li><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M10,17L15,12L10,7V17Z" />
                                                                </svg>
                                                                <span>{{ $subcategory->name }}
                                                                    <a
                                                                        href="{{ route('admin.category.edit', ['category_id' => $category->id, 'scategory_id' => $subcategory->id]) }}">
                                                                        <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                                            <path fill="black" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                                        </svg>
                                                                    </a>
                                                                    <a href="#" onclick="deleteConfirmation2({{ $subcategory->id }})">
                                                                        <svg style="width:20px;height:20px"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                                        </svg>
                                                                    </a>
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $category->is_popular == 1 ? 'Si' : 'No' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.category.edit', ['category_id' => $category->id]) }}"
                                                        class="text-info">Editar</a>
                                                    <a href="#" class="text-danger" style="margin-left:20px;"
                                                        onclick="deleteConfirmation({{ $category->id }})">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}
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
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCategory() {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
    <script>
        function deleteConfirmation2(id) {
            @this.set('subcategory_id', id);
            $('#deleteConfirmation2').modal('show');
        }

        function deleteSubcategory() {
            @this.call('deleteSubcategory');
            $('#deleteConfirmation2').modal('hide');
        }
    </script>
@endpush
