@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')
@include('templates/messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte general de tecnicos</h6>
                </div>
                <div class="card-body">
                    <a href="{{  route('reports.technicians') }}"  class="btn btn-danger btn-block btn-lg-3 col-lg-3 mb-4" title="PDF"</a>
                        <i class="fas fa-file-pdf"></i>
                </div>
            </div>
        </div>
@endsection