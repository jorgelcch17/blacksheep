<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Mis ordenes
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Mis ordenes</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Orden</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Total</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        @if ($order->status == '1')
                                                            <span class="badge"
                                                                style="background:#fef9c3;color:#854d0e;">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" style="width:16px;hight:16px">
                                                                    <title>cash-clock</title>
                                                                    <path fill="#854d0e"
                                                                        d="M17.5 16.82L19.94 18.23L19.19 19.53L16 17.69V14H17.5V16.82M24 17C24 20.87 20.87 24 17 24S10 20.87 10 17C10 16.66 10.03 16.33 10.08 16H2V4H20V10.68C22.36 11.81 24 14.21 24 17M10.68 14C10.86 13.64 11.05 13.3 11.28 12.97C11.19 13 11.1 13 11 13C9.34 13 8 11.66 8 10S9.34 7 11 7 14 8.34 14 10C14 10.25 13.96 10.5 13.9 10.73C14.84 10.27 15.89 10 17 10C17.34 10 17.67 10.03 18 10.08V8C16.9 8 16 7.11 16 6H6C6 7.11 5.11 8 4 8V12C5.11 12 6 12.9 6 14H10.68M22 17C22 14.24 19.76 12 17 12S12 14.24 12 17 14.24 22 17 22 22 19.76 22 17Z" />
                                                                </svg>
                                                                Pago pendiente</span>
                                                        @elseif($order->status == 2)
                                                            <span class="badge" style="background:#cffafe;color:#155e75;">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" style="width:16px;hight:16px">
                                                                    <title>dolly</title>
                                                                    <path fill="#155e75"
                                                                        d="M11.97,19.88C10.93,20.26 9.78,19.72 9.4,18.69C9,17.65 9.55,16.5 10.59,16.13C11.63,15.75 12.78,16.28 13.16,17.31C13.54,18.35 13,19.5 11.97,19.88M9.9,14.25C7.83,15 6.76,17.3 7.5,19.38C8.28,21.45 10.58,22.5 12.66,21.75C14.73,21 15.79,18.7 15.04,16.63C14.28,14.55 11.97,13.5 9.9,14.25M15.94,4.58L9.37,7L10.75,10.74L17.32,8.33M20.32,13.62L15.54,15.37C15.71,15.66 15.85,15.96 15.97,16.28C16.09,16.6 16.17,16.93 16.22,17.25L21,15.5M19.54,8.58L11.09,11.68L11.58,13C12.83,13.09 14,13.64 14.89,14.55L20.92,12.34M2,2V4H5.09L8.66,13.75C8.94,13.57 9.24,13.43 9.56,13.31C9.88,13.19 10.21,13.11 10.53,13.06L6.5,2" />
                                                                </svg>
                                                                Pago confirmado
                                                            </span>
                                                        @elseif($order->status == 3)
                                                            <span class="badge"
                                                                style="background:#e0f2fe;color:#075985;">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    style="width:16px;hight:16px" viewBox="0 0 24 24">
                                                                    <title>truck-minus</title>
                                                                    <path fill="#075985"
                                                                        d="M20 8H17V4H3C1.89 4 1 4.89 1 6V17H3C3 18.66 4.34 20 6 20S9 18.66 9 17H15C15 18.66 16.34 20 18 20S21 18.66 21 17H23V12L20 8M6 18.5C5.17 18.5 4.5 17.83 4.5 17S5.17 15.5 6 15.5 7.5 16.17 7.5 17 6.83 18.5 6 18.5M13 11H5V9H13V11M18 18.5C17.17 18.5 16.5 17.83 16.5 17S17.17 15.5 18 15.5 19.5 16.17 19.5 17 18.83 18.5 18 18.5M17 12V9.5H19.5L21.46 12H17" />
                                                                </svg>
                                                                En
                                                                camino</span>
                                                        @elseif($order->status == 4)
                                                            <span class="badge badge-danger"
                                                                style="background:#dcfce7;color:#166534;">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" style="width:16px;hight:16px">
                                                                    <title>check-circle</title>
                                                                    <path fill="#166534"
                                                                        d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" />
                                                                </svg>
                                                                Completado</span>
                                                        @elseif($order->status == 5)
                                                            <span class="badge"
                                                                style="background:#fee2e2;color:#991b1b;">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" style="width:16px;hight:16px">
                                                                    <title>close-circle</title>
                                                                    <path fill="#991b1b"
                                                                        d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                                                                </svg>
                                                                Cancelado</span>
                                                        @endif
                                                    </td>
                                                    <td>Bs<strong>{{ $order->total }}</strong> por {{ count(get_object_vars(json_decode($order->content))) }} item(s)</td>
                                                    <td><a href="{{ route('user.order.details', $order) }}" class="btn-small d-block">Ver detalles</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
