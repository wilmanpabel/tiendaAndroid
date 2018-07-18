<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/cliente', 'ClienteController');
Route::resource('/producto', 'ProductoController');
Route::resource('/tienda', 'TiendaController');
Route::resource('/pedidos', 'VentasController');



////////ESTO DEVE SER DE LA API
use App\Cliente;
Route::get('/ingresar/{usuario}/{contrasenia}/',function($usuario,$contrasenia){
    $cli=Cliente::where('usuario',$usuario)->first();
    if($cli){
        $cli2=Cliente::where('contrasenia',$contrasenia)->first();
        if($cli2){
            return $cli2->id;
        }else{
            return 0;
        }
    }else{
        return 0;
    }
});

Route::get('/registrarme/{nombre}/{usuario}/{contrasenia}',function($nombre,$usuario,$contrasenia){
    $clientes=new Cliente;
    $clientes->nombre=$nombre;
    $clientes->contrasenia=$contrasenia;
    $clientes->usuario=$usuario;
    if($clientes->save()){
        return $clientes->id;
    }else{
        return 'error';
    }
});

Route::get('/empresas',function(){
    return $pasajes=App\Tienda::all()->toArray();
});

Route::get('/pasajeEmpresa/{id}',function($id){
    return $pasajes=App\Producto::where('tienda_id',$id)->get();
});

Route::get('/Mispasajes/{idu}',function($idu){
     $cliente=App\Cliente::find($idu);
     $psajes;
     foreach ($cliente->compras as $compra){
         $a[]=[
             'pasajes_id'=>$compra->nombre." ".$compra->precio
             ];
     }
     return $a;
});

Route::get('/comprar/{idcliente}/{idpasaje}/',function($idcliente,$idpasaje){
    $cliente=App\Cliente::find($idcliente);
    $producto=App\Producto::find($idpasaje);
    $producto->stock=$producto->stock-1;
    $producto->save();
    $cliente->compras()->attach($idpasaje);
    return 'Se realizo la compra con exito';
});

Route::get('clienteDatos/{o}',function($o){
    $cliD=App\Cliente::find($o);
    return $cliD->nombre;
});




