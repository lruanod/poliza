<div class="row form-group">
    <label for="" class="col-5 text-white">Numero de copias</label>
    <input type="number" class="form-control col-md-5" wire:model="total" placeholder="0"  min="0" readonly="readonly">
    @error('total') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Fecha</label>
    <input type="datetime-local" class="form-control col-md-5" wire:model="fecha" >
    <span class="col-md-5 text-warning">
        {{\carbon\carbon::parse($fechae)->format('d/m/Y H:i')}}
    </span>
    @error('fecha') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Nombre del consignatario</label>
    <input type="text" class="form-control col-md-5" wire:model="consignatario">
    @error('consignatario') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Numero de duca</label>
    <input type="text" class="form-control col-md-5" wire:model="numerod">
    @error('numerod') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Numero de declaración</label>
    <input type="text" class="form-control col-md-5" wire:model="numerode">
    @error('numerode') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Clave de agente de aduanas</label>
    <input type="number" class="form-control col-md-5" wire:model="clave" min="0" placeholder="0" >
    @error('clave') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Unidad de medidas utilizadas en la declaración original</label>
    <input type="text" class="form-control col-md-5" wire:model="medida" >
    @error('medida') <span class="text-warning">{{$message}}</span> @enderror
</div>









