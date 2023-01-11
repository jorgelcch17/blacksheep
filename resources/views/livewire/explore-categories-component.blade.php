<div>
    <div class="main-categori-wrap d-none d-lg-block">
        <a class="categori-button-active" href="#" style="color: #E30613 !importart;">
            <span class="fi-rs-apps"></span> Explorar Categorías
        </a>
        <div class="categori-dropdown-wrap categori-dropdown-active-large">
            <ul>
                @foreach ($categories as $category)
                @if ($category->subcategories->count() != 0)
                <li class="has-children">
                    <a href="{{ route('product.category', $category->slug) }}"><i class="surfsidemedia-font-home"></i>{{ $category->name }}</a>
                    <div class="dropdown-menu">
                            <ul class="mega-menu d-lg-flex">
                                <li class="mega-menu-col col-lg-7">
                                    <ul class="d-lg-flex">
                                        <li class="mega-menu-col col-lg-11">
                                            <ul>
                                                {{-- <li><span class="submenu-title">Hot & Trending</span>
                                                </li> --}}
                                                @foreach($category->subcategories as $subcategory)
                                                <li>
                                                    <a class="dropdown-item nav-link nav_item" href="{{ route('product.category', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        {{-- <li class="mega-menu-col col-lg-6">
                                            <ul>
                                                <li><span class="submenu-title">Bottoms</span></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Leggings</a>
                                                </li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Skirts</a>
                                                </li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Shorts</a>
                                                </li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Jeans</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Pants &
                                                        Capris</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Bikini
                                                        Sets</a></li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Cover-Ups</a>
                                                </li>
                                                <li><a class="dropdown-item nav-link nav_item" href="#">Swimwear</a>
                                                </li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li class="mega-menu-col col-lg-5">
                                    <div class="header-banner2">
                                        <img src="assets/imgs/banner/menu-banner-2.jpg" alt="menu_banner1">
                                        <div class="banne_info">
                                            <h6>10% Off</h6>
                                            <h4>New Arrival</h4>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                    <div class="header-banner2">
                                        <img src="assets/imgs/banner/menu-banner-3.jpg" alt="menu_banner2">
                                        <div class="banne_info">
                                            <h6>15% Off</h6>
                                            <h4>Hot Deals</h4>
                                            <a href="#">Shop now</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                </li>
                    @else
                        <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>{{ $category->name }}</a>
                        </li>
                    @endif
                @endforeach
                {{-- <li class="has-children">
                    <a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's
                        Clothing</a>
                    <div class="dropdown-menu">
                        <ul class="mega-menu d-lg-flex">
                            <li class="mega-menu-col col-lg-7">
                                <ul class="d-lg-flex">
                                    <li class="mega-menu-col col-lg-6">
                                        <ul>
                                            <li><span class="submenu-title">Jackets & Coats</span>
                                            </li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Down Jackets</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Jackets</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Parkas</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Faux Leather Coats</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Trench</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Wool & Blends</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Vests & Waistcoats</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Leather Coats</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-6">
                                        <ul>
                                            <li><span class="submenu-title">Suits & Blazers</span>
                                            </li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Blazers</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Suit Jackets</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Suit Pants</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Suits</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Vests</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Tailor-made Suits</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Cover-Ups</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="mega-menu-col col-lg-5">
                                <div class="header-banner2">
                                    <img src="assets/imgs/banner/menu-banner-4.jpg"
                                        alt="menu_banner1">
                                    <div class="banne_info">
                                        <h6>10% Off</h6>
                                        <h4>New Arrival</h4>
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has-children">
                    <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i>
                        Cellphones</a>
                    <div class="dropdown-menu">
                        <ul class="mega-menu d-lg-flex">
                            <li class="mega-menu-col col-lg-7">
                                <ul class="d-lg-flex">
                                    <li class="mega-menu-col col-lg-6">
                                        <ul>
                                            <li><span class="submenu-title">Hot & Trending</span>
                                            </li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Cellphones</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">iPhones</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Refurbished Phones</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Mobile Phone</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Mobile Phone Parts</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Phone Bags & Cases</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Communication Equipments</a>
                                            </li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Walkie Talkie</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-col col-lg-6">
                                        <ul>
                                            <li><span class="submenu-title">Accessories</span></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Screen Protectors</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Wire Chargers</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Wireless Chargers</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Car Chargers</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Power Bank</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Armbands</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Dust Plug</a></li>
                                            <li><a class="dropdown-item nav-link nav_item"
                                                    href="#">Signal Boosters</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="mega-menu-col col-lg-5">
                                <div class="header-banner2">
                                    <img src="assets/imgs/banner/menu-banner-5.jpg"
                                        alt="menu_banner1">
                                    <div class="banne_info">
                                        <h6>10% Off</h6>
                                        <h4>New Arrival</h4>
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                                <div class="header-banner2">
                                    <img src="assets/imgs/banner/menu-banner-6.jpg"
                                        alt="menu_banner2">
                                    <div class="banne_info">
                                        <h6>15% Off</h6>
                                        <h4>Hot Deals</h4>
                                        <a href="#">Shop now</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer &
                        Office</a></li>
                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer
                        Electronics</a></li>
                <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Jewelry &
                        Accessories</a></li>
                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a>
                </li>
                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a>
                </li>
                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother &
                        Kids</a></li>
                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a>
                </li>
                <li>
                    <ul class="more_slide_open" style="display: none;">
                        <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty,
                                Health</a></li>
                        <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and
                                Shoes</a></li>
                        <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer
                                Electronics</a></li>
                        <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles
                                & Motorcycles</a></li>
                    </ul>
                </li> --}}
            </ul>
            {{-- <div class="more_categories">Show more...</div> --}}
        </div>
    </div>
</div>
