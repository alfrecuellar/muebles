@extends('layout.index')

@section('content')

  <!-- CRUD Add -->
  <div id="crud_add" class="crud">
    <div class="box box-primary collapse">
      <div class="box-header with-border">
        <h3 class="box-title">@yield('add_title')</h3>
      </div>
      <div class="hbw"></div>
      <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
      </div>
    </div>
    <script class="hbt" type="text/x-handlebars-template">
      @yield('add_template')
    </script>
  </div>

  <!-- CRUD Edit -->
  <div id="crud_edit" class="crud">
    <div class="box box-primary collapse">
      <div class="box-header with-border">
        <h3 class="box-title">@yield('edit_title')</h3>
      </div>
      <div class="hbw"></div>
      <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
      </div>
    </div>
    <script class="hbt" type="text/x-handlebars-template">
      @yield('edit_template')
    </script>
  </div>

  <!-- CRUD Show -->
  <div id="crud_show" class="crud">
    <div class="box box-primary collapse">
      <div class="box-header with-border">
        <h3 class="box-title">@yield('show_title')</h3>
      </div>
      <div class="hbw"></div>
      <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
      </div>
    </div>
    <script class="hbt" type="text/x-handlebars-template">
      @yield('show_template')
    </script>
  </div>

  <!-- CRUD Table -->
  <div id="crud_table" class="crud">
    <div class="box box-primary collapse in">
      <div class="box-header with-border">
        <a href="javascript:;" class="btn btn-app" data-action="add">
          <i class="fa fa-plus"></i> @yield('add_title')
        </a>
      </div>
      <div class="box-body hbw">
      </div>
      <div class="overlay">
        <i class="fa fa-refresh fa-spin"></i>
      </div>
    </div>

    <script class="hbt" type="text/x-handlebars-template">
      @yield('table_template')
    </script>
  </div>

  <div class="modal" id="crud_modal">
    <div class="modal-dialog">
      <div class="modal-content hbw"></div>
    </div>
  </div>

  @yield('relation_template')

@endsection
