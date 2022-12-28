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
