@extends('templates.base')
@section('title', 'Crear observacciones')
@section('header', 'Crear observacciones')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('observations.store') }}" method="POST">
            @csrf
            <div class="row form-group">
                <div class = "col-lg-12 mb-4">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
                </div>
            <div class="col-lg-12 mb-4">
                <a href="{{ route('observations.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
