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
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Editar Producto
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
                                        Editar Producto
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.products') }}" class="btn btn-success float-end">Todas
                                            los productos</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter category name" wire:model="name"
                                            wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="Enter category slug" wire:model="slug">
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="short_description" class="form-label">Descripción corta</label>
                                        <textarea class="form-control" name="short_description" placeholder="Enter short description"
                                            wire:model="short_description"></textarea>
                                        @error('short_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="description" placeholder="Enter description" wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">Precio regular</label>
                                        <input type="text" name="regular_price" class="form-control"
                                            placeholder="Enter regular price" wire:model="regular_price">
                                        @error('regular_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">Precio de oferta</label>
                                        <input type="text" name="sale_price" class="form-control"
                                            placeholder="Enter regular price" wire:model="sale_price">
                                        @error('sale_price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" name="sku" class="form-control"
                                            placeholder="Enter sku" wire:model="sku">
                                        @error('sku')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">Disponibilidad</label>
                                        <select class="form-control" name="stock_status" wire:model="stock_status">
                                            <option value="instock">Disponible</option>
                                            <option value="outofstock">Sin stock</option>
                                        </select>
                                        @error('stock_status')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">Destacado</label>
                                        <select class="form-control" name="featured" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                        @error('featured')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Cantidad</label>
                                        <input type="text" name="quantity" class="form-control"
                                            placeholder="Enter product quantity" wire:model="quantity">
                                        @error('quantity')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" name="image"
                                            wire:model="newimage">
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                        @else
                                            <img src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                width="120">
                                        @endif
                                        @error('newimage')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="newimages" class="form-label">Galeria</label>
                                        <input type="file" class="form-control" name="newimages"
                                            wire:model="newimages" multiple>
                                        @if ($newimages)
                                            @foreach ($newimages as $newimage)
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($images as $image)
                                                @if ($image)
                                                    <img src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                        width="120">
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Categoría</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            <option value="">Seleccione Categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="subcategory_id" class="form-label">Subcategoría</label>
                                        <select class="form-control" name="subcategory_id" wire:model="subcategory_id" {{ $category_id == '' ? 'disabled':'' }}>
                                            <option value="">Seleccione Subcategoría</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="brand_id" class="form-label">Marca</label>
                                        <select class="form-control" name="brand_id" wire:model="brand_id">
                                            <option value="">Seleccione Marca</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="color" class="form-label">Color</label>
                                        <input type="text" name="color" class="form-control"
                                            placeholder="Ej: rojo" wire:model="color">
                                        @error('color')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <label class="form-label">Tallas y cantidades</label>
                                        <div class="col-lg-5 mb-3">
                                            <input type="text" name="size" class="form-control"
                                                placeholder="Talla. Ej: M" wire:model="temporal_size">
                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-5 mb-3">
                                            <input type="text" name="size" class="form-control"
                                                placeholder="Cantidad" wire:model="temporal_quantity">
                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-2 mb-3">
                                            <button type="button" class="btn btn-success"
                                                wire:click.prevent="addSize">Añadir</button>
                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @if (count($sizes) > 0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Talla</th>
                                                            <th scope="col">Cantidad</th>
                                                            <th scope="col">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sizes as $size)
                                                            <tr>
                                                                <td>{{ $size['size'] }}</td>
                                                                <td>{{ $size['quantity'] }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger"
                                                                        wire:click.prevent="removeSize({{ $loop->index }})">Eliminar</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-3 mt-3">
                                        <label for="search" class="form-label">Grupo de producto (opcional)</label>
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Buscar producto por nombre" wire:model="search">
                                        {{-- mosrtrando los productos encontrados en la variable $result_search --}}
                                        @if (count($result_search) > 0)
                                            <div class="row position-absolute bg-white z-1000"
                                                style="right:15px;left:15px;">
                                                <div class="col-lg-12">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Imagen</th>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($result_search as $eproduct)
                                                                <tr>
                                                                    <td>
                                                                        <img style="height: 120px; width:120px;"
                                                                            src="{{ asset('assets/imgs/products') }}/{{ $eproduct->image }}"
                                                                            alt="{{ $eproduct->name }}">
                                                                    </td>
                                                                    <td>{{ $eproduct->name }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success"
                                                                            wire:click.prevent="selectProductGroup({{ $eproduct->id }})">Seleccionar</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>



                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (count($selected_group) > 0)
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Imagen</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Categoría</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($selected_group as $seproduct)
                                                            <tr>
                                                                <td>
                                                                    <img style="height: 120px; width:120px;" src="{{ asset('assets/imgs/products') }}/{{ $seproduct->image }}" alt="{{ $seproduct->name }}">
                                                                </td>
                                                                <td>{{ $seproduct->name }}</td>
                                                                <td>
                                                                    {{ $seproduct->category->name }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mb-3 mt-3">
                                        <label for="search" class="form-label">Etiquetas</label>
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Buscar etiquetas" wire:model="search_tag">
                                        {{-- mosrtrando los productos encontrados en la variable $result_search --}}
                                        @if (count($result_search_tag) > 0)
                                            <div class="row position-absolute bg-white z-1000"
                                                style="right:15px;left:15px;">
                                                <div class="col-lg-12">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($result_search_tag as $rtag)
                                                                <tr>
                                                                    <td>{{ $rtag->name }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success"
                                                                            wire:click.prevent="addTag({{ $rtag->id }})">Seleccionar</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>



                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- enlistando el grupo de productos de la variable selected_group --}}
                                    @if (count($selected_tags) > 0)
                                        <div>
                                            @foreach ($selected_tags as $selected_tag)
                                            <span class="selected-tag">
                                                {{ $selected_tag['name'] }}
                                                <svg wire:click="removeTag({{ $selected_tag['id'] }})" style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M16.2,17H14.2L12,13.2L9.8,17H7.8L11,12L7.8,7H9.8L12,10.8L14.2,7H16.2L13,12M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" />
                                                </svg>
                                               </span>
                                            @endforeach
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-primary float-end">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
