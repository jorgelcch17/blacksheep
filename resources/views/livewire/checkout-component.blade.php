<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Orden #{{ $order->id }}
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Direcciones</h4>
                        </div>
                        <form method="post">
                            @if ($differentaddress == 0)
                                <div class="address_option mb-20 row">
                                    @foreach ($addresses as $address)
                                        <div class="col-6 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <input class="form-check-input" name="address"
                                                        id="check{{ $address->id }}" value="{{ $address->id }}"
                                                        type="radio" wire:model="shippingAddress">
                                                    <label class="ps-2"
                                                        for="check{{ $address->id }}"><strong>{{ $address->alias }}</strong></label>
                                                </div>
                                                <div class="card-body">
                                                    <label for="check{{ $address->id }}">
                                                        <p class="fs-6"><strong>Recibe:</strong> {{ $address->name }}
                                                            -
                                                            {{ $address->phone_number }} - {{ $address->email }}</p>
                                                        <p class="fs-6"><strong>Datos para factura:</strong>
                                                            {{ $address->company_name }} - {{ $address->nit }}</p>
                                                        <p class="fs-6"><strong>Ciudad:</strong>
                                                            {{ $address->department->name }} -
                                                            {{ $address->province->name }} -
                                                            {{ $address->city->name }}</p>
                                                        <p class="fs-6"><strong>Direccion:</strong>
                                                            {{ $address->address }}
                                                        </p>
                                                        <p class="fs-6"><strong>Referencia:</strong>
                                                            {{ $address->reference }}</p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="ship_detail">
                                <div class="form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox"
                                                id="differentaddress" wire:model="differentaddress"
                                                wire:loading.attr="disabled" wire:target="differentaddress">
                                            <label class="form-check-label label_info" data-bs-toggle="collapse"
                                                data-target="#collapseAddress" href="#collapseAddress"
                                                aria-controls="collapseAddress" for="differentaddress"><span>Enviar a
                                                    una dirección diferente?</span></label>
                                        </div>
                                    </div>
                                </div>
                                @if ($differentaddress == 1)
                                    <div id="collapseAddress" class="different_address in">
                                        <div class="form-group">
                                            <input type="text" required="" name="fname"
                                                placeholder="First name *">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="lname"
                                                placeholder="Last name *">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="text" name="cname"
                                                placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom_select">
                                                <select class="form-control select-active">
                                                    <option value="">Select an option...</option>
                                                    <option value="SX">Saint Martin (Dutch part)</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="WS">Western Samoa</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_address" required=""
                                                placeholder="Address *">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="billing_address2" required=""
                                                placeholder="Address line2">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="text" name="city"
                                                placeholder="City / Town *">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="text" name="state"
                                                placeholder="State / County *">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="text" name="zipcode"
                                                placeholder="Postcode / ZIP *">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>

                        <div class="mb-25">
                            <h4>Metodo de envio</h4>
                        </div>
                        <div>
                            @if ($shippingTypes != null)
                                @foreach ($shippingTypes as $shippingType)
                                    <div class="form-check">
                                        <input class="form-check-input" id="shipping{{ $shippingType->id }}"
                                            type="radio" value="{{ $shippingType->id }}" name="shipping_type"
                                            wire:model="shipping_type_id">
                                        <label class="form-check-label" for="shipping{{ $shippingType->id }}">
                                            <p class="fw-bold">{{ $shippingType->shippingType->name }}
                                                - <span class="fw-bolder">Bs {{ $shippingType->price }}</span> </p>
                                            <p class="fw-light">{{ $shippingType->shippingType->description }}</p>
                                            <p style="color:#9ca3af;">{{ $shippingType->shippingType->delivery_time }}</p>
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <p>Seleccione una dirección</p>
                            @endif
                            @error('shipping_type_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            {{-- <div class="mb-20 mt-3">
                                <h5>Información adicional</h5>
                            </div>
                            <div class="form-group mb-30">
                                <textarea rows="5" placeholder="Nota de la orden"></textarea>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Detalle</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td class="image product-thumbnail"><img
                                                        src="{{ asset('assets/imgs/products') }}/{{ $item->options->image }}"
                                                        alt="#"></td>
                                                <td>
                                                    <h5><a href="product-details.html">{{ $item->name }}</a>
                                                    </h5>
                                                    <span class="product-qty">x {{ $item->qty }}</span>
                                                </td>
                                                <td>Bs {{ $item->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">Bs {{ $order->subtotal }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Impuestos</th>
                                            <td class="product-subtotal" colspan="2">Bs {{ $order->tax }}</td>
                                        </tr>
                                        <tr>
                                            <th>Descuento</th>
                                            <td colspan="2"><em>Bs {{ $order->discount }}</em></td>
                                        </tr>
                                        <tr>
                                            <th>Costo de envio</th>
                                            <td colspan="2"><em>Bs {{ $shipping_cost }}</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span
                                                    class="font-xl text-brand fw-900">Bs
                                                    {{ $order->total }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Método de pago</h5>
                                </div>
                                <p class="fw-thin"><span class="text-danger">Nota:</span> Se le va redireccionar a la plataforma de pagos líbelula, una vez complete su pago sera redireccionado sus ordenes.</p>
                            </div>
                            <a href="#" wire:click.prevent="payOrder" class="btn btn-fill-out btn-block mt-30">Ir a pagar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
