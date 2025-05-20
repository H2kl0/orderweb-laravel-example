@extends('templates.base')
@section('title', 'Observacciones')
@section('header', 'Observacciones')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 d-grid gap-2 d-md-block">
        <a href="{{ route('observations.create') }}" class="btn btn-primary">Crear</a>
    </div>
</div>

@include('templates.messages')
<div class="row">
    <div class="col-lg-12 mb-4">
        <table id="table_causals" class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Descrición prueba</td>
                    <td>
                        <a href="#" title="Editar" class="btn btn-primary btn-circle btn-sm">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="#" title="Eliminar" class="btn btn-danger btn-circle btn-sm"
                          onclick="return remove();">
                        <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>    
    </div>    
</div>
@endsection