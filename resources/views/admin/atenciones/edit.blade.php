@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Actualizar Evento</h1>
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

                        <form method="POST" action="{{route('admin.atenciones.update', $atencion->id)}}" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="familia_id" value="{{$familia->id}}">
                            <input type="hidden" name="evento_id" value="{{$familia->evento_id}}">
                            
                            <div class="form-group">
                                <label for="tipo_ayuda_id">Tipo de ayuda</label>
                                <select class="form-control" name="tipo_ayuda_id" id="tipo_ayuda_id">
                                    @foreach ($tiposayudas as $tipoAyuda)
                                        <option value="{{$tipoAyuda->id}}" {{old('tipo_ayuda_id', $atencion->tipo_ayuda_id) == $tipoAyuda->id ? 'selected' : ''}}>
                                        
                                            {{$tipoAyuda->descripcion}}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_ayuda_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo_ayuda_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="cantidad" class="required">Cantidad</label>
                                <input type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" id="cantidad" name="cantidad" value="{{ old('cantidad', $atencion->cantidad) }}">
                                @if ($errors->has('cantidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="descripcion" class="required">Descripción</label>
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" required>{{ old('descripcion', $atencion->descripcion) }}</textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="fecha_hora_atencion" class="required">Fecha y hora de atención</label>
                                <input type="text" class="form-control datetimepicker {{ $errors->has('fecha_hora_atencion') ? ' is-invalid' : '' }}" id="fecha_hora_atencion" name="fecha_hora_atencion" value="{{ old('fecha_hora_atencion', $atencion->fecha_hora_atencion) }}" >
                                
                                @if ($errors->has('fecha_hora_atencion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha_hora_atencion') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="responsable_atencion" class="required">Responsable de atención</label>
                                <input type="text" class="form-control{{ $errors->has('responsable_atencion') ? ' is-invalid' : '' }}" id="responsable_atencion" name="responsable_atencion" value="{{ old('responsable_atencion', $atencion->responsable_atencion) }}" >
                                @if ($errors->has('responsable_atencion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('responsable_atencion') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                            <label for="entregado" class="required">¿Entregado? </label>                               
                                <input class="btn-check" type="checkbox" name="entregado" id="entregado" {{  ($atencion->entregado == 1 ? ' checked' : '') }}>
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
                                    <a class="btn btn-danger" href="{{url()->previous()}}">
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
