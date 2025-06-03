@extends('templates.base')
@section('title', 'Activity')
@section('header', 'Activity')
@section('content')
@include('templates.messages')
<div class="d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4">
            <form action="{{ route('activity.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" id="description" name="description" required value="{{ old('hours') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="time">Horas</label>
                        <input type="text" class="form-control" id="time" name="time" required  value="{{ old('hours') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="technician_id">Técnico</label>
                        <select name="technician_id" id="technician_id" class="form-control" required>
                            <option value="">Seleccione</option>     

                            @foreach ($technicians as $technician)
                            <option value="{{ $technician['id'] }}" 
                            @if (old('technician_id')== $technician['id']) selected @endif>
                            {{ $technician['name'] }}    
                            </option>   
                            @endforeach

                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="type_activity_id">Tipo de actividad</label>
                        <select name="type_activity_id" id="type_activity_id" class="form-control" required>
                            <option value="">Seleccione</option>
                            @foreach ($types as $type)
                            <option value="{{ $type['id'] }}" 
                            @if (old('type_activity_id')== $type['id']) selected @endif>
                            {{ $type['description'] }}    
                            </option>   
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('activity.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
