@extends('templates.base')
@section('title', 'Test2')
@section('content')

    <h1>Test</h1>
    <q>A la grande le puse pucca</q>
    <br><small>Homero J. simpons</small></br>
    <button onclick="showAlert()">Click!</button>

@endsection

@section('scripts')
    <script src="{{ asset('js/test.js') }}"></script>
@endsection
