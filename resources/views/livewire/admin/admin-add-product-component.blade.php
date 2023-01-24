<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .selected-tag {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }
    </style>
    <main class="main">
        {{-- imprimiendo todos los errores --}}
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Nuevo Producto
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-6">
                                        @if ($name)
                                            <strong class="uppercase">{{ $name }}</strong>
                                        @else
                                            <strong>Nombre del producto</strong>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="float-end">
                                            <label class="switch">
                                                <input type="checkbox" wire:model="is_active">
                                                <span class="slider"></span>
                                            </label>
                                            Publicado
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-6">
                                        <strong>Detalles básicos</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="float-end">
                                            <label class="switch">
                                                <input type="checkbox" wire:model="featured">
                                                <span class="slider"></span>
                                            </label>
                                            Destacado
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="d-block" for="uploadImage">
                                            @if ($image)
                                                <img class="w-100 img-thumbnail" src="{{ $image->temporaryUrl() }}"
                                                    alt="imagen temporal">
                                            @else
                                                <img class="w-100 img-thumbnail"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWaW418IZB469N5CrhJbBX7DeqL1kjBD9juedCXRSqRogdvTWBeHUtNjEhHgfXATjWTFg&usqp=CAU"
                                                    alt="test image">
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-8">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                aria-describedby="helpId" placeholder="Ingrese el nombre del producto"
                                                wire:model="name" wire:keyup="generateSlug">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slug"
                                                aria-describedby="helpId" placeholder="Ingrese el slug del producto"
                                                wire:model="slug">
                                            @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="regular_price" class="form-label">Precio regular</label>
                                                    <input type="text" class="form-control" name="regular_price"
                                                        id="regular_price" aria-describedby="helpId"
                                                        placeholder="Ingrese el precio regular"
                                                        wire:model="regular_price">
                                                    @error('regular_price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="sale_price" class="form-label">Precio de oferta
                                                        (Opcional)</label>
                                                    <input type="text" class="form-control" name="sale_price"
                                                        id="sale_price" aria-describedby="helpId"
                                                        placeholder="Ingrese el precio de oferta"
                                                        wire:price="sale_price">
                                                    @error('sale_price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <label for="sku" class="form-label">SKU (Opcional)</label>
                                                    <input type="text" class="form-control" name="sku"
                                                        id="sku" aria-describedby="helpId"
                                                        placeholder="Ingrese el precio de oferta" wire:model="sku">
                                                    @error('sku')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="stock_status" class="form-label">Disponibilidad</label>
                                                <select class="form-select form-select-lg" name="stock_status"
                                                    id="stock_status" wire:model="stock_status">
                                                    <option value="instock">En Stock</option>
                                                    <option value="outofstock">Fuera de Stock</option>
                                                    <option value="pre-order">A pedido</option>
                                                </select>
                                                @error('stock_status')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="brand_id" class="form-label">Marca</label>
                                                <select class="form-select form-select-lg" name="brand_id"
                                                    id="brand_id" wire:model="brand_id">
                                                    <option selected>Seleccione una marca</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <small id="helpId" class="form-text text-muted">Nota: subir imagenes
                                            cuadradas</small>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="uploadImage"
                                                wire:model="image">
                                            <label class="input-group-text" for="inputGroupFile02">Subir</label>
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="category_id" class="form-label">Categoria</label>
                                        <select class="form-select form-select-lg" name="category_id"
                                            id="category_id" wire:model="category_id">
                                            <option selected>Seleccione una marca</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="subcategory_id" class="form-label">Subcategoria</label>
                                        <select class="form-select form-select-lg" name="subcategory_id"
                                            id="subcategory_id" wire:model="subcategory_id"
                                            {{ $category_id == '' ? 'disabled' : '' }}>
                                            <option selected>Seleccione una marca</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3" wire:ignore>
                                        <label for="short_description" class="form-label">Descripción corta</label>
                                        <textarea class="form-control" name="short_description" id="short_description" rows="3"
                                            wire:model="short_description"></textarea>
                                        <small id="helpId" class="form-text text-muted">La descripción corta debe
                                            contener menos de 255 caracteres.</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3" wire:ignore>
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="escription" id="description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-6">
                                        <strong>Color y Tallas</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3 p-2 border">
                                            <label for="color" class="form-label">Color</label>
                                            <input type="text" class="form-control" name="color" id="color"
                                                aria-describedby="helpId" placeholder="Ingrese el color"
                                                wire:model="color">
                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="row py-2 border">
                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="temporal_size" class="form-label">Talla</label>
                                                    <input type="text" class="form-control" name="temporal_size"
                                                        id="temporal_size" aria-describedby="helpId"
                                                        placeholder="Ingrese las tallas" wire:model="temporal_size">
                                                    @error('temporal_size')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="mb-3">
                                                    <label for="temporal_quantity" class="form-label">Cantidad</label>
                                                    <input type="text" class="form-control"
                                                        name="temporal_quantity" id="temporal_quantity"
                                                        aria-describedby="helpId" placeholder="Ingrese la cantidad"
                                                        wire:model="temporal_quantity">
                                                    @error('temporal_quantity')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label"
                                                        style="visibility:hidden;">Añadir</label>
                                                    <div class="d-grid gap-2">
                                                        <button type="button" name="" id=""
                                                            title="Añadir" class="btn btn-primary"
                                                            wire:click.prevent="addSize"><svg
                                                                style="width:24px;height:24px" viewBox="0 0 24 24">
                                                                <path fill="white"
                                                                    d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (count($sizes) > 0)
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-striped
                                                table-hover	
                                                table-borderless
                                                align-middle">
                                                        <thead class="table-light">
                                                            <caption>Tallas disponibles</caption>
                                                            <tr>
                                                                <th>Talla</th>
                                                                <th>Cantidad</th>
                                                                <th>Borrar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-group-divider">
                                                            @foreach ($sizes as $size)
                                                                <tr class="">
                                                                    <td scope="row">{{ $size['size'] }}</td>
                                                                    <td>{{ $size['quantity'] }} Unidades</td>
                                                                    <td>
                                                                        <svg wire:click.prevent="removeSize({{ $loop->index }})"
                                                                            style="width:24px;height:24px"
                                                                            viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                                                                        </svg>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-6">
                                        <strong>Galeria de imagenes</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="dropzone" id="my-awesome-dropzone"></form>
                            </div>
                            <div class="row mx-1">
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <img class="img-thumbnail w-100"
                                        src="https://boliviacards.com/wp-content/uploads/2021/04/polera_pekka-600x600.png"
                                        alt="lera">
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <img class="img-thumbnail w-100"
                                        src="https://boliviacards.com/wp-content/uploads/2021/04/polera_pekka-600x600.png"
                                        alt="lera">
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <img class="img-thumbnail w-100"
                                        src="https://boliviacards.com/wp-content/uploads/2021/04/polera_pekka-600x600.png"
                                        alt="lera">
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <img class="img-thumbnail w-100"
                                        src="https://boliviacards.com/wp-content/uploads/2021/04/polera_pekka-600x600.png"
                                        alt="lera">
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <img class="img-thumbnail w-100"
                                        src="https://boliviacards.com/wp-content/uploads/2021/04/polera_pekka-600x600.png"
                                        alt="lera">
                                </div>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <img class="img-thumbnail w-100"
                                        src="https://boliviacards.com/wp-content/uploads/2021/04/polera_pekka-600x600.png"
                                        alt="lera">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="d-grid gap-2 mt-4">
                    <button type="button" name="" id="" class="btn btn-primary"
                        wire:click.prevent="addProduct">Guardar</button>
                </div>
            </div>
        </section>
    </main>
</div>

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

{{-- @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Dropzone.options.myGreatDropzone = { // camelized version of the `id`
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            // cambiando el texto de la etiqueta de arrastrar y soltar
            dictDefaultMessage: "Arrastra tus archivos aquí",
            // enviando el token csrf
            headers: {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            },
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
    </script>
@endpush --}}

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/kzp7irwb25ot6mjk48dhyw5ijbniu36tbteqmkzpvpit6xyi/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        $(function() {
            tinymce.init({
                selector: '#short_description',
                plugins: 'autoresize anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });
            tinymce.init({
                selector: '#description',
                plugins: 'autoresize anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description', sd_data);
                    });
                }
            });
        })
    </script>
@endpush
