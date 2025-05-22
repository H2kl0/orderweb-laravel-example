@extends('templates.base')
@section('title', 'Crear orden')
@section('header', 'Crear orden')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('order.store') }}" method="POST">

            @csrf
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <label for="legalization_date">Fecha de legalización</label>
                    <input type="text" class="form-control" id="legalization_date" name="legalization_date" required>
                </div>
                <div class="col-lg-6 mb-4">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="col-lg-6 mb-4">
                    <label for="city">Ciudad</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="Tulua">Tulua</option>
                        <option value="San Jose">San Jose</option>
                        <option value="San benito">San benito</option>
                        <option value="Santa Ana">Santa Ana</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label for="causal">Causal</label>
                    <select name="causal" id="causal" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($causals as $causal)
                            <option value="{{ $causal->id }}">{{ $causal->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 mb-4">
                    <label for="observation">Observaciones</label>
                    <select name="observation" id="observation" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($observations as $observation)
                            <option value="{{ $observation->id }}">{{ $observation->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-lightbulb"></i> Para añadir actividades a la orden, primero debe crearla y
                    luego dar clic en la acción de editar.
            </div>
    </div>
</div>
@endsection
