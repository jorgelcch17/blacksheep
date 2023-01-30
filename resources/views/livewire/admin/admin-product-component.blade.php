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
                    <span></span> Todos los productos
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
                                        Todos los productos
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.product.add') }}"
                                            class="btn btn-success float-end">Nuevo Producto</a>
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
                                            <th>Stock</th>
                                            {{-- <th>Precio</th> --}}
                                            {{-- <th>Categoría</th> --}}
                                            <th>Marca</th>
                                            <th>Creado el</th>
                                            <th>Publicado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = ($products->currentPage() - 1) * $products->perPage();
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/imgs/products') }}/{{ $product->image }}"
                                                        alt="{{ $product->name }}" width="60">
                                                </td>
                                                <td>
                                                    <p class="fs-5 fw-bold">{{ $product->name }}
                                                    </p>
                                                    <p>{{ $product->category->name }} -
                                                        {{ $product->subcategory->name }}</p>
                                                    <p>
                                                    <div class="product-price">
                                                        @if ($product->sale_price > 0)
                                                            <span class="fw-bolder">Bs {{ $product->sale_price }}
                                                            </span>
                                                            <span class="old-price"
                                                                style="text-decoration:line-through;">Bs
                                                                {{ $product->regular_price }}</span>
                                                        @else
                                                            <span class="fw-bolder">Bs {{ $product->regular_price }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    </p>
                                                </td>
                                                <td>
                                                    @if ($product->sizes->sum('quantity') > 0)
                                                        @foreach ($product->sizes as $size)
                                                            @if ($size->quantity > 5)
                                                                <span class="badge bg-success">{{ $size->size }} :
                                                                    {{ $size->quantity }}</span><br>
                                                            @elseif($size->quantity > 0 && $size->quantity <= 5)
                                                                <span class="badge bg-warning">{{ $size->size }} :
                                                                    {{ $size->quantity }}</span><br>
                                                            @else
                                                                <span class="badge bg-danger">{{ $size->size }} :
                                                                    {{ $size->quantity }}</span><br>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <span class="badge bg-danger">Fuera de stock</span>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $product->category->name }}</td> --}}
                                                <td>{{ $product->brand->name }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    @if ($product->is_active == 1)
                                                        <span class="badge bg-success" wire:click="changeStatus('{{ $product->id }}')">Publicado</span>
                                                    @else
                                                        <span class="badge bg-danger" wire:click="changeStatus('{{ $product->id }}')">No Publicado</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                        class="text-info">Editar</a>
                                                    <a href="#" onclick="deleteConfirmation({{ $product->id }})"
                                                        class="text-danger">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
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
                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Sí, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
            @this.set('product_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteProduct() {
            @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
