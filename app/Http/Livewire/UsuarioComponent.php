<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $usuario_id,$nombre,$usuario,$pass,$rol,$uestado;
    public $buscar;

    public function getUsuariosProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Usuario::where('nombre','like',$busqueda)->orwhere('rol','like',$busqueda)->simplePaginate(8);
    }
    public function render()
    {
        return view('livewire.usuario-component',[
            'usuarios' => $this->getUsuariosProperty()
        ]);
    }
    public function store(){
        $this->validate([
            'nombre'=> 'required|string|max:75',
            'usuario'=> 'required|string|max:45|unique:usuarios',
            'pass'=> 'required|string|min:7',
            'rol'=> 'required|string|max:45',
            'uestado'=> 'required|string|max:45'
        ]);
        Usuario::create([
            'nombre'=> $this->nombre,
            'usuario'=> $this->usuario,
            'pass'=> $this->pass,
            'rol'=> $this->rol,
            'uestado'=> $this->uestado
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $usuario= Usuario::find($id);
        $this->usuario_id = $usuario->id;
        $this->nombre = $usuario->nombre;
        $this->usuario = $usuario->usuario;
        $this->pass = $usuario->pass;
        $this->rol = $usuario->rol;
        $this->uestado = $usuario->uestado;
    }

    public function update(){
        $this->validate([
            'nombre'=> 'required|string|max:75',
            'pass'=> 'required|string|min:7',
            'rol'=> 'required|string|max:45',
            'uestado'=> 'required|string|max:45'
        ]);

        $usuario= Usuario::find($this->usuario_id);
        $usuario->update([
            'nombre'=> $this->nombre,
            'pass'=> $this->pass,
            'rol'=> $this->rol,
            'uestado'=> $this->uestado
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->nombre = '';
        $this->usuario = '';
        $this->pass = '';
        $this->rol = '';
        $this->uestado = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Usuario registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Usuario editado correctamente']);
    }
}
