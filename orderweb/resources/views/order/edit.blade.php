@extends('templates.base')
@section('title', 'Editar orden')
@section('header', 'Editar orden')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row form-group">
                <div class = "col-lg-12 mb-4">
                    <label for="description">fecha de legalización</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                value="{{ $order->legalization_date }}">
                </div>
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Dirreción</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                value="{{ $order->address }}">
                </div>
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Ciudad</label>
                    <select name="city" id="city" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city['value'] }}" @if ($city['value'] == $order->city) selected @endif>{{ $city['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Causal</label>
                    <select name="order" id="order" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ( $causals as  $causal)
                        <option value="{{ $causal->id }}"> @if (causal->id == $order->causal_id)
                            selected

                        @endif>{{ $causal->description }}
                        </option>
                        
                    @endforeach
                    </select>
                </div>  
                    <div class = "col-lg-12 mb-4">
                    <label for="description">Observaciones</label>
                    <select name="order" id="order" class="form-control" required>
                    <option value="">Seleccione</option>
                    @foreach ( $observations as  $observation)
                        <option value="{{ $observation->id }}">{{ $observation->description }}</option>
                    @endforeach
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

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class = "card-header">
                            <h6 class="font-weight-bold text-primary m-0">Añadir/retirar actividades</h6>
                        </div>
                        <div class = "card-body">
                            <div class="row  form group">
                                <div clas = "col-lg-12 mb-4">
                                    <label for="description">Actividades disponibles</label>
                                </div>
                                <div class = "col-lg-6 mb-4">
                                    <label for="table_data">Actividades agregadas</label>

            
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
