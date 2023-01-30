<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .wishlisted {
            background-color: #F15412 !important;
            BORDER: 1px solid transparent !important;
        }

        .wishlisted i {
            color: #fff !important;
        }

        .product-cart-wrap .product-action-1 button::after,
        .product-cart-wrap .product-action-1 a.action-btn::after {
            left: -32%;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Lista de deseos
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row product-grid-4">
                    @if (Cart::instance('wishlist')->count() > 0)
                        @foreach (Cart::instance('wishlist')->content() as $item)
                            <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                href="{{ route('product.details', ['id' => $item->model->id, 'slug' => $item->model->slug]) }}">
                                                <img class="default-img"
                                                    src="{{ asset('assets/imgs/products') }}/{{ $item->model->image }}"
                                                    alt="{{ $item->model->name }}">
                                                {{-- imprimiendo la segunda imagen que esta en el campo de images --}}
                                                @php
                                                    $simages = explode(',', $item->model->images);
                                                    // convertir array a collection
                                                    $simages = collect($simages);
                                                @endphp
                                                @foreach ($simages as $image)
                                                    @if ($loop->index == 0)
                                                        <img class="hover-img"
                                                            src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                            alt="">
                                                    @endif
                                                @endforeach
                                            </a>
                                        </div>
                                        {{-- <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div> --}}
                                        {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div> --}}
                                    </div>



                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a
                                                href="{{ route('product.category', $item->model->category->slug) }}">{{ $item->model->category->name }}</a>
                                        </div>
                                        <h2><a
                                                href="{{ route('product.details', ['id' => $item->model->id, 'slug' => $item->model->slug]) }}">{{ $item->model->name }}</a>
                                        </h2>
                                        {{-- <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div> --}}
                                        <div class="product-price">
                                            @if ($item->model->sale_price > 0)
                                                    <span>Bs {{ $item->model->sale_price }} </span>
                                                    <span class="old-price">Bs {{ $item->model->regular_price }}</span>
                                                @else
                                                    <span>Bs {{ $item->model->regular_price }} </span>
                                                @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            @php
                                                $witems = Cart::instance('wishlist')
                                                    ->content()
                                                    ->pluck('id');
                                            @endphp
                                            @if ($witems->contains($item->model->id))
                                                <a aria-label="Remover de mi lista de deseos"
                                                    class="action-btn hover-up wishlisted" href="wishlist.php"
                                                    wire:click.prevent="removeFromWishlist({{ $item->model->id }})"><i
                                                        class="fi-rs-heart"></i></a>
                                            @else
                                                <a aria-label="Agregar a mi lista de deseos" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent="addToWishlist({{ $item->model->id }},'{{ $item->model->name }}', {{ $item->model->regular_price }})"><i
                                                        class="fi-rs-heart"></i></a>
                                            @endif
                                            {{-- <a aria-label="Add To Cart" class="action-btn hover-up"
                                                wire:click.prevent="store({{ $item->model->id }}, '{{ $item->model->name }}', {{ $item->model->regular_price }})"
                                                href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="fs-4 text-center mb-3">Lista de deseos vacias</p>
                        <div class="d-flex justify-content-center">
                            <a name="" id="" class="btn btn-primary" href="{{ route('shop') }}"
                                role="button">Ir a la
                                tienda</a>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </main>
</div>
