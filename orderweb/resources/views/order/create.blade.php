@extends('templates.base')
@section('title', 'Crear orden')
@section('header', 'Crear orden')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="#" method="POST">
            @csrf
            <div class="row form-group">
                <div class = "col-lg-12 mb-4">
                    <label for="description">fecha de legalización</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Dirreción</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Ciudad</label>
                    <select name="order" id="order" class="form-control" required>
                            <option value="Tulua">Tulua</option>
                            <option value="San Jose">San Jose</option>
                            <option value="San benito">San benito</option>
                            <option value="Santa Ana">Santa Ana</option>
                        </select>
                </div>
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Causal</label>
                    <select name="order" id="order" class="form-control" required>
                    <option value="">Seleccione</option>
                    </select>
                </div>  
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Observaciones</label>
                    <select name="order" id="order" class="form-control" required>
                    <option value="">Seleccione</option>
                    </select>
                </div>               
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
                </div>
            <div class="col-lg-12 mb-4">
                <a href="{{ route('order.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
