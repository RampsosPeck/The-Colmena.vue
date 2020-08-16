<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
    	'nombre',
    	'slug',
    	'codigo',
    	'descripcion',
    	'descuento',
    	'precio',
    	'stock',
    	'cant_personas',
    	'oferta',
    	'estado',
    	'category_id'];

    public function categoria(){
    	return $this->belongsTo(Categoria::class);
    }

    public function fotos(){
        return $this->hasMany(ProductoFoto::class);
    }

    //Accesor para imagen por defecto
    public function getImgproductoUrlAttribute()
    {
        $imgUno = $this->fotos()->first();

        if($imgUno){
            //return $imgUno->imagen;
            return '/img/producto/'.$imgUno->imagen;
        }
        return '/img/productos/default.jpg';

        /*if(substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/images/producto/'.$this->imagen;*/
    }


    //Accesor para imagen favorito
    public function getImgProFavoritoAttribute()
    {
        $imgFavorito = $this->fotos()->where('favorito',true)->first();

        if(!$imgFavorito){ //En caso que la imagen no sea destacada
            $imgFavorito = $this->fotos()->first();
        }
        if($imgFavorito){
            return $imgFavorito->url;//del otro mutator que hicimos en el modelo ProductImage
        }
        return '/img/default.jpg';
    }

    public function prodetalle()
    {
        return $this->hasOne(Prodetalle::class, 'producto_id');
    }

    public function carrito_detalle()
    {
        return $this->belongsTo(CarritoDetalle::class);
    }
}
