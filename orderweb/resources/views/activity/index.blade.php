@extends('templates.base')
@section('title', 'Listado de ordenes')
@section('header', 'Listado de ordenes')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 d-grid gap-2 d-md-block">
        <a href="{{ route('activity.create') }}" class="btn btn-primary">Crear</a>
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
                    <th>Horas</th>
                    <th>Tecnico</th>
                    <th>Tipo de actividad<</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Actividades prueba</td>
                    <td>10</td>
                    <td>Eltor tillador</td>
                    <td>TOC</td>
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

@section('scripts')
   <script src="{{  asset('js/general.js') }}"></script>

@endsection