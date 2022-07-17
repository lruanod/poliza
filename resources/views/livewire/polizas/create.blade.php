<!-- modal buscarcliente-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="addpoliza" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="addpoliza">Registrar póliza</h5>
                <button class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                   <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            crear póliza
                        </div>
                        <div class="card-body">
                            @include('livewire.polizas.form')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="store" class="btn btn-danger col-md-5">Registrar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcliente-->
