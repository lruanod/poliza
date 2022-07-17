<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable =['nombre','usuario','pass','rol','uestado'];

    /***  relacion de estudiante a muchas polizas**/
    public function usuarios(){
        return $this->hasMany('App\Models\Poliza');
    }
}
