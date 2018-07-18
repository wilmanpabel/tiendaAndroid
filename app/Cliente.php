<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Cliente extends Model
{
    public function compras(){
        return $this->belongsToMany(Producto::class);
    }
}
