<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodetalle extends Model
{
    protected $table = 'prodetalle';
    protected $fillable = ['entrada','sopa','segundo','postre','refresco','especificacion','producto_id','estado'];

    public function producto()
    {
        return $this->belongsTo(Producto::class );
    }

}
