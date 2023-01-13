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
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Inicio</a>
                    <span></span> Tienda
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> Se ha encontrado <strong class="text-brand">{{ $products->total() }}</strong>
                                    productos para ti!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Mostrando:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $pageSize }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $pageSize == 12 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a class="{{ $pageSize == 15 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a class="{{ $pageSize == 25 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(25)">25</a></li>
                                            <li><a class="{{ $pageSize == 32 ? 'active' : '' }}" href="#"
                                                    wire:click.prevent="changePageSize(32)">32</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Ordenar:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $orderBy }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="{{ $orderBy == 'por defecto' ? 'active' : '' }}"
                                                    href="#" wire:click.prevent="changeOrderBy('por defecto')">por
                                                    defecto</a>
                                            </li>
                                            <li><a class="{{ $orderBy == 'Precio: Bajo a alto' ? 'active' : '' }}"
                                                    href="#"
                                                    wire:click.prevent="changeOrderBy('Precio: Bajo a alto')">Precio:
                                                    Bajo a alto</a></li>
                                            <li><a class="{{ $orderBy == 'Precio: Alto a bajo' ? 'active' : '' }}"
                                                    href="#"
                                                    wire:click.prevent="changeOrderBy('Precio: Alto a bajo')">Precio:
                                                    Alto a bajo</a></li>
                                            <li><a class="{{ $orderBy == 'mas recientes' ? 'active' : '' }}"
                                                    href="#"
                                                    wire:click.prevenet="changeOrderBy('mas recientes')">más
                                                    recientes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @php
                                $witems = Cart::instance('wishlist')
                                    ->content()
                                    ->pluck('id');
                            @endphp
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('product.details', $product->slug) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/products') }}/{{ $product->image }}"
                                                        alt="{{ $product->name }}">
                                                    {{-- imprimiendo la segunda imagen que esta en el campo de images --}}
                                                    @php
                                                        $pimages = explode(',', $product->images);
                                                        // convertir array a collection
                                                        $pimages = collect($pimages);
                                                    @endphp
                                                    @foreach ($pimages as $image)
                                                        @if ($loop->index == 1)
                                                            <img class="hover-img"
                                                                src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                                alt="">
                                                        @endif
                                                    @endforeach
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">En demanda</span>
                                            </div> --}}
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">{{ $product->category->name }}</a>
                                            </div>
                                            <h2><a
                                                    href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                            </h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                @if ($product->sale_price > 0)
                                                    <span>Bs {{ $product->sale_price }} </span>
                                                    <span class="old-price">Bs {{ $product->regular_price }}</span>
                                                @else
                                                    <span>Bs {{ $product->regular_price }} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                @if ($witems->contains($product->id))
                                                    <a aria-label="Remover de mi lista de deseos"
                                                        class="action-btn hover-up wishlisted" href="wishlist.php"
                                                        wire:click.prevent="removeFromWishlist({{ $product->id }})"><i
                                                            class="fi-rs-heart"></i></a>
                                                @else
                                                    <a aria-label="Agregar a mi lista de deseos"
                                                        class="action-btn hover-up" href="#"
                                                        wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}', {{ $product->regular_price }})"><i
                                                            class="fi-rs-heart"></i></a>
                                                @endif
                                                <a aria-label="Agregar al carrito" class="action-btn hover-up"
                                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})"
                                                    href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            {{ $products->links() }}
                             {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul>
                            </nav> --}}
                        
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">
                    <div class="row">
                        <div class="col-lg-12 col-mg-6"></div>
                        <div class="col-lg-12 col-mg-6"></div>
                    </div>
                    <<div class="widget-category mb-30" x-data="{ openCategory: null }">
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Categorías</h5>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('product.category', $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                    <a href="#"
                                        @click.prevent="openCategory === {{ $category->id }} ? openCategory = null : openCategory = {{ $category->id }}"><svg
                                            style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                                        </svg>
                                    </a>
                                    <ul class="sub-menu" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="opacity-0 transform"
                                        x-transition:enter-end="opacity-100 transform"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="opacity-100 transform"
                                        x-transition:leave-end="opacity-0 transform"
                                        x-show="openCategory === {{ $category->id }}">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{ route('product.category', $subcategory->slug) }}"
                                                    style="padding-left: 20px;">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                </div>

                <!-- Fillter By Price -->
                <div class="sidebar-widget price_range range mb-30">
                    <div class="widget-header position-relative mb-20 pb-10">
                        <h5 class="widget-title mb-10">Filtrar por precio</h5>
                        <div class="bt-1 border-color-1"></div>
                    </div>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" wire:ignore></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <span>Rango:</span><span class="text-info">Bs {{ $min_value }}</span> -
                                    <span class="text-info">Bs {{ $max_value }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Etiquetas</label>

                            {{-- <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox1" value="">
                                    <label class="form-check-label" for="exampleCheckbox1"><span>Rojo
                                            (56)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox2" value="">
                                    <label class="form-check-label" for="exampleCheckbox2"><span>Verde
                                            (78)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Azul
                                            (54)</span></label>
                                </div>
                                <label class="fw-900 mt-15">Condicion del producto</label>
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox11" value="">
                                    <label class="form-check-label" for="exampleCheckbox11"><span>Nuevo
                                            (1506)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox21" value="">
                                    <label class="form-check-label" for="exampleCheckbox21"><span>Reacondicionado
                                            (27)</span></label>
                                    <br>
                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                        id="exampleCheckbox31" value="">
                                    <label class="form-check-label" for="exampleCheckbox31"><span>Usado
                                            (45)</span></label>
                                </div> --}}
                        </div>
                    </div>
                    <a href="shop.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i>
                        Filtrar</a>
                </div>
                <!-- Product sidebar Widget -->
                <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                    <div class="widget-header position-relative mb-20 pb-10">
                        <h5 class="widget-title mb-10">Nuevos productos</h5>
                        <div class="bt-1 border-color-1"></div>
                    </div>
                    @foreach ($nproducts as $nproduct)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ 'assets/imgs/products' }}/{{ $nproduct->image }}"
                                    alt="{{ $nproduct->name }}">
                            </div>
                            <div class="content pt-10">
                                <h5><a href="product-details.html">{{ $nproduct->name }}</a></h5>
                                @if ($nproduct->sale_price > 0)
                                    <p class="price mb-0 mt-5">Bs {{ $nproduct->sale_price }}</p>
                                @else
                                    <p class="price mb-0 mt-5">Bs {{ $nproduct->regular_price }}</p>
                                @endif
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                    <img src="{{ 'assets/imgs/banner/banner-11.jpg' }}" alt="">
                    <div class="banner-text">
                        <span>Women Zone</span>
                        <h4>Save 17% on <br>Office Dress</h4>
                        <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
</div>
</div>
</section>
</main>
</div>

@push('scripts')
    <script>
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function() {
            sliderrange.slider({
                range: true,
                min: 0,
                max: 1000,
                values: [0, 1000],
                slide: function(event, ui) {
                    // amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
                    @this.set('min_value', ui.values[0]);
                    @this.set('max_value', ui.values[1]);
                }
            });
        });
    </script>
@endpush
