@extends('templates.base')

@section('title', ' Edit Activity')
@section('header', 'Edit Activity')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-lg-8">
        <div class="card p-4">
            <form action="#" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="time">Horas</label>
                        <input type="text" class="form-control" id="time" name="time" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="technician_id">Técnico</label>
                        <select name="technician_id" id="technician_id" class="form-control" required>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="type_activity_id">Tipo de actividad</label>
                        <select name="type_activity_id" id="type_activity_id" class="form-control" required>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <a href="{{ route('activity.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
