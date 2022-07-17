<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Pólizas</h4>
    </div>
</div>

<div class="col-md-6 mt-3">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );">
            <div class="card-header text-center text-white">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row form-group">
                            <label for="buscar" class="text-white">Busqueda</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inicio" class="text-white">Fecha incio</label>
                            <input type="datetime-local" wire:model="inicio" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="final" class="text-white">Fecha final</label>
                            <input type="datetime-local" wire:model="fin" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label  class="text-white">+ Póliza</label><br>
                        <button type="button" class="btn btn-success col-md-3" data-toggle="modal" data-target="#addpoliza" title="Registar Póliza">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-md-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista de pólizas</h4>
    </div><br>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                Consignatario
            </th>
            <th>
                Numero de duca
            </th>
            <th>
                Numero de declaración
            </th>
            <th>
                Clave de agente de adunas
            </th>
            <th>
                Unidad de medida en la declaración
            </th>
            <th>
                Descripción de la mercadaria
            </th>
            <th>
                Operador
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($polizas as $poliza)
            <tr>
                <td>
                    {{\carbon\carbon::parse($poliza->fecha)->format('d/m/Y H:i')}}
                </td>
                <td>
                    {{$poliza->consignatario}}
                </td>
                <td>
                    {{$poliza->numerod}}
                </td>
                <td>
                    {{$poliza->numerode}}
                </td>
                <td>
                    {{$poliza->clave}}
                </td>
                <td>
                    {{$poliza->medida}}
                </td>
                <td>
                    {{$poliza->descripcion}}
                </td>
                <td>
                    {{$poliza->usuario->nombre}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editpoliza" title="Editar poliza" wire:click="edit({{$poliza->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#adddetallev" title="ver detalle" wire:click="ver({{$poliza->id}})" >
                        <i class="bi-eye text-white"></i>
                    </button>
                    <button type="button" class="btn btn-warning"  title="imprimir" wire:click="imprimir({{$poliza->id}})"  wire:loading.attr="disabled" >
                        <i class="bi-printer text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$polizas->links()}}
</div>
