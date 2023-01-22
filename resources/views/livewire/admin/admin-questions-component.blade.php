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
                    <span></span> Preguntas frecuentes
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}</div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Preguntas frecuentes
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Nueva pregunta
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva
                                                            pregunta</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Pregunta</label>
                                                            <input type="text" class="form-control" name=""
                                                                id="" aria-describedby="helpId" placeholder=""
                                                                wire:model="add_question">
                                                            @error('add_question')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3" wire:ignore>
                                                            <label for="" class="form-label">Respuesta</label>
                                                            <input type="text" class="form-control" name="add_answer"
                                                                id="newquestion" aria-describedby="helpId"
                                                                placeholder="">
                                                            @error('add_answer')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary"
                                                            wire:click.prevent="storeQuestion">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Activo</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="questions">
                                        @foreach ($questions as $question)
                                            <tr data-id="{{ $question->id }}">
                                                <th scope="row" class="handle" style="cursor: grab"><svg style="width:24px;height:24px"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M9,3H11V5H9V3M13,3H15V5H13V3M9,7H11V9H9V7M13,7H15V9H13V7M9,11H11V13H9V11M13,11H15V13H13V11M9,15H11V17H9V15M13,15H15V17H13V15M9,19H11V21H9V19M13,19H15V21H13V19Z" />
                                                    </svg></th>
                                                <td>
                                                    <div>
                                                        <label class="switch">
                                                            <input type="checkbox"
                                                                {{ $question->is_active == 1 ? 'checked' : '' }}
                                                                wire:click.prevent="changeStatus({{ $question->id }})">
                                                            <span class="slider"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $question->question }}
                                                        <!-- Button trigger modal -->
                                                        <a wire:click.prevent="editQuestion({{ $question->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
                                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                            </svg>
                                                        </a>
                                                    </strong>
                                                    <p>{!! $question->answer !!}</p>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                        wire:click.prevent="deleteQuestion({{ $question->id }})">
                                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                            <path fill="red"
                                                                d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva
                        pregunta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Pregunta</label>
                        <input type="text" class="form-control" name="" id=""
                            aria-describedby="helpId" placeholder="" wire:model="edit_question">
                        @error('edit_question')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3" wire:ignore.self>
                        <label for="" class="form-label">Respuesta</label>
                        <textarea name="" id="newquestion2" cols="30" wire:model="edit_answer" rows="10"></textarea>
                        @error('edit_answer')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click.prevent="$emit('closeModal')">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="updateQuestion"
                        data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script src="https://cdn.tiny.cloud/1/kzp7irwb25ot6mjk48dhyw5ijbniu36tbteqmkzpvpit6xyi/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script></script>
    <script>
        $(function() {
            tinymce.init({
                selector: '#newquestion',
                plugins: 'autoresize anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                setup: function(editor) {
                    editor.on('Change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_data = $('#newquestion').val();
                        @this.set('add_answer', sd_data);
                    });
                }
            });
            @this.on('editQuestion', question => {
                tinymce.init({
                    selector: '#newquestion2',
                    plugins: 'autoresize anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                    setup: function(editor) {
                        editor.on('Change', function(e) {
                            tinyMCE.triggerSave();
                            var sd_data = $('#newquestion2').val();
                            @this.set('edit_answer', sd_data);
                        });
                    }
                });
            })
            @this.on('closeModal', () => {
                tinymce.remove();
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        new Sortable(questions, {
            handle: '.handle',
            animation: 150,
            store: {
                set: function(sortable){
                    var order = sortable.toArray();
                    @this.set('order', order);
                }
            }
        });
    </script>
@endpush
