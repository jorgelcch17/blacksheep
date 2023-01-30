<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        hh-grayBox {
            background-color: #F8F8F8;
            margin-bottom: 20px;
            padding: 35px;
            margin-top: 20px;
        }

        .pt45 {
            padding-top: 45px;
        }

        .order-tracking {
            text-align: center;
            width: 33.33%;
            position: relative;
            display: block;
        }

        .order-tracking .is-complete {
            display: block;
            position: relative;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            border: 0px solid #AFAFAF;
            background-color: #f7be16;
            margin: 0 auto;
            transition: background 0.25s linear;
            -webkit-transition: background 0.25s linear;
            z-index: 2;
        }

        .order-tracking .is-complete:after {
            display: block;
            position: absolute;
            content: '';
            height: 14px;
            width: 7px;
            top: -2px;
            bottom: 0;
            left: 5px;
            margin: auto 0;
            border: 0px solid #AFAFAF;
            border-width: 0px 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
        }

        .order-tracking.completed .is-complete {
            border-color: #27aa80;
            border-width: 0px;
            background-color: #27aa80;
        }

        .order-tracking.completed .is-complete:after {
            border-color: #fff;
            border-width: 0px 3px 3px 0;
            width: 7px;
            left: 11px;
            opacity: 1;
        }

        .order-tracking p {
            color: #A4A4A4;
            font-size: 16px;
            margin-top: 8px;
            margin-bottom: 0;
            line-height: 20px;
        }

        .order-tracking p span {
            font-size: 14px;
        }

        .order-tracking.completed p {
            color: #000;
        }

        .order-tracking::before {
            content: '';
            display: block;
            height: 3px;
            width: calc(100% - 40px);
            background-color: #f7be16;
            top: 13px;
            position: absolute;
            left: calc(-50% + 20px);
            z-index: 0;
        }

        .order-tracking:first-child:before {
            display: none;
        }

        .order-tracking.completed:before {
            background-color: #27aa80;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Detalles de la orden #{{ $order->id }}
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
                                    <div class="col-6">
                                        Estado
                                    </div>
                                    <div class="col-6">
                                        <div class="dropdown float-end">
                                            <span class="me-3">
                                                @if($statusOrder == 1)
                                                    Pago pendiente
                                                @elseif($statusOrder == 2)   
                                                    Pago confirmado
                                                @elseif($statusOrder == 3)   
                                                    Enviado
                                                @elseif($statusOrder == 4)   
                                                    Entregado
                                                @elseif($statusOrder == 5)   
                                                    Cancelado   
                                                @endif
                                            </span>
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Cambiar estado
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="#" wire:click="$set('statusOrder', 1)">Pago pendiente</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click="$set('statusOrder', 2)">Pago confirmado</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click="$set('statusOrder', 3)">Enviado</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click="$set('statusOrder', 4)">Entregado</a></li>
                                              <li><a class="dropdown-item" href="#" wire:click="$set('statusOrder', 5)">Cancelado</a></li>
                                            </ul>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- pediente - pago pendiente - pago aceptado - en proceso - enviado - entregado --}}
                                <div class="container">
                                    <div class="row">
                                        @if ($order->status != 1 && $order->status != 5)
                                            <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                                <div class="row justify-content-between">
                                                    <div
                                                        class="order-tracking {{ $order->status > 1 ? 'completed' : '' }}">
                                                        <span class="is-complete"></span>
                                                        <p>Orden procesada</p>
                                                    </div>
                                                    <div
                                                        class="order-tracking {{ $order->status > 2 ? 'completed' : '' }}">
                                                        <span class="is-complete"></span>
                                                        <p>Enviado</p>
                                                    </div>
                                                    <div
                                                        class="order-tracking  {{ $order->status > 3 ? 'completed' : '' }}">
                                                        <span class="is-complete"></span>
                                                        <p>Entregado</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($order->status == 5)
                                            <div class="d-flex justify-content-center">
                                                <p class="fw-bolder text-danger fs-4">CANCELADO</p>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-center">
                                                <p class="fw-bolder text-warning fs-4">PAGO PENDIENTE</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                Dirección de envío
                            </div>
                            <div class="card-body">
                                <div class="table-responsive order_table text-center">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Datos de la persona que recibira el pedido</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Nombre
                                                </td>
                                                <td colspan="2">
                                                    {{ $shippingAddress->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Telefono
                                                </td>
                                                <td colspan="2">
                                                    {{ $shippingAddress->phone_number }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Correo
                                                </td>
                                                <td colspan="2">
                                                    {{ $shippingAddress->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">
                                                    <strong>Datos para la factura</strong>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Razón social
                                                </td>
                                                <td colspan="2">
                                                    {{ $shippingAddress->company_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    CI/NIT
                                                </td>
                                                <td colspan="2">
                                                    {{ $shippingAddress->nit }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">
                                                    <strong>Ubicación</strong>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Departamento
                                                </td>
                                                <td colspan="2">
                                                    {{ $department }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Provincia
                                                </td>
                                                <td colspan="2">
                                                    {{ $province }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Ciudad
                                                </td>
                                                <td colspan="2">
                                                    {{ $city }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                Detalles de la orden
                            </div>
                            <div class="card-body">
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
                                                <td colspan="2"><em>Bs {{ $order->shipping_cost }}</em></td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

