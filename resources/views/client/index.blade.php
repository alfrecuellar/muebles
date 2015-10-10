@extends('layout.crud')
@section('title')
    <h1>
      Clientes
      <small>Seccion para administrar los clientes</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url() }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Clientes</li>
    </ol>
@endsection

@section('add_title', 'Cliente')
@section('add_template')
  @include('client.addForm')
@endsection

@section('edit_title', 'Editar Cliente')
@section('edit_template')
  @include('client.editForm')
@endsection

@section('show_title', 'Cliente')
@section('show_template')
  @include('client.show')
@endsection

@section('table_template')
  @include('client.table')
@endsection

@section('foot')
  <script type="text/javascript" src="{{ asset('js/ac.client.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ac.client.table.js') }}"></script>
@endsection