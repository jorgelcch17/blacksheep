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
                    <span></span> Información de la empresa
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Información básica
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="" wire:model="address">
                                </div>
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col mb-3">
                                        <label for="" class="form-label">Teléfono/celular</label>
                                        <input type="text" class="form-control" name="" id=""
                                            aria-describedby="helpId" placeholder="" wire:model="phone_number">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="" class="form-label">Correo electronico</label>
                                        <input type="text" class="form-control" name="" id=""
                                            aria-describedby="helpId" placeholder="" wire:model="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Redes Sociales
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="" wire:model="facebook">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Twitter</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="" wire:model="twitter">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="" wire:model="instagram">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Youtube</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="" wire:model="youtube">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-4">
                  <button type="button" name="" id="" class="btn btn-primary" wire:click.prevent="storeInfo">Guardar</button>
                </div>
            </div>
        </section>
    </main>
</div>
