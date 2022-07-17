<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable =['descripcion','cantidadm','numeroco','correlativo','numerobu','poliza_id'];


    /***  relacion de poliza solo tiene un usuario**/
    public function poliza(){
        return $this->belongsTo('App\Models\Poliza');
    }
}
