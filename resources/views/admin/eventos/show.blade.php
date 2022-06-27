@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Evento: {{$evento->tipoEvento->nombre}} - {{$evento->zona->nombre}} Afectados: {{$evento->numero_afectados}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-3">Fecha: </dt>
                            <dd class="col-sm-9">{{$evento->fecha_hora_reporte}}</dd>

                            <dt class="col-sm-3">Descripción: </dt>
                            <dd class="col-sm-9">
                                <p> {{$evento->descripcion}}</p>
                            </dd>
                            <dt class="col-sm-3 text-truncate">¿Quien reporta?</dt>
                            <dd class="col-sm-9"> {{$evento->responsable_reporte}}</dd>

                            <dt class="col-sm-3">Fecha hora del evento</dt>
                            <dd class="col-sm-9">{{$evento->fecha_hora_evento}}</dd>

                            <dt class="col-sm-3 text-truncate">Responsable verificación</dt>
                            <dd class="col-sm-9"> {{$evento->responsable_verificacion}}</dd>

                            <dt class="col-sm-3">Destalles</dt>
                            <dd class="col-sm-9">
                                <dl class="row">
                                    <dt class="col-sm-4">Zona</dt>
                                    <dd class="col-sm-8">{{$evento->zona->nombre}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4">Tipo evento</dt>
                                    <dd class="col-sm-8">{{$evento->tipoEvento->nombre}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4">Estado evento</dt>
                                    <dd class="col-sm-8">{{$evento->estadoEvento->nombre}}</dd>
                                </dl>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.eventos.addfotos',$evento)}}" class="btn btn-primary mb-3">Agregar foto</a>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    <h1 class="fw-light text-center text-lg-start mt-4 mb-0">imagenes evento</h1>

<hr class="mt-2 mb-5">

<div class="row text-center text-lg-start">


    @if(count($evento->eventoFotos) > 0)

    @foreach($evento->eventoFotos as $eventoFoto)
    <div class="col-lg-3 col-md-4 col-6">
        <a href="{{ url('images/eventos/'.$eventoFoto->url) }}" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="{{ url('images/eventos/'.$eventoFoto->url) }}" alt="{{$eventoFoto->descripcion}}">
        </a>
    </div>
    @endforeach
    @else
    <div class="col-lg-3 col-md-4 col-6">
        <a href="{{ url('images/eventos/no-image.png') }}" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="{{ url('images/eventos/no-image.png') }}" alt="No hay imagenes">
        </a>
    </div>
    @endif

  <div class="col-lg-3 col-md-4 col-6">
    <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
    </a>
  </div>
  <div class="col-lg-3 col-md-4 col-6">
    <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
    </a>
  </div>
  <div class="col-lg-3 col-md-4 col-6">
    <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
    </a>
  </div>
  <div class="col-lg-3 col-md-4 col-6">
    <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
    </a>
  </div>
  <div class="col-lg-3 col-md-4 col-6">
    <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
    </a>
  </div>
  <div class="col-lg-3 col-md-4 col-6">
    <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
    </a>
  </div>


</div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#tasks_table').DataTable();
    });
</script>
@endsection