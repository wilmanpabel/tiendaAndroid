@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <button class="btn btn-primary">Agregar productos</button></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <table class="table">
                    <thead>
                        <tr>
                            <td>Tienda</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>stock</td>
                            <td>Precio</td>
                            <td>accion</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->productos as $producto)
                        <tr>
                            <td>{{ $producto->tienda->nombre}}</td>
                            <td>{{ $producto->nombre}}</td>
                            <td>{{ $producto->descripcion}}</td>
                            <td>{{ $producto->stock}}</td>
                            <td>{{ $producto->precio}}</td>
                            <td><button class="btn btn-info">Ver</button></td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
