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
                @foreach ($observations as $observation)
                <tr>
                    <td>{{ $observation['id'] }}</td>
                    <td>{{ $observation['description'] }}</td>
                    <td>
                        <a href="{{ route('observations.edit', $observation['id']) }}" title="Editar" class="btn btn-primary btn-circle btn-sm">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('observations.destroy', $observation['id']) }}" title="Eliminar" class="btn btn-danger btn-circle btn-sm"
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
    <script src="{{ asset('js/general.js') }}"></script>
@endsection