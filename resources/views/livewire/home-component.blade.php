<div>
    <main class="main">
        <section class="home-slider position-relative pt-50">
            <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
                @foreach ($slides as $slide)
                    <div class="single-hero-slider single-animation-wrap">
                        <div class="container">
                            <div class="row align-items-center slider-animated-1">
                                <div class="col-lg-5 col-md-6">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{ $slide->top_title }}</h4>
                                        <h2 class="animated fw-900">{{ $slide->title }}</h2>
                                        <h1 class="animated fw-900 text-brand">{{ $slide->sub_title }}</h1>
                                        <p class="animated">{{ $slide->offer }}</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="{{ $slide->link }}"> Compra
                                            ahora
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="single-slider-img single-slider-img-1">
                                        <img class="animated slider-1-1"
                                            src="{{ asset('assets/imgs/slider') }}/{{ $slide->image }}"
                                            alt="{{ $slide->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </section>
        <section class="featured section-padding position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                            <h4 class="bg-1">Envío gratis</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                            <h4 class="bg-3">Compra en línea</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                            <h4 class="bg-2">Ahorra dinero</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                            <h4 class="bg-4">Promociones</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                            <h4 class="bg-5">Venta Feliz</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                        <div class="banner-features wow fadeIn animated hover-up">
                            <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                            <h4 class="bg-6">Soporte 24/7</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @if ($fproducts->count() > 0)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                    aria-selected="true">Destacados</button>
                            </li>
                        @endif
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                type="button" role="tab" aria-controls="tab-two"
                                aria-selected="false">Populares</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                type="button" role="tab" aria-controls="tab-three"
                                aria-selected="false">Recientes</button>
                        </li>
                    </ul>
                    <a href="#" class="view-more d-none d-md-flex">Ver más<i
                            class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    @if ($fproducts->count() > 0)
                    <div class="tab-pane fade  {{ $tabs == 1 ? 'show active':'' }}" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach ($fproducts as $fproduct)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a
                                                    href="{{ route('product.details', ['id' => $fproduct->id, 'slug' => $fproduct->slug]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/products') }}/{{ $fproduct->image }}"
                                                        alt="">
                                                    {{-- imprimiendo la segunda imagen que esta en el campo de images --}}
                                                    @php
                                                        $fimages = explode(',', $fproduct->images);
                                                        // convertir array a collection
                                                        $fimages = collect($fimages);
                                                    @endphp
                                                    @foreach ($fimages as $image)
                                                        @if ($loop->index == 1)
                                                            <img class="hover-img"
                                                                src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                                alt="">
                                                        @endif
                                                    @endforeach
                                                </a>
                                            </div>
                                            {{-- <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div> --}}
                                            {{-- <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">En demanda</span>
                                            </div> --}}
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">{{ $fproduct->category->name }}</a>
                                            </div>
                                            <h2><a
                                                    href="{{ route('product.details', ['id' => $fproduct->id, 'slug' => $fproduct->slug]) }}">{{ $fproduct->name }}</a>
                                            </h2>
                                            {{-- <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div> --}}
                                            <div class="product-price">
                                                @if ($fproduct->sale_price > 0)
                                                    <span>Bs {{ $fproduct->sale_price }} </span>
                                                    <span class="old-price">Bs {{ $fproduct->regular_price }}</span>
                                                @else
                                                    <span>Bs {{ $fproduct->regular_price }} </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    @endif
                    <!--En tab one (Featured)-->
                    <div class="tab-pane fade  {{ $tabs == 2 ? 'show active':'' }}" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                            @foreach ($popular_products as $popular_product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                    href="{{ route('product.details', ['id' => $popular_product->id, 'slug' => $popular_product->slug]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/products') }}/{{ $popular_product->image }}"
                                                        alt="">
                                                    {{-- imprimiendo la segunda imagen que esta en el campo de images --}}
                                                    @php
                                                        $pimages = explode(',', $popular_product->images);
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
                                        {{-- <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div> --}}
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Popular</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('product.category', ['category_slug' => $popular_product->category->slug]) }}">{{ $popular_product->category->name }}</a>
                                        </div>
                                        <h2><a href="{{ route('product.details', ['id' => $popular_product->id, 'slug' => $popular_product->slug]) }}">{{ $popular_product->name }}</a></h2>
                                        {{-- <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div> --}}
                                        <div class="product-price">
                                            @if ($popular_product->sale_price > 0)
                                                <span>Bs {{ $popular_product->sale_price }} </span>
                                                <span class="old-price">Bs {{ $popular_product->regular_price }}</span>
                                            @else
                                                <span>Bs {{ $popular_product->regular_price }} </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two (Popular)-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">
                            @foreach ($recent_products as $recent_product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a
                                                    href="{{ route('product.details', ['id' => $recent_product->id, 'slug' => $recent_product->slug]) }}">
                                                    <img class="default-img"
                                                        src="{{ asset('assets/imgs/products') }}/{{ $recent_product->image }}"
                                                        alt="">
                                                    {{-- imprimiendo la segunda imagen que esta en el campo de images --}}
                                                    @php
                                                        $recent_images = explode(',', $recent_product->images);
                                                        // convertir array a collection
                                                        $recent_images = collect($recent_images);
                                                    @endphp
                                                    @foreach ($recent_images as $image)
                                                        @if ($loop->index == 1)
                                                            <img class="hover-img"
                                                                src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                                alt="">
                                                        @endif
                                                    @endforeach
                                                </a>
                                        </div>
                                        {{-- <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                                data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                                    class="fi-rs-eye"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                    class="fi-rs-shuffle"></i></a>
                                        </div> --}}
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Reciente</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{ route('product.category', ['category_slug' => $recent_product->category->slug]) }}">{{ $recent_product->category->name }}</a>
                                        </div>
                                        <h2><a href="{{ route('product.details', ['id' => $recent_product->id, 'slug' => $recent_product->slug]) }}">{{ $recent_product->name }}</a></h2>
                                        {{-- <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div> --}}
                                        <div class="product-price">
                                            @if ($popular_product->sale_price > 0)
                                                <span>Bs {{ $popular_product->sale_price }} </span>
                                                <span class="old-price">Bs {{ $popular_product->regular_price }}</span>
                                            @else
                                                <span>Bs {{ $popular_product->regular_price }} </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three (New added)-->
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <section class="banner-2 section-padding pb-0">
            <div class="container">
                <div class="banner-img banner-big wow fadeIn animated f-none">
                    <img src="assets/imgs/banner/banner-4.png" alt="">
                    <div class="banner-text d-md-block d-none">
                        <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                        <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                        <a href="shop.html" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Categorías</span> Populares</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
                    </div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        @foreach ($pcategories as $pcategory)
                            <div class="card-1">
                                <figure class=" img-hover-scale overflow-hidden">
                                    <a href="{{ route('product.category', $pcategory->slug) }}"><img
                                            src="{{ asset('assets/imgs/categories') }}/{{ $pcategory->image }}"></a>
                                </figure>
                                <h5><a href="shop.html">{{ $pcategory->name }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="banners mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-1.png" alt="">
                            <div class="banner-text">
                                <span>Smart Offer</span>
                                <h4>Save 20% on <br>Woman Bag</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-2.png" alt="">
                            <div class="banner-text">
                                <span>Sale off</span>
                                <h4>Great Summer <br>Collection</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="assets/imgs/banner/banner-3.png" alt="">
                            <div class="banner-text">
                                <span>New Arrivals</span>
                                <h4>Shop Today’s <br>Deals & Offers</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>Nuevas</span> Llegadas</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                        id="carausel-6-columns-2-arrows"></div>
                    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                        @foreach ($lproducts as $lproduct)
                            <div class="product-cart-wrap small hover-up">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a
                                            href="{{ route('product.details', ['id' => $lproduct->id, 'slug' => $lproduct->slug]) }}">
                                            <img class="default-img"
                                                src="{{ asset('assets/imgs/products') }}/{{ $lproduct->image }}"
                                                alt="{{ $lproduct->name }}">
                                            @php
                                                $limages = explode(',', $lproduct->images);
                                                // convertir array a collection
                                                $limages = collect($limages);
                                            @endphp
                                            @foreach ($limages as $image)
                                                @if ($loop->index == 1)
                                                    <img class="hover-img"
                                                        src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                        alt="">
                                                @endif
                                            @endforeach
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        {{-- <a aria-label="Quick view" class="action-btn small hover-up"
                                            data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fi-rs-eye"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                            href="wishlist.php" tabindex="0"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn small hover-up"
                                            href="compare.php" tabindex="0"><i class="fi-rs-shuffle"></i></a> --}}
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="new">Nuevo</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <h2><a href="{{ route('product.details', ['id' => $lproduct->id, 'slug' => $lproduct->slug]) }}">{{ $lproduct->name }}</a></h2>
                                    {{-- <div class="rating-result" title="90%">
                                        <span>
                                            90%
                                        </span>
                                    </div> --}}
                                    <div class="product-price">
                                        @if ($lproduct->sale_price > 0)
                                            <span>Bs{{ $lproduct->sale_price }}</span>
                                            <span class="old-price">Bs{{ $lproduct->regular_price }}</span>
                                        @else
                                            <span>Bs{{ $lproduct->regular_price }} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="section-padding">
            <div class="container">
                <h3 class="section-title mb-20 wow fadeIn animated"><span>Nuestras</span> Marcas</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow"
                        id="carausel-6-columns-3-arrows"></div>
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        @foreach ($brands as $brand)
                            <div class="brand-logo">
                                <img class="img-grey-hover"
                                    src="{{ asset('assets/imgs/brands') }}/{{ $brand->logo }}"
                                    alt="logo {{ $brand->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
