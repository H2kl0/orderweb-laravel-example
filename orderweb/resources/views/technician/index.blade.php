@extends('templates.base')
@section('title', 'Listado de tecnicos')
@section('header', 'Listado de tecnicos')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 d-grid gap-2 d-md-block">
        <a href="{{ route('technician.create') }}" class="btn btn-primary">Crear</a>
    </div>
</div>

@include('templates.messages')
<div class="row">
    <div class="col-lg-12 mb-4">
        <table id="table_causals" class="table  table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Documento</th>
                    <th>Especialidad</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>11111218416</td>
                    <td>Medicina</td>
                    <td>123456789</td>
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