<div class="col-md-6 mt-3">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );">
            <div class="card-header text-center text-white">
                Reporte por fecha
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="inicio" class="text-white">Fecha incio</label>
                            <input type="datetime-local" wire:model="inicio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="final" class="text-white">Fecha final</label>
                            <input type="datetime-local" wire:model="fin" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label  class="text-white">Generar</label><br>
                        <button type="button" class="btn btn-danger col-md-4" title="Generar reporte" wire:loading.attr="disabled" wire:click="imprimir">
                            <i class="bi-file-pdf"></i>
                        </button>
                        <p class="text-warning" wire:loading>Espere un momento hasta que inicie la descarga</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

