@extends('templates.base')
@section('title', 'Editar Tecnico')
@section('header', 'Editar Tecnico')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('technician.update', $technician['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class = "col-lg-12 mb-4">
                    <label for="description">Id</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                                <div class = "col-lg-12 mb-4">
                    <label for="description">Documento</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                                <div class = "col-lg-12 mb-4">
                    <label for="speciality">Especialidad</label>
                    <input list="specialites-list" class="form-control" name="speciality" id="speciality" required>
                    <datalist id="specialites-list">
                        <option>Instalacion de redes</option>
                        <option>Construccion</option>
                        <option>Lectura de redes</option>
                        <option>Plomeria</option>
                    </datalist>
                </div>
                                <div class = "col-lg-12 mb-4">
                    <label for="description">Telefono</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
                </div>
            <div class="col-lg-12 mb-4">
                <a href="{{ route('technician.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
