<!-- modal buscarcliente-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="adddetallev" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );">
                <h5 class="modal-title " id="adddetallev">
                        <h4 class="text-white">Detalle de la póliza</h4>
                </h5>
                    <button type="button" class="btn btn-success"  title="Agragar detalle" wire:click="adddetalle" >
                        <i class="bi-plus-circle text-white"></i>
                    </button>

                <button class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                   <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>
                                                Poliza
                                            </th>
                                            <th>
                                                Cantidad de mercancia presentada
                                            </th>
                                            <th>
                                                Cantidad de bultos por contenedor
                                            </th>
                                            <th>
                                                Numero consecutivo de hoja de descargo parcial
                                            </th>
                                            <th>
                                                Numero de contenedor
                                            </th>
                                            <th>
                                                Acción
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($detalles as $detalle)
                                            <tr>
                                                <td>
                                                  <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Fecha:
                                                                </td>
                                                                <td>
                                                                    {{\carbon\carbon::parse($detalle->poliza->fecha)->format('d/m/Y H:i')}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Consignatario:
                                                                </td>
                                                                <td>
                                                                    {{$detalle->poliza->consignatario}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Numero de duca:
                                                                </td>
                                                                <td>
                                                                    {{$detalle->poliza->numerod}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Numero de daclaración:
                                                                </td>
                                                                <td>
                                                                    {{$detalle->poliza->numerode}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Clave de agente de aduanas:
                                                                </td>
                                                                <td>
                                                                    {{$detalle->poliza->clave}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Unidad de medida utilizada en la declaración original:
                                                                </td>
                                                                <td>
                                                                    {{$detalle->poliza->medida}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Descripción de la mercaderia:
                                                                </td>
                                                                <td>
                                                                    {{$detalle->poliza->descripcion}}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                  </table>
                                                </td>
                                                <td>
                                                    {{$detalle->cantidadm}}
                                                </td>
                                                <td>
                                                    {{$detalle->numerobu}}
                                                </td>
                                                <td>
                                                    {{$detalle->correlativo}}/{{$detalle->poliza->total}}
                                                </td>
                                                <td>
                                                    {{$detalle->numeroco}}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#adddetalle" title="Editar detalle" wire:click="edit2({{$detalle->id}})" >
                                                        <i class="bi-pencil-fill text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger"   title="Eliminar detalle" wire:click="eliminar({{$detalle->id}})" >
                                                        <i class="bi-trash text-white"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                    {{$detalles->links()}}
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcliente-->
