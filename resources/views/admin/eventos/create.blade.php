@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Evento</h1>
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

                        <form method="POST" action="{{route('admin.eventos.store')}}">
                            @csrf
                            <input type="hidden" name="estado_evento_id" value="1">
                            <div class="form-group">
                                <label for="responsable_reporte" class="required">¿Quien reporta?</label>
                                <input type="text" name="responsable_reporte" id="responsable_reporte" class="form-control {{$errors->has('responsable_reporte') ? 'is-invalid' : ''}}" placeholder="Ingrese el responsable del reporte" value="{{old('responsable_reporte', '')}}">
                                @if ($errors->has('responsable_reporte'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('responsable_reporte') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fecha_hora_reporte" class="required">Fecha y hora de Reporte</label>
                                <input name="fecha_hora_reporte" type="text" class="form-control datetimepicker" value="{{old('fecha_hora_reporte')}}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="required">Descripción</label>
                                <textarea name="descripcion" class="form-control">{{old('descripcion', '')}}</textarea>
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="fecha_hora_evento" class="required">Fecha y hora Evento</label>
                                <input name="fecha_hora_evento" type="text" class="form-control datetimepicker" value="{{old('fecha_hora_evento')}}">
                            </div>
                            <div class="form-group">
                                <label for="responsable_verificacion" class="required">Responsable verificación</label>
                                <input type="text" name="responsable_verificacion" id="responsable_verificacion" class="form-control {{$errors->has('responsable_verificacion') ? 'is-invalid' : ''}}" placeholder="Ingrese el responsable de verificacion del evento" value="{{old('responsable_verificacion', '')}}">
                                @if ($errors->has('responsable_verificacion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('responsable_verificacion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="fecha_hora_verificacion" class="required">Fecha y hora verificación</label>
                                <input name="fecha_hora_verificacion" type="text" class="form-control datetimepicker" value="{{old('fecha_hora_verificacion')}}">
                                @if($errors->has('fecha_hora_verificacion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('fecha_hora_verificacion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="zona_id" class="required">Zona</label>
                                <select class="form-control select2" name="zona_id" style="width: 100%;">
                                    <option value="">Seleccione un zona</option>
                                    @foreach ($zonas as $zona)
                                    <option value="{{ $zona->id }}" {{old('zona_id') == $zona->id ? 'selected' : ''}}>
                                        {{ $zona->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('zona_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('zona_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="required">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control {{$errors->has('direccion') ? 'is-invalid' : ''}}" placeholder="Ingrese la direccion del evento" value="{{old('direccion', '')}}">
                                @if ($errors->has('direccion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tipoEvento_id" class="required">Tipo Evento</label>
                                <select class="form-control select2" name="tipo_evento_id" style="width: 100%;">
                                    <option value="">Seleccione un tipo de evento</option>
                                    @foreach ($tipoEventos as $tipoEvento)
                                    <option value="{{ $tipoEvento->id }}" {{old('tipo_evento_id') == $tipoEvento->id ? 'selected' : ''}}>
                                        {{ $tipoEvento->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_evento_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('tipo_evento_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="estadoEvento_id" class="required">Entidad que atiende evento</label>
                                <select class="form-control select2" name="entidad_id" style="width: 100%;">
                                    <option value="">Seleccione la entidad que atiende el evento</option>
                                    @foreach ($entidades as $entidad)
                                    <option value="{{ $entidad->id }}" {{old('entidad_id') == $entidad->id ? 'selected' : ''}}>
                                        {{ $entidad->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('entidad_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('entidad_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="entidad_nombre" class="required">Nombre de la entidad (En caso de ser otra)</label>
                                <input type="text" name="entidad_nombre" id="entidad_nombre" class="form-control {{$errors->has('entidad_nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre de la entidad" value="{{old('entidad_nombre', '')}}">
                                @if ($errors->has('entidad_nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('entidad_nombre') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.eventos.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar
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