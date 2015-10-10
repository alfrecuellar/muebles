@extends('layout.crud')
@section('title')
    <h1>
      Materiles
      <small>Seccion para administrar los materiles</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url() }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Materiles</li>
    </ol>
@endsection

@section('add_title', 'Material')
@section('add_template')
  @include('resource.addForm')
@endsection

@section('edit_title', 'Editar Material')
@section('edit_template')
  @include('resource.editForm')
@endsection

@section('show_title', 'Material')
@section('show_template')
  @include('resource.show')
@endsection

@section('table_template')
  @include('resource.table')
@endsection

@section('foot')
  <script type="text/javascript" src="{{ asset('js/ac.resource.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ac.resource.table.js') }}"></script>
@endsection