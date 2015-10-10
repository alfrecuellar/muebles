@extends('layout.index')

@section('title')
  <h1>
    Alfredo Cuellar
    <small>Muebles y Diseño</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url() }}"><i class="fa fa-home"></i> Home</a></li>
  </ol>
@endsection

@section('content')
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Cocina Luana</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body" style="background-color:#ecf0f5">
      <ul class="timeline">

        <li class="time-label"><span class="bg-red">10 Feb. 2014</span></li>
        <li>
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
              <h3 class="timeline-header">
                <a href="#">Support Team</a>
              </h3>
              <div class="timeline-body">
                Contenido de la linea de tiempo
              </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Hacer Algo</a>
              </div>
            </div>
        </li>

        <li class="time-label"><span class="bg-green">10 Feb. 2014</span></li>
        <li>
            <i class="fa fa-comments bg-yellow"></i>
            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
              <h3 class="timeline-header">
                <a href="#">Support Team</a>
              </h3>
              <div class="timeline-body">
                Contenido de la linea de tiempo
              </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Hacer Algo</a>
              </div>
            </div>
        </li>

        <li class="time-label"><span class="bg-blue">10 Feb. 2014</span></li>
        <li>
            <i class="fa fa-camera bg-maroon"></i>
            <div class="timeline-item">
              <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
              <h3 class="timeline-header">
                <a href="#">Fotos</a> commented on your post
              </h3>
              <div class="timeline-body">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
                <img src="http://placehold.it/150x100" alt="..." class="margin">
              </div>
              <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Hacer Algo</a>
              </div>
            </div>
        </li>

      </ul>
    </div>
    <div class="box-footer">
      Este es el footer
    </div>
  </div>

  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Cocina Iglesia Gonzales</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      
    </div>
  </div>
@endsection