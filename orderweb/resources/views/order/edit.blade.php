@extends('templates.base')
@section('title', 'Editar órden')
@section('header', 'Editar órden')
@section('content')
@include('templates/messages')

{{-- Mensaje de ayuda --}}
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('order.update', $order['id']) }} method=" POST">
            @csrf {{-- medida de seguridad de laravel para evitar ataques --}}
            @method('PUT')
            <div class="row form-group">
                <div class="col-lg-6 mb-4">
                    <label for="legalization_date">Fecha legalización</label>
                    <input type="date" id="legalization_date" name="legalization_date"
                        value="{{ $order['legalization_date'] }}" required class="form-control">
                </div>
                <div class="col-lg-6 mb-4">
                    <label for="address">Dirección</label>
                    <input type="text" id="address" name="address" value="{{ $order['address'] }}" required
                        class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-lg-4 mb-4">
                    <label for="city">Ciudad</label>
                    <select name="causal" id="causal" class="form-control">
                        @foreach ($cities as $city)
                        <option value="{{ $city['value'] }}" {{ $city['value']==$order['city'] ? 'selected' : '' }}>{{
                            $city['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 mb-4">
                    <label for="causal">Causa</label>
                    <select name="causal" id="causal" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($causals as $causal)
                        <option value="{{ $causal['id'] }}" {{ $causal['id']==$order['causal_id'] ? 'selected' : '' }}>
                            {{ $causal['description'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 mb-4">
                    <label for="observation_id">Observación</label>
                    <select name="observation_id" id="observation_id" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($observations as $observation)
                        <option value="{{ $observation['id'] }}" {{ $observation['id']==$order['observation_id']
                            ? 'selected' : '' }}>
                            {{ $observation['description'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
        </form>

        <hr>

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="font-weight-bold text-primary m-0">Añadir/Retirar actividades</h6>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="table_data">Actividades disponibles</label>
                                <table id="table-data" class="table table-striped table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Descripción</th>
                                        <th>Horas</th>
                                        <th>Agregar</th>
                                    </thead>
                                    <tbody>
                                        @if (count($availableActivities) == 0)
                                            <tr>
                                                <td colspan="4">
                                                    No existen actividades disponibles
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($availableActivities as $activity)
                                            <tr>
                                                <td>{{ $activity->id }}</td>
                                                <td>{{ $activity->description }}</td>
                                                <td>{{ $activity->hours }}</td>
                                                <td>
                                                    <a href="{{ route('order.add_activity', [$order['id'], $activity->id]) }}" class="btn btn-primary btn-circle bt-sm" title="Agregar">
                                                        <i class="fas fa-fw fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <label for="table_data">Actividades agregadas</label>
                                <table id="table-data" class="table table-striped table-hover">
                                    <thead>
                                        <th>Id</th>
                                        <th>Descripción</th>
                                        <th>Horas</th>
                                        <th>Retirar</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                        @if (count($availableActivities) == 0)
                                            <tr>
                                                <td colspan="4">
                                                    No existen actividades disponibles
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($addedActivities as $activity)
                                            <tr>
                                                <td>{{ $activity->id }}</td>
                                                <td>{{ $activity->description }}</td>
                                                <td>{{ $activity->hours }}</td>
                                                <td>
                                                    <a href="{{ route('order.remove_activity', [$order['id'], $activity->id]) }}" class="btn btn-danger btn-circle bt-sm" title="Agregar">
                                                        <i class="fas fa-fw fa-minus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection