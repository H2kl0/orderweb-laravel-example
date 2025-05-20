@extends('templates.base')
@section('title', 'Crear Tecnico')
@section('header', 'Crear Tecnico')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="#" method="POST">
            @csrf
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
                    <label for="description">Especialidad</label>
                    <input type="text" class="form-control" id="description" name="description" required>
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
