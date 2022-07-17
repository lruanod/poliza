<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    protected $fillable =['fecha','total','consignatario','numerod','numerode','clave','medida','usuario_id'];

    /***  relacion de poliza solo tiene un usuario**/
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /***  relacion de estudiante a muchas polizas**/
    public function polizas(){
        return $this->hasMany('App\Models\Detalle');
    }

}
