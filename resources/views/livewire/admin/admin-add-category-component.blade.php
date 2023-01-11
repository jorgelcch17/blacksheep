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
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Nueva Categoria
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
                                        Nueva Categoria
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.categories') }}" class="btn btn-success float-end">All Categories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <form wire:submit.prevent="storeCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter category name" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Enter category slug" wire:model="slug">
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" wire:model="image">
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120">
                                        @endif
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label" for="is_popular">Popular</label>
                                        <select name="is_popular" class="form-control" wire:model="is_popular">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('is_popular')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label class="form-label" for="is_popular">Categoria padre</label>
                                        <select name="is_popular" class="form-control" wire:model="category_id">
                                            <option value="">None</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('is_popular')
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