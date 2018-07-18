<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{

      public function usuario(){
        return $this->belongsTo(User::class);
      }

      public function productos(){
        return $this->hasMany(Producto::class);
      }

     // public function pedidos(){
     //   return $this->belongsToMany(Producto::class,'cliente_producto');
     // }


}
