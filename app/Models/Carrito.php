<?php

namespace App\Models;

use App\Models\Carrito;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    protected $fillable = ['id','codigo','fecha_orden','fecha_entrega','total_bs','estado','user_id'];

    //Un carrito fue creado por un solo usuario
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    //ShoppingCart ->Carrito

    public static function findOrCreateById($carrito_id)
    {
    	if($carrito_id){
    		if(Carrito::find($carrito_id)){
    		 	return Carrito::find($carrito_id);
    		}else{
    			return Carrito::create();
    		}

    	}else{
    		return Carrito::create();
    	}
        /*if($carrito_id){
            return Carrito::findOrFail($carrito_id);
        }else{
            return Carrito::create();
        }*/
    }

    public function carrito_detalles()
    {
    	return $this->hasMany(CarritoDetalle::class);
    }

    public function productos(){
    	return $this->belongsToMany(Producto::class,'carrito_detalles');
    }

    public function productoCount(){
    	return $this->productos()->count();
    }

}
