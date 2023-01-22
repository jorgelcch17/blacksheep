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
                    <span></span> Términos y Condiciones
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
                                        Términos y Condiciones
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-secondary float-end" href="#" role="button"
                                            wire:click.prevent="storeTerms">Guardar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3" wire:ignore>
                                    <label for="" class="form-label"></label>
                                    <textarea class="form-control" name="terms" id="terms" rows="3" wire:model="terms"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/kzp7irwb25ot6mjk48dhyw5ijbniu36tbteqmkzpvpit6xyi/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'autoresize anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            setup: function(editor) {
                editor.on('Change', function(e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#terms').val();
                    @this.set('terms', sd_data);
                });
            }
        });
    </script>
@endpush
