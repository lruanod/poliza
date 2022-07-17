<!doctype html>
<html lang="es">
<head>
    <title>Polizas</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        table{
            width: 50%;
            height: 300px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-12" >
        @foreach($detalles as $detalle)
            <div style="page-break-inside: avoid;">
        <span>SUPERINTENDECIA DE ADMINISTACIÓN TRIBUTARIA</span><br>
        <span>HOJA DE DESCARGO PARCIAL</span><br>
        <span>FECHA:&nbsp;{{\carbon\carbon::parse($detalle->poliza->fecha)->format('d/m/Y H:i')}}</span><br>
        <table class="table" style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                <tr>
                    <td width="100" height="35">
                        CONSIGNATARIO:<br>
                        <b>{{$detalle->poliza->consignatario}}</b>
                    </td>
                    <td width="100" height="35">
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                        <br>
                            <span> <center>Impresión del sistema selectivo y aleatorio</center></span>
                        <br>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr style="border-color: #1a1e21 #1a1e21 #FFFFFF #1a1e21;  border-width: 2px ; border-style: ridge; " >
                    <td width="100" height="35" >1.NÚMERO DE DUCA:</td>
                    <td width="100" height="35" >
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px"> {{$detalle->poliza->numerod}}</span>
                        </fieldset>

                    </td>
                </tr>
                <tr style="border-color: #FFFFFF #1a1e21 #1a1e21  #1a1e21;  border-width: 2px ; border-style: ridge; ">
                    <td>NÚMERO DE DECLARACIÓN:</td>
                    <td>
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->poliza->numerode}}</span>
                        </fieldset>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td width="100" height="56">2.CLAVE DE AGENTE DE ADUANAS:</td>
                    <td width="100" height="56">
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->poliza->clave}}</span>
                        </fieldset>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td width="100" height="56">3.UNIDAD DE MEDIAS UTILIZADAS EN LA DECLARACIÓN ORIGINAL</td>
                    <td width="100" height="56">
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->poliza->medida}}</span>
                        </fieldset>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td  width="100" height="56" >4.CANTIDAD DE MERCANCÍA PRESENTADA EN PARCIAL</td>
                    <td  width="100" height="56">
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->cantidadm}}</span>
                        </fieldset>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td  width="100" height="56" >5.CANTIDAD DE BULTOS POR CONTENEDOR</td>
                    <td  width="100" height="56" >
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->numerobu}}</span>
                        </fieldset>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td  width="100" height="56" >6.DESCRIPCIÓN DE MERCANCÍA</td>
                    <td  width="100" height="56" >
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->descripcion}}</span>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td  width="100" height="56" >7.NÚMERO CONSECUTIVO DE HOJA DE DESCARGO PARCIAL</td>
                    <td  width="100" height="56" >
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                            <span style="margin-left: 1px">{{$detalle->correlativo}}&nbsp;DE&nbsp;{{$detalle->poliza->total}}</span>
                        </fieldset>
                    </td>
                </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                <tr style="border-width: 2px; border-style: ridge; border-color: #1a1e21">
                    <td  width="100" height="56" >8.NÚMERO DE CONTENEDOR</td>
                    <td  width="100" height="56" >
                        <fieldset style="border-width: 2px; border-style: ridge; border-color: #1a1e21; margin-top: 2px; margin-bottom: 2px; margin-left: 2px; margin-right: 2px">
                        <span style="margin-left: 1px">{{$detalle->numeroco}}</span>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>
            </div>
        @endforeach

    </div>
</div>
</body>
</html>


