<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Inicio</a>
                    <span></span> Tienda
                    <span></span> Carrito
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            @if (Session::has('success_message'))
                                <div class="alert alert-success">
                                    <strong>Éxito:</strong> {{ Session::get('success_message') }}
                                </div>
                            @endif
                            @if (Cart::instance('cart')->count() > 0)
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach (Cart::instance('cart')->content() as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('assets/imgs/products') }}/{{ $item->model->image }}"
                                                        alt="#"></td>
                                                <td class="product-des product-name text-start">
                                                    <h4 class="product-name"><a
                                                            href="{{ route('product.details', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                    </h4>
                                                    {{-- <p>{{ $item->model->subcategory->name }}</p> --}}
                                                    <p style="font-size:14px;"><strong>Color:</strong> {{ $item->model->color }}</p>
                                                    <p style="font-size:14px;"><strong>Talla:</strong> {{ $item->options->size }}</p>
                                                    {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                        magndapibus.
                                                    </p> --}}
                                                </td>
                                                <td class="price" data-title="Price"><span>Bs
                                                        {{ $item->model->regular_price }} </span></td>
                                                <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <a href="#" class="qty-down"
                                                            wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i
                                                                class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val">{{ $item->qty }}</span>
                                                        <a href="#" class="qty-up"
                                                            wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i
                                                                class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span>Bs {{ $item->subtotal }} </span>
                                                </td>
                                                <td class="action" data-title="Remove"><a href="#"
                                                        class="text-muted"
                                                        wire:click.prevent="destroy('{{ $item->rowId }}')"><i
                                                            class="fi-rs-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="6" class="text-end">
                                                <a href="#" class="text-muted" wire:click.prevent="clearAll()"> <i
                                                        class="fi-rs-cross-small"></i>
                                                    Clear Cart</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center fs-4 mb-3">El carrito esta vacío</p>
                            @endif
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Actualizar Carrito</a>
                            <a class="btn" href="{{ route('shop') }}"><i class="fi-rs-shopping-bag mr-10"></i>Continuar Comprando</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">
                                <div class="mb-30">
                                    <div class="heading_s1">
                                        <h4>Aplicar Cupón</h4>
                                    </div>
                                    <div class="total-amount">
                                        <div class="left">
                                            <div class="coupon">
                                                <form action="#" target="_blank" wire:submit.prevent="applyCouponCode">
                                                    @if (Session::has('coupon_message'))
                                                        <div class="alert alert-danger">
                                                            <strong></strong>
                                                            {{ Session::get('coupon_message') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-row row justify-content-center">
                                                        <div class="form-group col-lg-6">
                                                            <input class="font-medium" name="Coupon"
                                                                placeholder="Ingresa tu cupón" wire:model="couponCode">
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <button class="btn  btn-sm"><i
                                                                    class="fi-rs-label mr-10"></i>Aplicar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            @if(Session::has('coupon'))
                                                <div class="">
                                                    Código de promoción: 
                                                    <strong>{{ Session::get('coupon')['code'] }}</strong>
                                                    {{-- <a href="#">Remover</a> --}}
                                                    <svg wire:click.prevent="removeCouponCode" style="width:24px;height:24px;cursor: pointer;" viewBox="0 0 24 24">
                                                        <path fill="#E30613" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Total del carrito</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="cart_total_label">Subtotal</td>
                                                    <td class="cart_total_amount"><span
                                                            class="font-lg fw-900 text-brand">Bs
                                                            {{ Cart::subtotal() }}</span></td>
                                                </tr>
                                                @if (Session::has('coupon'))
                                                    {{-- applying the coupon --}}
                                                    <tr>
                                                        <td class="cart_total_label">Descuento ({{ Session::get('coupon')['code'] }})</td>
                                                        <td class="cart_total_amount"><strong><span
                                                                    class="font-lg fw-900 text-brand">Bs {{ $discount }}</span></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Subtotal with Discount</td>
                                                        <td class="cart_total_amount"><strong><span
                                                                    class="font-lg fw-900 text-brand">Bs
                                                                    {{ $subtotalAfterDiscount }}</span></strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="cart_total_label">Tax ({{ config('cart.tax') }}%)</td>
                                                        <td class="cart_total_amount"><strong><span
                                                                    class="font-lg fw-900 text-brand">Bs
                                                                    {{ $taxAfterDiscount }}</span></strong>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="cart_total_label">Total</td>
                                                        <td class="cart_total_amount"><strong><span
                                                                    class="font-xl fw-900 text-brand">Bs
                                                                    {{ $totalAfterDiscount }}</span></strong>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="cart_total_label">Impuesto</td>
                                                        <td class="cart_total_amount"><span
                                                                class="font-lg fw-900 text-brand">Bs
                                                                {{ Cart::tax() }}</span></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td class="cart_total_label">Envío</td>
                                                        <td class="cart_total_amount"> <i
                                                                class="ti-gift mr-5"></i>Gratis
                                                        </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td class="cart_total_label">Total</td>
                                                        <td class="cart_total_amount"><strong><span
                                                                    class="font-xl fw-900 text-brand">Bs
                                                                    {{ Cart::instance('cart')->total() }}</span></strong>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i>
                                        Ir a pagar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
