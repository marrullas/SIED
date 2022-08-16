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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
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
                                    <dd class="col-sm-8">{{$familia->parientes->count()+1}}</dd>
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

                        <a href="{{ route('admin.parientes.create',$familia->id) }}" class="btn btn-primary mb-3">Nuevo pariente</a>

                        <table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Documento </th>
                                    <th>Edad</th>
                                    <th>Genero</th>
                                    <th>Parentesco</th>
                                    <th>Telefono</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($familia->parientes as $pariente)
                                <tr>

                                    <td>{{$pariente->nombre}} {{$pariente->apellido}}</td>
                                    <td>{{$pariente->documento}}</td>
                                    <td>{{$pariente->edad}}</td>
                                    <td>{{$pariente->genero->nombre}}</td>
                                    <td>{{$pariente->parentesco->nombre}}</td>
                                    <td>{{$pariente->telefono}}</td>
                                    
                                    <td>
                                        <a href="{{ route('admin.parientes.edit', $pariente->id) }}" class="btn btn-success">
                                            <i class='fa fa-edit' style='color: white'></i>
                                        </a>
                                        
                                        <form action="{{ route('admin.parientes.destroy', $pariente->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro, junto con los parientes registrados?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger" value="Eliminar"> <i class='fas fa-trash' style='color: white' value="Eliminar"></i></button>
                                        </form>
                                        
                                        <!-- <a href="{{ route('admin.parientes.show',$pariente->id) }}" class="btn btn-info" style="display: inline-block;">
                                        <i class='fa fa-info-circle' style='color: white'></i>
                                        </a> -->

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <a <a href="{{ route('admin.atenciones.create',$familia->id) }} " class="btn btn-primary mb-3">Nueva atención</a>
                        <table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo ayuda</th>
                                    <th>Cantidad </th>                                    
                                    <th>Fecha</th>
                                    <th>¿Entregado?</th>
                                    <th>Responsable</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atenciones as $atencion)
                                <tr>
                                    <td>{{$atencion->id}}</td>
                                    <td>{{$atencion->tipoAyuda->nombre}}</td>
                                    <td>{{$atencion->cantidad}}</td>                                   
                                    <td>{{$atencion->fecha_hora_atencion}}</td>
                                    <td>{{($atencion->entregado == 1 ? 'Si' : 'No')}}</td>
                                    <td>{{$atencion->responsable_atencion}}</td>

                                    <td>
                                        <!-- <a href="{{ route('admin.atenciones.show',$atencion->id) }}" class="btn btn-info" style="display: inline-block;">
                                        <i class='fa fa-info-circle' style='color: white'></i>
                                        </a> -->
                                        <a href="{{ route('admin.atenciones.edit', $atencion->id) }}" class="btn btn-success">
                                            <i class='fa fa-edit' style='color: white'></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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