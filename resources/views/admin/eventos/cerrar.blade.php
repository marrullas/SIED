@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Cerrar Evento: {{$evento->tipoEvento->nombre}} - {{$evento->zona->nombre}} Afectados: {{$evento->numero_afectados}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('admin.eventos.cerrar.close', $evento->id)}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="evento_id" value="{{$evento->id}}">
                            <input type="hidden" name="estado_evento_id" value="3">

                            <div class="form-group">
                                <label for="fecha_hora_cierre" class="required">Fecha cierre</label>
                                <input name="fecha_hora_cierre" type="text" class="form-control datetimepicker" value="{{old('fecha_hora_cierre')}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion_cierre" class="required">Descripción del cierre</label>
                                <textarea name="descripcion_cierre" class="form-control">{{old('descripcion_cierre', '')}}</textarea>
                                @if ($errors->has('descripcion_cierre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('descripcion_cierre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="atendido" class="required">¿Evento atendido? </label>
                                <input type="checkbox" name="atendido" {{  ($evento->atendido == 1 ? ' checked' : '') }}>
                            </div>


                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.eventos.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Cerrar evento
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
