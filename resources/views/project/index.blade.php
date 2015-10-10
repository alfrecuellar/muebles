@section('head')
  <link rel="stylesheet" href="{{ asset('css/typeahead.css') }}">
@endsection

@extends('layout.crud')
@section('title')
    <h1>
      Proyectos
      <small>Seccion para administrar los proyectos</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url() }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Proyectos</li>
    </ol>
@endsection

@section('add_title', 'Proyecto')
@section('add_template')
  @include('project.addForm')
@endsection

@section('edit_title', 'Editar Proyecto')
@section('edit_template')
  @include('project.editForm')
@endsection

@section('show_title', 'Proyecto')
@section('show_template')
  @include('project.show')
@endsection

@section('table_template')
  @include('project.table')
@endsection

@section('relation_template')
  @include('client.relation')
@endsection

@section('foot')
  <script type="text/javascript" src="{{ asset('vendor/typeahead.js/dist/typeahead.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ac.client.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ac.client.relation.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ac.project.table.js') }}"></script>
@endsection
