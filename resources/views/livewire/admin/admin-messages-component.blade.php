<div>
    @php
        function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = [
            'y' => 'año',
            'm' => 'mes',
            'w' => 'semana',
            'd' => 'día',
            'h' => 'hora',
            'i' => 'minuto',
            's' => 'segundo',
        ];
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) {
            $string = array_slice($string, 0, 1);
        }
        return $string ? implode(', ', $string) . ' atrás' : 'justo ahora';
    }
    @endphp
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
                    <span></span> Centro de mensajes
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
                                    <div class="col-md-6">
                                        Centro de mensajes
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <a href="{{ route('admin.category.add') }}" class="btn btn-success float-end">Nueva Categoría</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            {{-- <th>#</th> --}}
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Asunto</th>
                                            <th>Mensaje</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message)
                                            <tr>
                                                {{-- <td>{{ ++$i }}</td> --}}
                                                <td>{{ $message->name }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->mobile_phone }}</td>
                                                <td>{{ $message->subject }}</td>
                                                <td>{{ substr($message->message, 0, 20) . '...' }}</td>
                                                <td>{{ time_elapsed_string($message->created_at) }}</td>
                                                <td>
                                                    @if ($message->status == 'unread')
                                                        <span class="badge bg-primary">Nuevo</span>
                                                    @else
                                                        <span class="badge bg-secondary">Leído</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <a href="#" class="text-info">Leer</a> --}}

                                                    <!-- Button trigger modal -->
                                                    <a class="text-info" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop"
                                                        wire:click.prevent="select({{ $message->id }})">
                                                        Leer
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop" wire:ignore.self
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="staticBackdropLabel">
                                                                        {{ $selected_subject }} - <span
                                                                            class="fs-6 fw-light font-monospace text-secondary">{{ $selected_created_at }}</span>
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>{{ $selected_name }} <span>(<a
                                                                                class="text-secondary fw-bold"
                                                                                href="https://wa.me/591{{ $selected_mobile }}"
                                                                                target="__blank">{{ $selected_mobile }}</a>)</span>
                                                                    </p>
                                                                    <span
                                                                        class="text-secondary">{{ $selected_email }}</span>
                                                                    <hr>
                                                                    <p>{{ $selected_message }}</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-dismiss="modal"
                                                                        wire:click.prevent="noRead()">Marcar como no
                                                                        leído</button>
                                                                    <button type="button" data-bs-dismiss="modal"
                                                                        class="btn btn-secondary">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="#" class="text-danger" style="margin-left:20px;"
                                                        onclick="deleteConfirmation({{ $message->id }})">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $messages->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Quieres borrar este registro?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancelar</button>
                        <button type="button" class="btn btn-danger" onclick="deleteMessage()">Sí, Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('message_id', id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteMessage(){
            @this.call('deleteMessage');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush