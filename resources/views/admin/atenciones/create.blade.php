@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Nueva atención para la familia: {{$familia->nombre}} {{$familia->apellido}}</h1>
                <h2 class="m-0">Evento: {{$familia->evento->descripcion}}</h2>
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

                        <form method="POST" action="{{route('admin.atenciones.store')}}" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-group">
                                <label for="tipo_ayuda_id">Tipo de ayuda</label>
                                <select class="form-control" name="tipo_ayuda_id" id="tipo_ayuda_id">
                                    @foreach ($tiposayudas as $tipoAyuda)
                                        <option value="{{$tipoAyuda->id}}">{{$tipoAyuda->descripcion}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_ayuda_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_ayuda_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="familia_id" value="{{$familia->id}}">
                                <input type="hidden" name="evento_id" value="{{$familia->evento_id}}">
                                <label for="cantidad" class="required">cantidad</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control {{$errors->has('cantidad') ? 'is-invalid' : ''}}" placeholder="Ingrese cantidad" value="{{old('cantidad', '')}}">
                                @if ($errors->has('cantidad'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                </span>
                                @endif
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
                                <label for="fecha_hora_atencion" class="required">Fecha y hora de atención</label>
                                <input type="datetime-local" name="fecha_hora_atencion" id="fecha_hora_atencion" class="form-control datetimepicker {{$errors->has('fecha_hora_atencion') ? 'is-invalid' : ''}}" placeholder="Ingrese fecha y hora de atención" value="{{old('fecha_hora_atencion', '')}}">
                                @if ($errors->has('fecha_hora_atencion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('fecha_hora_atencion') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="responsable_atencion" class="required">Responsable de atención</label>
                                <input type="text" name="responsable_atencion" id="responsable_atencion" class="form-control {{$errors->has('responsable_atencion') ? 'is-invalid' : ''}}" placeholder="Ingrese responsable de atención" value="{{old('responsable_atencion', '')}}">
                                @if ($errors->has('responsable_atencion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('responsable_atencion') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="image">
                                <label>
                                    <h4>Agregar imagen 1</h4>
                                </label>
                                <input type="file" class="form-control" name="foto1" id="foto1">
                            </div>
                            <div class="image">
                                <label>
                                    <h4>Agregar imagen 1</h4>
                                </label>
                                <input type="file" class="form-control" name="foto2" id="foto2">
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.atenciones.index')}}">
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
