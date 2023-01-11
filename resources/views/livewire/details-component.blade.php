<div>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
                                    <div class="social-icons single-share">
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
                                    </div>
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
                                                <span class="font-small ml-5 text-muted"> (25 reseñas)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                @if ($product->sale_price > 0)
                                                <ins><span class="text-brand">Bs{{ $product->sale_price }}</span></ins>
                                                    <ins><span class="old-price font-md ml-15">Bs{{ $product->regular_price }}</span></ins>
                                                    <span class="save-price  font-md color3 ml-15">
                                                        {{-- calculando el porcentaje de descuento --}}
                                                        @php
                                                            $discount = ($product->regular_price - $product->sale_price) * 100 / $product->regular_price;
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
                                            <p>{{ $product->short_description }}</p>
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
                                                    <li wire:click="goToVariant('{{ $pvariant->slug }}')"
                                                        class="{{ $pvariant->color == $product->color ? 'active' : '' }}">
                                                        <a href="#">{{ $pvariant->color }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Talla</strong>
                                            <ul class="list-filter size-filter font-small">
                                                @foreach ($psizes as $psize)
                                                    @if ($psize->quantity != 0)
                                                        <li wire:ignore.self><a href="#"
                                                                wire:click.prevent="$set('selected_size', {{ $psize->id }})">{{ $psize->size }}</a>
                                                        </li>
                                                    @else
                                                        <li class="position-relative" style="pointer-events: none"><a
                                                                class="text-white"
                                                                style="background: rgb(187, 187, 187);">{{ $psize->size }}</a>
                                                            <img class="position-absolute"
                                                                style="height: 18px; width:18px; top:-5px;right:-5px;"
                                                                src="{{ asset('assets/imgs/page/close-circle.png') }}"
                                                                alt="">
                                                            {{--  --}}
                                                        </li>
                                                    @endif
                                                @endforeach
                                                {{-- <li class="active"><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                                <li><a href="#">XXL</a></li> --}}
                                            </ul>
                                        </div>
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
                                                    <input type="number" name="quantity" value="1" title="Qty"
                                                        class="p-3 mx-2" size="4"
                                                        style="width: 50px; text-align:center;" wire:model="qty">
                                                    <input type="button" value="+" class="rounded-circle p-0"
                                                        style="width: 34px; height: 34px;"
                                                        wire:click.prevent="increaseQuantity">
                                                </div>
                                            </div>
                                            <div class="product-extra-link2">
                                                {{-- <button type="button" class="button button-add-to-cart"
                                                    wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})">Añadir
                                                    al carrito</button> --}}
                                                <button onclick="window.open('https://wa.me/59175853156', '_blank')"
                                                    class="button button-add-to-cart">Comprar por whatsapp</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="#"
                                                    wire:click.prevent="addToWishlist({{ $product->id }}, '{{ $product->name }}', {{ $product->regular_price }})"><i
                                                        class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">{{ $product->SKU }}</a></li>
                                            <li class="mb-5">Etiquetas: <a href="#" rel="tag">Cloth</a>,
                                                <a href="#" rel="tag">Women</a>, <a href="#"
                                                    rel="tag">Dress</a>
                                            </li>
                                            <li>Disponibilidad:
                                                @if ($qty_for_selected_size > 0 && $qty_for_selected_size !== 'No disponible')
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
                                                @endif

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
                                            {{ $product->description }}
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
                                    <div class="row related-products">
                                        @foreach ($rproducts as $rproduct)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap small hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="{{ route('product.details', $rproduct->slug) }}"
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
                                                                    @if ($loop->index == 1)
                                                                        <img class="hover-img"
                                                                            src="{{ asset('assets/imgs/products') }}/{{ $image }}"
                                                                            alt="">
                                                                    @endif
                                                                @endforeach
                                                            </a>
                                                        </div>
                                                        <div class="product-action-1">
                                                            <a aria-label="Quick view"
                                                                class="action-btn small hover-up"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quickViewModal"><i
                                                                    class="fi-rs-search"></i></a>
                                                            <a aria-label="Add To Wishlist"
                                                                class="action-btn small hover-up" href="wishlist.php"
                                                                tabindex="0"><i class="fi-rs-heart"></i></a>
                                                            <a aria-label="Compare" class="action-btn small hover-up"
                                                                href="compare.php" tabindex="0"><i
                                                                    class="fi-rs-shuffle"></i></a>
                                                        </div>
                                                        <div
                                                            class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">En demanda</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="{{ route('product.details', $rproduct->slug) }}"
                                                                tabindex="0">{{ $rproduct->name }}</a></h2>
                                                        <div class="rating-result" title="90%">
                                                            <span>
                                                            </span>
                                                        </div>
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
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Categorías</h5>
                            <ul class="categories">
                                <li><a href="shop.html">Shoes & Bags</a></li>
                                <li><a href="shop.html">Blouses & Shirts</a></li>
                                <li><a href="shop.html">Dresses</a></li>
                                <li><a href="shop.html">Swimwear</a></li>
                                <li><a href="shop.html">Beauty</a></li>
                                <li><a href="shop.html">Jewelry & Watch</a></li>
                                <li><a href="shop.html">Accessories</a></li>
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar sticky-sidebar  mb-30 p-30 bg-grey border-radius-10">
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
                                                href="{{ route('product.details', $nproduct->slug) }}">{{ $nproduct->name }}</a>
                                        </h5>
                                        <p class="price mb-0 mt-5">Bs {{ $nproduct->regular_price }}</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width:90%"></div>
                                        </div>
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
