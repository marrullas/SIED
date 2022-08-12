@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Familia: {{$familia->nombre}} - {{$familia->apellido}} </h1>
                <h1 class="m-0">Evento: {{$familia->evento->descripcion}} </h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
    <a href="{{ route('admin.familias.index',$familia->evento) }}" class="btn btn-danger mb-3">Regresar</a>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-3">Edad: </dt>
                            <dd class="col-sm-9">{{$familia->edad}}</dd>

                            <dt class="col-sm-3">Documento: </dt>
                            <dd class="col-sm-9">
                                {{$familia->tipoDocumento->nombre}}: {{$familia->documento}}
                            </dd>
                            <dt class="col-sm-3 text-truncate">Genero</dt>
                            <dd class="col-sm-9"> {{$familia->genero->nombre}}</dd>

                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-9">{{$familia->telefono}}</dd>

                            <dt class="col-sm-3 text-truncate">Dirección</dt>
                            <dd class="col-sm-9"> {{$familia->direccion}}</dd>

                            <dt class="col-sm-3">Destalles</dt>
                            <dd class="col-sm-9">
                                <dl class="row">
                                    <dt class="col-sm-4">Numero de miembros</dt>
                                    <dd class="col-sm-8">{{$familia->numero_miembros}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4">Numero personas mayores de 65</dt>
                                    <dd class="col-sm-8">{{$familia->mayores65}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4">Numero personas menores de 18</dt>
                                    <dd class="col-sm-8">{{$familia->menores18}}</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4">Numero personas mayores 18</dt>
                                    <dd class="col-sm-8">{{$familia->mayores18}}</dd>
                                </dl>
                            <dt class="col-sm-3">Observaciones: </dt>
                            <dd class="col-sm-9">
                                <p> {{$familia->observaciones}}</p>
                            </dd>
                            </dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="fw-light text-center text-lg-start mt-4 mb-0">imagenes atenciones</h1> 
                        <hr class="mt-2 mb-5">
                        <div class="row text-center text-lg-start">
                            @if(count($familia->atenciones) > 0)
                           @foreach($familia->atenciones as $atencion)
                           @if($atencion->foto1 != null)
                            <div class="col-lg-3 col-md-4 col-6">
                            <figure class="figure">
                            <a href="{{ url('images/eventos/atenciones/'.$familia->evento_id.'/'.$atencion->foto1) }}" class="d-block mb-4 h-100" target="_blank">
                            <img class="img-fluid img-thumbnail" src="{{ url('images/eventos/atenciones/'.$familia->evento_id.'/'.$atencion->foto1) }}" alt="{{$atencion->descripcion}}">
                            </a>
                                <figcaption class="figure-caption">{{$atencion->tipoayuda->nombre}}</figcaption>
                            </figure>


                            </div>
                            @endif
                            @if($atencion->foto2 != null)
                            <div class="col-lg-3 col-md-4 col-6">
                            <figure class="figure">
                            <a href="{{ url('images/eventos/atenciones/'.$familia->evento_id.'/'.$atencion->foto2) }}" class="d-block mb-4 h-100" target="_blank">
                            <img class="img-fluid img-thumbnail" src="{{ url('images/eventos/atenciones/'.$familia->evento_id.'/'.$atencion->foto2) }}" alt="{{$atencion->descripcion}}">
                            </a>
                                <figcaption class="figure-caption">{{$atencion->tipoayuda->nombre}}</figcaption>
                            </figure>


                            </div>                         
                            @endif
                            @endforeach
                            @else
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="{{ url('images/no-image.png') }}" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="{{ url('images/eventos/no-image.png') }}" alt="No hay imagenes">
                                </a>
                            </div>
                            @endif
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