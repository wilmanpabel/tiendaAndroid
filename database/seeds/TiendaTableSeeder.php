<?php

use Illuminate\Database\Seeder;
use App\Tienda;
use App\User;
use App\Producto;
use App\Cliente;
class TiendaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tienda::truncate();
        User::truncate();
        Producto::truncate();
        Cliente::truncate();
        $user=User::create([
             'name'=>'Pabel Vasquez Garcia',
             'email'=>'wilmanpabel@gmail.com',
             'password'=>bcrypt('123'),
        ]);
        $tienda=Tienda::create([
             'direccion'=>'Av 28 de julio 2032',
             'descripcion'=>'Venta de articulos en general de libreria',
             'rubro'=>'libreria',
             'user_id'=>$user->id,
             'nombre'=>'Libros Sac',
             'coordenadas'=>'-12.092206, -77.032280',
        ]);

        $user->tiendas()->save($tienda);
        for($i=1;$i<11;$i++){
            $productos=Producto::create([
                  'nombre'=>'Producto '.$i,
                  'tienda_id'=>$tienda->id,
                  'user_id'=>$user->id,
                  'descripcion'=>'Descripcion del producto '.$i,
                  'stock'=>$i,
                  'precio'=>'10.'.$i,
            ]);
        }

        $user1=User::create([
             'name'=>'Pinao ',
             'email'=>'usuario1@gmail.com',
             'password'=>bcrypt('123'),
        ]);
        $tienda1=Tienda::create([
             'direccion'=>'Av 28 de julio 2032',
             'descripcion'=>'Venta de articulos en general de libreria',
             'rubro'=>'libreria',
             'user_id'=>$user->id,
             'nombre'=>'Minimarquet Abc',
             'coordenadas'=>'-12.092555, -77.032280',
        ]);

        $user1->tiendas()->save($tienda);
        for($i=1;$i<6;$i++){
            $productos1=Producto::create([
                  'nombre'=>'Miniarquet '.$i,
                  'tienda_id'=>$tienda1->id,
                  'user_id'=>$user1->id,
                  'descripcion'=>'Descripcion del producto '.$i,
                  'stock'=>$i,
                  'precio'=>'10.'.$i,
            ]);
        }

        Cliente::create([
            'nombre'=>'Daniela Castro',
            'usuario'=>'dani',
            'contrasenia'=>'123',
        ]);

    }
}
