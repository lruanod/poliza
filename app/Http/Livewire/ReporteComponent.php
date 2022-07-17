<?php

namespace App\Http\Livewire;
use App\Models\Detalle;
use Livewire\Component;
use PDF;

class ReporteComponent extends Component
{
    public  $inicio,$fin;

    public function render()
    {
        return view('livewire.reporte-component');
    }

    public function imprimir(){
        $this->validate([
            'inicio'=> 'required',
            'fin'=> 'required'
        ]);
        $detalles=Detalle::join('polizas','poliza_id','polizas.id')->whereBetween('polizas.fecha',array($this->inicio,$this->fin))->get();
        $this->msjexitopdf();
       // $this->redirect('/repotes');
        $pdf = PDF::loadView('livewire.reportes.polizas2pdf', compact('detalles'))->output();
        set_time_limit(600);
          return response()->streamDownload(
             function () use ($pdf){
                echo $pdf;
           }, 'polizas-'.now().'.pdf');
         $this->default();

    }
    public function default(){
        $this->inicio='';
        $this->fin='';
    }


    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alert',['message'=>'PDF generado correctamente']);
    }

}
