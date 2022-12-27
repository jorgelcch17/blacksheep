<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Inicio</a>
                    <span></span> Contáctanos
                </div>
            </div>
        </div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Contáctanos</h3>
                            <p class="text-muted mb-30 text-center font-sm">
                                Dejanos tu mensaje, te respondenderemos a la brevedad posible.
                            </p>
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{session::get('message')}}
                                </div>
                            @endif
                            <form class="contact-form-style text-center" id="contact-form" action="#" wire:submit.prevent="storeMessage"
                                method="post">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="Nombre completo" type="text" wire:model="name"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="Correo" type="email" wire:model="email"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="telephone" placeholder="Teléfono" type="tel" wire:model="mobile_phone"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Asunto" type="text" wire:model="subject"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="textarea-style mb-30">
                                            <textarea name="message" placeholder="Mensaje" wire:model="message"></textarea>
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">
                                            Enviar mensaje
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
