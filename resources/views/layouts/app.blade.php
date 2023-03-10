<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Black Sheep</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/logo/isotipo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toggle-bs5.css') }}">
    @livewireStyles
    
    @yield('css')
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4" style="visibility: hidden;">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i>
                                        English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="assets/imgs/theme/flag-fr.png"
                                                    alt="">Français</a></li>
                                        <li><a href="#"><img src="assets/imgs/theme/flag-dt.png"
                                                    alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="assets/imgs/theme/flag-ru.png"
                                                    alt="">Pусский</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Obtén jeans con un 50% de descuento.<a href="shop.html">Ver detalles</a></li>
                                    <li>Ofertas de gran valor - Ahorra más con cupones</li>
                                    <li>Dia de la madre, ahorra hasta un 35% hoy. <a href="shop.html">Comprar ahora</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            @auth
                                <ul>
                                    <li>
                                        <i class="fi-rs-user"></i>{{ Auth::user()->name }} /
                                        <form method="post" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();">Salir</a>
                                        </form>
                                    </li>
                                </ul>
                            @else
                                <ul>
                                    <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Iniciar sesión </a> / <a
                                            href="{{ route('register') }}">Registrarse</a></li>
                                </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/logo/logo_for_web.png') }}"
                                alt="isologo black sheep"></a>
                    </div>
                    <div class="header-right">

                        @livewire('header-search-component')

                        {{-- oculto al cliente --}}
                        <div class="header-action-right">
                            <div class="header-action-2">

                                @livewire('wishlist-icon-component')

                                @livewire('cart-icon-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="/"><img style="height: 50px; width: auto; object-fit: contain"
                                src="{{ asset('assets/imgs/logo/logo_for_web.png') }}" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        @livewire('explore-categories-component')
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}"
                                            href="/">Inicio </a></li>
                                    <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}"
                                            href="{{ route('about') }}">Nosotros</a></li>
                                    <li><a class="{{ request()->routeIs('shop') ? 'active' : '' }}"
                                            href="{{ route('shop') }}">Tienda</a></li>
                                    {{-- <li class="position-static"><a href="#">Colecciones <i
                                                class="fi-rs-angle-down"></i></a>
                                        <ul class="mega-menu">
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Women's Fashion</a>
                                                <ul>
                                                    <li><a href="product-details.html">Dresses</a></li>
                                                    <li><a href="product-details.html">Blouses & Shirts</a></li>
                                                    <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                                    <li><a href="product-details.html">Wedding Dresses</a></li>
                                                    <li><a href="product-details.html">Prom Dresses</a></li>
                                                    <li><a href="product-details.html">Cosplay Costumes</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Men's Fashion</a>
                                                <ul>
                                                    <li><a href="product-details.html">Jackets</a></li>
                                                    <li><a href="product-details.html">Casual Faux Leather</a></li>
                                                    <li><a href="product-details.html">Genuine Leather</a></li>
                                                    <li><a href="product-details.html">Casual Pants</a></li>
                                                    <li><a href="product-details.html">Sweatpants</a></li>
                                                    <li><a href="product-details.html">Harem Pants</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-22">
                                                <a class="menu-title" href="#">Technology</a>
                                                <ul>
                                                    <li><a href="product-details.html">Gaming Laptops</a></li>
                                                    <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                                    <li><a href="product-details.html">Tablets</a></li>
                                                    <li><a href="product-details.html">Laptop Accessories</a></li>
                                                    <li><a href="product-details.html">Tablet Accessories</a></li>
                                                </ul>
                                            </li>
                                            <li class="sub-mega-menu sub-mega-menu-width-34">
                                                <div class="menu-banner-wrap">
                                                    <a href="product-details.html"><img
                                                            src="assets/imgs/banner/menu-banner.jpg"
                                                            alt="Surfside Media"></a>
                                                    <div class="menu-banner-content">
                                                        <h4>Hot deals</h4>
                                                        <h3>Don't miss<br> Trending</h3>
                                                        <div class="menu-banner-price">
                                                            <span class="new-price text-success">Save to 50%</span>
                                                        </div>
                                                        <div class="menu-banner-btn">
                                                            <a href="product-details.html">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-banner-discount">
                                                        <h3>
                                                            <span>35%</span>
                                                            off
                                                        </h3>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li><a href="blog.html">Blog</a></li> --}}
                                    <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}"
                                            href="{{ route('contact') }}">Contacto</a></li>

                                    @auth
                                        @if (Auth::user()->utype === 'ADM')
                                            <li class="position-static"><a href="#">Mi Cuenta <i
                                                        class="fi-rs-angle-down"></i></a>
                                                <ul class="mega-menu">
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Productos</a>
                                                        <ul>
                                                            <li><a class="{{ request()->routeIs('admin.products') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.products') }}">Productos</a></li>
                                                            <li><a class="{{ request()->routeIs('admin.categories') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.categories') }}">Categorías</a>
                                                            </li>
                                                            <li><a class="{{ request()->routeIs('admin.brand*') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.brands') }}">Marcas</a></li>
                                                            <li><a href="{{ route('admin.tags') }}">Etiquetas</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Pedidos</a>
                                                        <ul>
                                                            <li><a href="{{ route('admin.orders') }}">Ordenes</a></li>
                                                            <li><a class="{{ request()->routeIs('admin.locations') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.locations') }}">Ubicaciones</a>
                                                            </li>
                                                            <li><a class="{{ request()->routeIs('admin.shipping.types') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.shipping.types') }}">Tipos de
                                                                    envios</a>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Clientes</a>
                                                        <ul>
                                                            <li><a href="#">Clientes</a></li>
                                                            <li><a class="{{ request()->routeIs('admin.messages') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.messages') }}">Mensajes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Banners</a>
                                                        <ul>
                                                            <li><a class="{{ request()->routeIs('admin.home.slider') ? 'fw-bold' : '' }}"
                                                                    href="{{ route('admin.home.slider') }}">Gestionar
                                                                    Carrusel</a>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                                        <a class="menu-title" href="#">Empresa</a>
                                                        <ul>
                                                            <li><a href="{{ route('company.info') }}">Información de la
                                                                    empresa</a></li>
                                                            <li><a href="{{ route('admin.terms-and-conditions') }}">Términos y Condiciones</a></li>
                                                            <li><a href="{{ route('admin.questions') }}">Preguntas frecuentes</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        @else
                                            <li><a class="{{ request()->routeIs('admin.*') ? 'active' : '' }}"
                                                    href="#">Mi Cuenta<i class="fi-rs-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    {{-- <li><a href="{{ route('user.dashboard') }}">Mi cuenta</a></li> --}}
                                                    <li><a href="{{ route('profile.edit') }}">Mi perfil</a></li>
                                                    <li><a href="{{ route('user.orders') }}">Mis Ordenes</a></li>
                                                    <li><a href="{{ route('user.address') }}">Mis direcciones</a></li>
                                                    <li><a href="#">Cerrar sesión</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    @endauth

                                    {{-- @auth
                                        <li><a class="{{ request()->routeIs('admin.*') ? 'active' : '' }}"
                                                href="#">Mi Cuenta<i class="fi-rs-angle-down"></i></a>
                                            @if (Auth::user()->utype === 'ADM')
                                                <ul class="sub-menu">
                                                    <li><a class="{{ request()->routeIs('admin.dashboard') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                                    <li><a href="{{ route('user.dashboard') }}">Mi cuenta</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.products') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.products') }}">Productos</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.categories') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.categories') }}">Categorías</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.home.slider') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.home.slider') }}">Gestionar Carrusel</a>
                                                    </li>
                                                    <li><a class="{{ request()->routeIs('admin.coupons') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.coupons') }}">Cupones</a></li>
                                                    <li><a href="#">Ordenes</a></li>
                                                    <li><a href="#">Clientes</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.brand*') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.brands') }}">Marcas</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.messages') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.messages') }}">Mensajes</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.locations') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.locations') }}">Ubicaciones</a></li>
                                                    <li><a class="{{ request()->routeIs('admin.shipping.types') ? 'fw-bold' : '' }}"
                                                            href="{{ route('admin.shipping.types') }}">Tipos de envios</a>
                                                    </li>
                                                    <li><a href="{{ route('admin.tags') }}">Etiquetas</a></li>
                                                    <li><a href="{{ route('company.info') }}">Información de la
                                                            empresa</a></li>
                                                </ul>
                                            @else
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('user.dashboard') }}">Mi cuenta</a></li>
                                                    <li><a href="#">Cerrar sesión</a></li>
                                                </ul>
                                            @endif
                                        </li>
                                    @endauth --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    @php
                        $info = App\Models\CompanyInfo::first();
                    @endphp
                    <div class="hotline d-none d-lg-{{ $info->phone_number ? 'block' : '' }}">
                        <p><i class="fi-rs-smartphone"></i><span>Llámanos</span> {{ $info->phone_number }} </p>
                    </div>
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                    </p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            {{-- <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div> --}}
                            @livewire('wishlist-icon-component')

                            {{-- <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="assets/imgs/shop/thumbnail-3.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="assets/imgs/shop/thumbnail-4.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            @livewire('cart-icon-component')

                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="/"><img src="{{ asset('assets/imgs/logo/moda_urbana.png') }}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Explorar Categorías
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                </li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer &
                                        Office</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="/">Inicio</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="{{ route('about') }}">Nosotros</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="{{ route('shop') }}">Tienda</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="{{ route('contact') }}">Contacto</a></li>
                            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Nuestras Colecciones</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="blog.html">Blog</a></li> --}}
                            {{-- <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    {{-- <div class="single-mobile-header-info mt-30">
                        <a href="{{ route('home') }}"> Our location </a>
                    </div> --}}
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}">Iniciar sesión </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{ route('register') }}">Registrarse</a>
                    </div>
                    <div class="single-mobile-header-info {{ $info->phone_number ? '' : 'd-none' }}">
                        <a href="#">{{ $info->phone_number }} </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Siguenos</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    {{ $slot }}

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="{{ asset('assets/imgs/theme/icons/icon-email.svg') }}"
                                    alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Registrate al boletín de noticias</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0">...y recibe un <strong>cupon de 25 bs para tu
                                        primera compra.</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" class="form-control bg-white font-small"
                                placeholder="Ingresa tu correo">
                            <button class="btn bg-dark text-white" type="submit">Suscribirse</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('assets/imgs/logo/logo_for_web.png') }}" alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contacto</h5>
                            <p class="wow fadeIn animated">
                                <strong>Dirección: </strong>
                                {{ $info->address ? $info->address : 'No hay direcciones' }}
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Celular: </strong>
                                {{ $info->phone_number ? $info->phone_number : 'Sin número' }}
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong> {{ $info->email ? $info->email : 'Sin correo' }}
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Siguenos en</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                @if ($info->facebook)
                                    <a href="{{ $info->facebook }}"><img
                                            src="{{ asset('assets/imgs/theme/icons/icon-facebook.svg') }}"
                                            alt=""></a>
                                @endif
                                @if ($info->twitter)
                                    <a href="{{ $info->twitter }}"><img
                                            src="{{ asset('assets/imgs/theme/icons/icon-twitter.svg') }}"
                                            alt=""></a>
                                @endif
                                @if ($info->instagram)
                                    <a href="{{ $info->instagram }}"><img
                                            src="{{ asset('assets/imgs/theme/icons/icon-instagram.svg') }}"
                                            alt=""></a>
                                @endif
                                @if ($info->youtube)
                                    <a href="{{ $info->youtube }}"><img
                                            src="{{ asset('assets/imgs/theme/icons/icon-youtube.svg') }}"
                                            alt=""></a>      
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Acerca de</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="{{ route('about') }}">Sobre nosotros</a></li>
                            <li><a href="#">Información de entrega</a></li>
                            <li><a href="{{ route('questions') }}">Preguntas frecuentes</a></li>
                            <li><a href="{{ route('terms-and-conditions') }}">Términos &amp; Condiciones</a></li>
                            <li><a href="{{ route('contact') }}">Contáctanos</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">Mi cuenta</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ route('user.dashboard') }}">Mi cuenta</a></li>
                            <li><a href="{{ route('shop.cart') }}">Ver Carrito</a></li>
                            <li><a href="{{ route('shop.wishlist') }}">Mi lista de deseos</a></li>
                            {{-- <li><a href="#">Seguimiento de mi pedido</a></li> --}}
                            {{-- <li><a href="#">Ordenes</a></li> --}}
                        </ul>
                    </div>
                    {{-- <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Instalar App</h5>
                        <div class="row">
                            <div class="col-md-8 col-lg-12">
                                <p class="wow fadeIn animated">De App Store ó Google Play</p>
                                <div class="download-app wow fadeIn animated mob-app">
                                    <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"
                                            src="{{ asset('assets/imgs/theme/app-store.jpg') }}" alt=""></a>
                                    <a href="#" class="hover-up"><img src="{{ asset('assets/imgs/theme/google-play.jpg') }}"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Métodos de pago</p>
                                <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">
                        <a href="privacy-policy.html">Políticas de privacidad</a> | <a
                            href="{{ route('terms-and-conditions') }}">Términos &amp; Condiciones</a>
                    </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">Black Sheep</strong> Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Vendor JS-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/js/main.js?v=3.3') }}"></script>
    <script src="{{ asset('assets/js/shop.js?v=3.3') }}"></script>

    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>


    @livewireScripts

    @stack('scripts')
</body>

</html>
