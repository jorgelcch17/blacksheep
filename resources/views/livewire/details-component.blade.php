<div>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        .selected-tag {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }

        .wishlisted {
            background-color: #E30613 !important;
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
                    <a href="index.html" rel="nofollow">Inicio</a>
                    <span></span> {{ $product->category->name }}
                    <span></span> {{ $product->name }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery" wire:ignore>
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('assets/imgs/products') }}/{{ $product->image }}"
                                                    alt="product image">
                                            </figure>
                                            @php
                                                $images = explode(',', $product->images);
                                            @endphp
                                            @foreach ($images as $image)
                                                @if ($image)
                                                    <figure class="border-radius-10">
                                                        <img class="h-auto object-fit-fill"
                                                            src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                            alt="product image" style="width: 100%;">
                                                    </figure>
                                                @endif
                                            @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('assets/imgs/products') }}/{{ $product->image }}"
                                                    alt="product image">
                                            </figure>
                                            @foreach ($images as $image)
                                                {{-- <div><img src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                        alt="product image"></div> --}}
                                                @if ($image)
                                                    <figure class="border-radius-10">
                                                        <img src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                            alt="product image">
                                                    </figure>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    {{-- <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Compartir esto:</strong></li>
                                            <li class="social-facebook"><a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}"
                                                        alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img
                                                        src="{{ asset('assets/imgs/theme/icons/icon-pinterest.svg') }}"
                                                        alt=""></a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Marca: <a
                                                        href="shop.html">{{ $product->brand->name }}</a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> ({{ rand(1, 20) }}
                                                    reseñas)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if ($product->sale_price > 0)
                                                    <ins><span
                                                            class="text-brand">Bs{{ $product->sale_price }}</span></ins>
                                                    <ins><span
                                                            class="old-price font-md ml-15">Bs{{ $product->regular_price }}</span></ins>
                                                    <span class="save-price  font-md color3 ml-15">
                                                        {{-- calculando el porcentaje de descuento --}}
                                                        @php
                                                            $discount = (($product->regular_price - $product->sale_price) * 100) / $product->regular_price;
                                                        @endphp
                                                        {{ round($discount) }}% Desc.
                                                    </span>
                                                @else
                                                    <ins><span class="text-brand">Bs
                                                            {{ $product->regular_price }}</span></ins>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{!! $product->short_description !!}</p>
                                        </div>
                                        {{-- <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera
                                                    Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return
                                                    Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available
                                                </li>
                                            </ul>
                                        </div> --}}
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <ul class="list-filter size-filter font-small me-1">
                                                @foreach ($pvariants as $pvariant)
                                                    <li wire:click="goToVariant('{{ $pvariant->id }}','{{ $pvariant->slug }}')"
                                                        class="{{ $pvariant->color == $product->color ? 'active' : '' }}">
                                                        <a href="#">{{ $pvariant->color }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Talla</strong>
                                            <ul class="list-filter size-filter font-small">
                                                {{-- @if ($product->stock_status == 'instock') --}}
                                                @foreach ($psizes as $psize)
                                                    @if ($psize->quantity != 0)
                                                        <li wire:ignore.self><a href="#"
                                                                wire:click.prevent="$set('selected_size', {{ $psize->id }})">{{ $psize->size }}</a>
                                                        </li>
                                                    @else
                                                        <li class="position-relative" style="pointer-events: none">
                                                            <a class="text-white"
                                                                style="background: rgb(187, 187, 187);">{{ $psize->size }}</a>
                                                            <img class="position-absolute"
                                                                style="height: 18px; width:18px; top:-5px;right:-5px;"
                                                                src="{{ asset('assets/imgs/page/close-circle.png') }}"
                                                                alt="">
                                                        </li>
                                                    @endif
                                                @endforeach
                                                {{-- @elseif($product->stock_status == 'outofstock')
                                                    @foreach ($psizes as $psize)
                                                        <li class="position-relative" style="pointer-events: none">
                                                            <a class="text-white"
                                                                style="background: rgb(187, 187, 187);">{{ $psize->size }}</a>
                                                            <img class="position-absolute"
                                                                style="height: 18px; width:18px; top:-5px;right:-5px;"
                                                                src="{{ asset('assets/imgs/page/close-circle.png') }}"
                                                                alt="">
                                                        </li>
                                                    @endforeach
                                                @elseif($product->stock_status == 'preorder')
                                                    @foreach ($psizes as $psize)
                                                        <li wire:ignore.self><a href="#"
                                                                wire:click.prevent="$set('selected_size', {{ $psize->id }})">{{ $psize->size }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif --}}
                                            </ul>
                                            {{-- mensaje en rojo indicando que debe elejir una talla --}}
                                        </div>
                                        @if (Session::has('error_message'))
                                            <div class="text-danger" role="alert">
                                                {{ Session::get('error_message') }}
                                            </div>
                                        @endif
                                        @error('selected_size')
                                            <div class="text-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            {{-- <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i
                                                        class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val" wire:model="qty">{{ $qty }}</span>
                                                <a href="#" class="qty-up"><i
                                                        class="fi-rs-angle-small-up"></i></a>
                                            </div> --}}
                                            <div class="cart-product-quantity d-block mb-4">
                                                <div class="d-flex align-items-center">
                                                    <input type="button" value="-" class="rounded-circle p-0"
                                                        style="width: 34px; height: 34px;"
                                                        wire:click.prevent="decreaseQuantity">
                                                    @if ($qty_for_selected_size > 0)
                                                        <input type="number" name="quantity" value="0"
                                                            title="Qty" class="p-3 mx-2" size="4"
                                                            style="width: 50px; text-align:center;" wire:model="qty">
                                                    @else
                                                        <input type="number" name="quantity" value="0"
                                                            title="Qty" class="p-3 mx-2" size="4"
                                                            style="width: 50px; text-align:center;" disabled>
                                                    @endif
                                                    <input type="button" value="+" class="rounded-circle p-0"
                                                        style="width: 34px; height: 34px;"
                                                        wire:click.prevent="increaseQuantity">
                                                </div>
                                                @error('qty')
                                                    <div class="text-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="button" class="button button-add-to-cart"
                                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Añadir
                                                    al carrito</button>
                                                <a href="https://wa.me/591{{ $whatsapp }}" target="__blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="width:20px;hight:20px;">
                                                        <title>whatsapp</title>
                                                        <path
                                                            d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z" />
                                                    </svg>
                                                </a>
                                                @php
                                                    $witems = Cart::instance('wishlist')
                                                        ->content()
                                                        ->pluck('id');
                                                @endphp
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
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            @if ($product->sku)
                                                <li class="mb-5">SKU: <a href="#">{{ $product->SKU }}</a>
                                                </li>
                                            @endif
                                            <li class="mb-5">Etiquetas:
                                                @if ($product->tags->count() > 0)
                                                    @foreach ($product->tags as $tag)
                                                        <a href="#" rel="tag">{{ $tag->name }}</a>,
                                                    @endforeach
                                                @else
                                                    <a href="#" style="color: black;">Sin etiquetas</a>
                                                @endif
                                            </li>
                                            <li>Disponibilidad:

                                                @if ($qty_for_selected_size > 0)
                                                    <span
                                                        class="in-stock text-success ml-5">{{ $qty_for_selected_size }}
                                                        disponible(s)</span>
                                                @else
                                                    <span class="in-stock text-danger ml-5 fw-bold">Sin
                                                        existencias</span>
                                                @endif

                                                {{-- @if ($qty_for_selected_size > 0 && $product->stock_status === 'instock')
                                                        <span
                                                            class="in-stock text-success ml-5">{{ $qty_for_selected_size }}
                                                            disponible(s)</span>
                                                    @elseif($product->stock_status === 'outofstock')
                                                        <span class="in-stock text-danger ml-5 fw-bold">Sin
                                                            existencias</span>
                                                    @elseif($product->stock_status === 'preorder')
                                                        <span class="in-stock text-warning ml-5 fw-bold">A pedido</span>
                                                    @endif --}}

                                                {{-- @if ($qty_for_selected_size > 0 && $qty_for_selected_size !== 'No disponible')
                                                    <span
                                                        class="in-stock text-success ml-5">{{ $qty_for_selected_size }}
                                                        unidades
                                                        disponibles</span>
                                                @else
                                                    @if ($qty_for_selected_size === 'No disponible')
                                                        <span class="in-stock text-danger ml-5 fw-bold">No hay unidades
                                                            disponibles</span>
                                                    @else
                                                        <span class="text-info">Seleccione una talla</span>
                                                    @endif
                                                @endif --}}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                            href="#Description">Descripción</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                            href="#Additional-info">Detalles adicionales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab"
                                            href="#Reviews">Reseñas (3)</a>
                                    </li> --}}
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {!! $product->description !!}
                                            {{-- <p>Uninhibited carnally hired played in whimpered dear gorilla koala
                                                depending and much yikes off far quetzal goodness and from for grimaced
                                                goodness unaccountably and meadowlark near unblushingly crucial scallop
                                                tightly neurotic hungrily some and dear furiously this apart.</p>
                                            <p>Spluttered narrowly yikes left moth in yikes bowed this that grizzly much
                                                hello on spoon-fed that alas rethought much decently richly and wow
                                                against the frequent fluidly at formidable acceptably flapped
                                                besides and much circa far over the bucolically hey precarious goldfinch
                                                mastodon goodness gnashed a jellyfish and one however because.
                                            </p>
                                            <ul class="product-more-infor mt-30">
                                                <li><span>Type Of Packing</span> Bottle</li>
                                                <li><span>Color</span> Green, Pink, Powder Blue, Purple</li>
                                                <li><span>Quantity Per Case</span> 100ml</li>
                                                <li><span>Ethyl Alcohol</span> 70%</li>
                                                <li><span>Piece In One</span> Carton</li>
                                            </ul>
                                            <hr class="wp-block-separator is-style-dots">
                                            <p>Laconic overheard dear woodchuck wow this outrageously taut beaver hey
                                                hello far meadowlark imitatively egregiously hugged that yikes minimally
                                                unanimous pouted flirtatiously as beaver beheld above forward
                                                energetic across this jeepers beneficently cockily less a the raucously
                                                that magic upheld far so the this where crud then below after jeez
                                                enchanting drunkenly more much wow callously irrespective limpet.</p>
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide">
                                            <p>Less lion goodness that euphemistically robin expeditiously bluebird
                                                smugly scratched far while thus cackled sheepishly rigid after due one
                                                assenting regarding censorious while occasional or this more crane
                                                went more as this less much amid overhung anathematic because much held
                                                one exuberantly sheep goodness so where rat wry well concomitantly.
                                            </p>
                                            <p>Scallop or far crud plain remarkably far by thus far iguana lewd
                                                precociously and and less rattlesnake contrary caustic wow this near
                                                alas and next and pled the yikes articulate about as less cackled
                                                dalmatian
                                                in much less well jeering for the thanks blindly sentimental whimpered
                                                less across objectively fanciful grimaced wildly some wow and rose
                                                jeepers outgrew lugubrious luridly irrationally attractively
                                                dachshund.
                                            </p> --}}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>Stand Up</th>
                                                    <td>
                                                        <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>Folded (w/o wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 18.5″W x 16.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>Folded (w/ wheels)</th>
                                                    <td>
                                                        <p>32.5″L x 24″W x 18.5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="door-pass-through">
                                                    <th>Door Pass Through</th>
                                                    <td>
                                                        <p>24</p>
                                                    </td>
                                                </tr>
                                                <tr class="frame">
                                                    <th>Frame</th>
                                                    <td>
                                                        <p>Aluminum</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-wo-wheels">
                                                    <th>Weight (w/o wheels)</th>
                                                    <td>
                                                        <p>20 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="weight-capacity">
                                                    <th>Weight Capacity</th>
                                                    <td>
                                                        <p>60 LBS</p>
                                                    </td>
                                                </tr>
                                                <tr class="width">
                                                    <th>Width</th>
                                                    <td>
                                                        <p>24″</p>
                                                    </td>
                                                </tr>
                                                <tr class="handle-height-ground-to-handle">
                                                    <th>Handle height (ground to handle)</th>
                                                    <td>
                                                        <p>37-45″</p>
                                                    </td>
                                                </tr>
                                                <tr class="wheels">
                                                    <th>Wheels</th>
                                                    <td>
                                                        <p>12″ air / wide track slick tread</p>
                                                    </td>
                                                </tr>
                                                <tr class="seat-back-height">
                                                    <th>Seat back height</th>
                                                    <td>
                                                        <p>21.5″</p>
                                                    </td>
                                                </tr>
                                                <tr class="head-room-inside-canopy">
                                                    <th>Head room (inside canopy)</th>
                                                    <td>
                                                        <p>25″</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_color">
                                                    <th>Color</th>
                                                    <td>
                                                        <p>Black, Blue, Red, White</p>
                                                    </td>
                                                </tr>
                                                <tr class="pa_size">
                                                    <th>Size</th>
                                                    <td>
                                                        <p>M, S</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Preguntas y Respuestas de los clientes</h4>
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{ asset('assets/imgs/page/avatar-6.jpg') }}"
                                                                        alt="">
                                                                    <h6><a href="#">Jacky Chan</a></h6>
                                                                    <p class="font-xxs">Desde 2012</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>gracias por el envío muy rápido desde Polonia
                                                                        solo en 3 días.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">Diciembre 4, 2020
                                                                                at 3:12 pm </p>
                                                                            <a href="#"
                                                                                class="text-brand btn-reply">Responder
                                                                                <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{ asset('assets/imgs/page/avatar-7.jpg') }}"
                                                                        alt="">
                                                                    <h6><a href="#">Ana Rosie</a></h6>
                                                                    <p class="font-xxs">Desde 2008</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Gran precio bajo y funciona bien.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">Diciembre 4, 2020
                                                                                at 3:12 pm </p>
                                                                            <a href="#"
                                                                                class="text-brand btn-reply">Responder
                                                                                <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="{{ asset('assets/imgs/page/avatar-8.jpg') }}"
                                                                        alt="">
                                                                    <h6><a href="#">Steven Keny</a></h6>
                                                                    <p class="font-xxs">Desde 2010</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>auténticos y hermosos, amo estos mucho más de lo
                                                                        que alguna vez esperé. Son unos excelentes
                                                                        auriculares.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">Diciembre 4, 2020
                                                                                at 3:12 pm </p>
                                                                            <a href="#"
                                                                                class="text-brand btn-reply">Responder
                                                                                <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Reseñas de los clientes</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <h6>4.8 de 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 estrellas</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100">50%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 estrellas</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 25%;" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100">25%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 estrellas</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 45%;" aria-valuenow="45" aria-valuemin="0"
                                                            aria-valuemax="100">45%</div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 estrellas</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 65%;" aria-valuenow="65" aria-valuemin="0"
                                                            aria-valuemax="100">65%</div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 estrella</span>
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: 85%;" aria-valuenow="85" aria-valuemin="0"
                                                            aria-valuemax="100">85%</div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">¿Cómo se calculan las
                                                        puntuaciones?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Agrega una reseña</h4>
                                            <div class="product-rate d-inline-block mb-30">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#"
                                                        id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                                        placeholder="Escribe un comentario"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name"
                                                                        id="name" type="text"
                                                                        placeholder="Nombre">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email"
                                                                        id="email" type="email"
                                                                        placeholder="Correo">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website"
                                                                        id="website" type="text"
                                                                        placeholder="sitio web">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                class="button button-contactForm">Enviar
                                                                Reseña</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">Productos relacionados</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products" wire:ignore>
                                        @foreach ($rproducts as $rproduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('product.details', ['id' => $product->id, 'slug' => $product->slug]) }}"
                                                                tabindex="0">
                                                                <img class="default-img"
                                                                    src="{{ asset('assets/imgs/products') }}/{{ $rproduct->image }}"
                                                                    alt="{{ $rproduct->name }}">
                                                                {{-- imprimiendo la segunda imagen que esta en el campo de images --}}
                                                                @php
                                                                    $simages = explode(',', $rproduct->images);
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
                                                        {{-- <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">En demanda</span>
                                                        </div> --}}
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{ route('product.details', ['id' => $product->id, 'slug' => $product->slug]) }}"
                                                                tabindex="0">{{ $rproduct->name }}</a></h2>
                                                        {{-- <div class="rating-result" title="90%">
                                                            <span>
                                                                90%
                                                            </span>
                                                        </div> --}}
                                                        <div class="product-price">
                                                            <span>Bs {{ $rproduct->regular_price }} </span>
                                                            {{-- <span class="old-price">$245.8</span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar" wire:ignore>
                        <!-- Product sidebar Widget -->
                        <div
                            class="sidebar-widget product-sidebar sticky-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Nuevos Productos</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach ($nproducts as $nproduct)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{ asset('assets/imgs/products') }}/{{ $nproduct->image }}"
                                            alt="{{ $nproduct->name }}">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a
                                                href="{{ route('product.details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $nproduct->name }}</a>
                                        </h5>
                                        <p class="price mb-0 mt-5">Bs {{ $nproduct->regular_price }}</p>
                                        {{-- <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
