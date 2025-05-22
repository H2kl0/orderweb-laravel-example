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
                @foreach ($technicians as $technician)
                <tr>
                    <td>{{ $technician['id'] }}</td>
                    <td>{{ $technician['document'] }}</td>
                    <td>{{ $technician['speciality'] }}</td>
                    <td>{{ $technician['phone'] }}</td>
                    <td>                        
                        <a href="{{ route('technician.edit', $technician['id']) }}" title="Editar" class="btn btn-primary btn-circle btn-sm">
                        <i class="far fa-edit"></i>
                        </a>                        
                        <a href="{{ route('technician.destroy', $technician['id']) }}" title="Eliminar" class="btn btn-danger btn-circle btn-sm"
                          onclick="return remove();">
                        <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>    
    </div>    
</div>
@endsection


@section('scripts')
    <script src="{{  asset('js/general.js') }}"></script>
@endsection