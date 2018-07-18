@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Dashboard  <button class="btn btn-primary float-rigth">Agregar tienda</button></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Rubro</td>
                            <td>Direccion</td>
                            <td>Accion</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->tiendas as $tienda)
                        <tr>
                            <td>{{ $tienda->nombre}}</td>
                            <td>{{ $tienda->rubro}}</td>
                            <td>{{ $tienda->direccion}}</td>
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
