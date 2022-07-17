<?php

namespace App\Http\Livewire;

use App\Models\Detalle;
use App\Models\Poliza;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;
use Session;
use PDF;
Use Storage;

class PolizaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $poliza_id,$fecha,$total,$consignatario,$numerod,$numerode,$clave,$medida,$descripcion,$usuario_id,$fechae,$poliza_id2;
    public $detalle_id,$cantidadm,$numeroco,$correlativo,$numerobu;
    public $buscar, $inicio,$fin;

    public function  mount(){
          $this->usuario_id=session()->get('usuario_id');
          $this->medida='Kilogramos';
          $this->numerobu='0';
    }

    public function getPolizasProperty(){
        $busqueda='%'.$this->buscar.'%';
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Poliza::whereBetween('fecha',array($this->inicio,$this->fin))->paginate(8,['*'],'poliza');
        } else{
            return Poliza::orwhere('consignatario','like',$busqueda)->
            orwhere('numerod','like',$busqueda)->
            orwhere('numerode','like',$busqueda)->
            orderBy("created_at", "desc")->paginate(8,['*'],'poliza');
        }
    }

    public function getDetallesProperty(){
        return Detalle::where('poliza_id', '=',$this->poliza_id2)->paginate(5,['*'],'detalle');
    }
    public function render()
    {
        return view('livewire.poliza-component',[
            'polizas' => $this->getPolizasProperty(),
            'detalles' => $this->getDetallesProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'fecha'=> 'required',
            'total'=> 'required|numeric|min:0',
            'consignatario'=> 'required|string|max:120',
            'numerod'=> 'required|string|max:120',
            'numerode'=> 'required|string|max:120',
            'clave'=> 'required|numeric|min:0',
            'medida'=> 'required|string|max:120',

        ]);
        Poliza::create([
            'fecha'=> $this->fecha,
            'total'=> $this->total,
            'consignatario'=> $this->consignatario,
            'numerod'=> $this->numerod,
            'numerode'=> $this->numerode,
            'clave'=> $this->clave,
            'medida'=> $this->medida,
            'usuario_id'=> $this->usuario_id
        ]);

        $polizas= Poliza::where('consignatario','=',$this->consignatario)->where('numerod','=',$this->numerod)->where('usuario_id','=',session()->get('usuario_id'))->get();
        foreach ( $polizas as $poliza){
            $this->poliza_id= $poliza->id;
        }
        for ($i=1; $i <=$this->total; $i++) {
            Detalle::create([
                'descripcion' => "",
                'cantidadm' => "",
                'numeroco' => "",
                'correlativo' => $i,
                'numerobu' => 0,
                'poliza_id' => $this->poliza_id
            ]);
        }
        $this->msjexito();
        $this->default();
    }

    public  function adddetalle(){
        if(Detalle::where('poliza_id',$this->poliza_id2)->orderBy("created_at", "asc")->count() > 0) {
            $detalle = Detalle::where('poliza_id', $this->poliza_id2)->orderBy("created_at", "asc")->get();
            Detalle::create([
                'descripcion' => "",
                'cantidadm' => "",
                'numeroco' => "",
                'correlativo' => ($detalle->count() + 1),
                'numerobu' => 0,
                'poliza_id' => $this->poliza_id2
            ]);
            $poliza= Poliza::find($this->poliza_id2);
            $poliza->update([
                'total'=> ($detalle->count() + 1)
            ]);
        } else{
            Detalle::create([
                'descripcion' => "",
                'cantidadm' => "",
                'numeroco' => "",
                'correlativo' => 1,
                'numerobu' => 0,
                'poliza_id' => $this->poliza_id2
            ]);

            $poliza= Poliza::find($this->poliza_id2);
            $poliza->update([
                'total'=> 1
            ]);
        }
    }
    public function edit($id){
        $poliza= Poliza::find($id);
        $this->poliza_id = $poliza->id;
        $this->fecha = $poliza->fecha;
        $this->fechae = $poliza->fecha;
        $this->total = $poliza->total;
        $this->consignatario = $poliza->consignatario;
        $this->numerod = $poliza->numerod;
        $this->numerode = $poliza->numerode;
        $this->clave = $poliza->clave;
        $this->medida = $poliza->medida;
    }

    public function update(){
        $this->validate([
            'fecha'=> 'required',
            'total'=> 'required|numeric|min:0',
            'consignatario'=> 'required|string|max:120',
            'numerod'=> 'required|string|max:120',
            'numerode'=> 'required|string|max:120',
            'clave'=> 'required|numeric|min:0',
            'medida'=> 'required|string|max:120',
        ]);

        $poliza= Poliza::find($this->poliza_id);
        $poliza->update([
            'fecha'=> $this->fecha,
            'total'=> $this->total,
            'consignatario'=> $this->consignatario,
            'numerod'=> $this->numerod,
            'numerode'=> $this->numerode,
            'clave'=> $this->clave,
            'medida'=> $this->medida,
        ]);
        $this->msjedit();
        $this->default();

    }

    public function edit2($id){
        $detalle= Detalle::find($id);
        $this->detalle_id = $detalle->id;
        $this->cantidadm = $detalle->cantidadm;
        $this->numeroco = $detalle->numeroco;
        $this->correlativo = $detalle->correlativo;
        $this->numerobu = $detalle->numerobu;
        $this->poliza_id = $detalle->poliza_id;

        $this->fecha = $detalle->poliza->fecha;
        $this->fechae = $detalle->poliza->fecha;
        $this->total = $detalle->poliza->total;
        $this->consignatario = $detalle->poliza->consignatario;
        $this->numerod = $detalle->poliza->numerod;
        $this->numerode = $detalle->poliza->numerode;
        $this->clave = $detalle->poliza->clave;
        $this->medida = $detalle->poliza->medida;
        $this->descripcion = $detalle->descripcion;

    }

    public function update2(){
        $this->validate([
            'descripcion'=> 'required|string|max:1000',
            'cantidadm'=> 'required|string|max:120',
            'numeroco'=> 'required|string|max:120',
            'correlativo'=> 'required|numeric|min:0',
            'numerobu'=> 'required|string|max:120',
        ]);

        $detalle= Detalle::find($this->detalle_id);
        $detalle->update([
            'descripcion'=> $this->descripcion,
            'cantidadm'=> $this->cantidadm,
            'numeroco'=> $this->numeroco,
            'correlativo'=> $this->correlativo,
            'numerobu'=> $this->numerobu,
        ]);
        $this->msjedit2();
        $this->default2();
    }

    public  function  eliminar($id){
        $detalle= Detalle::find($id);
        $this->total=$detalle->poliza->total;
        $this->poliza_id=$detalle->poliza_id;
        Detalle::destroy($id);
        $detalles= Detalle::where('poliza_id','=',$this->poliza_id)->orderBy("created_at", "asc")->get();
        $cont=1;
            foreach ($detalles as $det){
                $detalle2= Detalle::find($det->id);
                $detalle2->update([
                    'correlativo' => $cont
                ]);
                $cont=$cont+1;
            }
        $poliza= Poliza::find($this->poliza_id);
        $poliza->update([
            'total'=> $this->total-1,
        ]);



        $this->msjeliminar();
    }

    public function ver($id){
        $this->poliza_id2=$id;
        $this->resetPage();
    }

    public function imprimir($id){

        $detalles=Detalle::where('poliza_id','=',$id)->get();
        $this->msjexitopdf();
        $this->resetPage();
        $this->redirect('/polizas');
        $pdf = PDF::loadView('polizaspdf',compact('detalles'))->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'polizas-'.now().'.pdf');




    }
    public function default(){
        $this->fecha='';
        $this->total='';
        $this->consignatario='';
        $this->numerod='';
        $this->numerode='';
        $this->clave='';
        $this->medida='';
        $this->descripcion='';
        $this->poliza_id='';
    }

    public function default2(){
        $this->cantidadm='';
        $this->numeroco='';
        $this->correlativo='';
        $this->numerobu='';
        $this->poliza_id='';
        $this->detalle_id='';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Póliza registrada correctamente']);
    }

    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alert',['message'=>'PDF generado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Póliza editada correctamente']);
    }
    public function msjeliminar(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Detalle eliminado']);
    }
    public function msjedit2(){
        $this->dispatchBrowserEvent('alert4',['message'=>'Detalle de póliza editado correctamente']);
    }
}
