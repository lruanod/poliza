<div class="row form-group">
    <label for="" class="col-5 text-white">Fecha</label>
    <span class="text-warning">
        {{\carbon\carbon::parse($fechae)->format('d/m/Y H:i')}}
    </span>
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Nombre del consignatario</label>
    <input type="text" class="form-control col-md-5" wire:model="consignatario" readonly="readonly">
    @error('consignatario') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white">Numero de duca</label>
    <input type="text" class="form-control col-md-5" wire:model="numerod" readonly="readonly">
    @error('numerod') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white">Numero de declaración</label>
    <input type="text" class="form-control col-md-5" wire:model="numerode" readonly="readonly">
    @error('numerode') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Clave de agente de aduanas</label>
    <input type="number" class="form-control col-md-5" wire:model="clave" min="0" placeholder="0"  readonly="readonly">
    @error('clave') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="" class="col-5 text-white">Unidad de medidas utilizadas en la declaración original</label>
    <input type="text" class="form-control col-md-5" wire:model="medida" readonly="readonly">
    @error('medida') <span class="text-warning">{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model="descripcion"  rows="3" ></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cantidadm" class="col-5 text-white">Cantidad de mercancia presentada</label>
    <input type="text" class="form-control col-md-5" wire:model="cantidadm">
    @error('cantidam') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cantidadm" class="col-5 text-white">Cantidad de bultos por contenedor</label>
    <input type="number" class="form-control col-md-5" wire:model="numerobu"  min="0"  >
    @error('numerobu') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="correlativo" class="col-5 text-white">Numero consecutivo de hoja de descargo parcial</label>
    <input type="number" class="form-control col-md-5" wire:model="correlativo"  min="0" placeholder="0" >
    @error('correlativo') <span class="text-warning">{{$message}}</span> @enderror
    <span class="col-md-5 text-warning">
        {{$correlativo}}/{{$total}}
    </span>
</div>

<div class="row form-group">
    <label for="numeroco" class="col-5 text-white">Numero de contenedor</label>
    <input type="text" class="form-control col-md-5" wire:model="numeroco">
    @error('numeroco') <span class="text-warning">{{$message}}</span> @enderror
</div>








