@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Nuevo pariente para la familia: {{$familia->nombre}} {{$familia->apellido}}</h1>
                <h3 class="m-0">Evento: {{$familia->evento->descripcion}}</h3>
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

                        <form method="POST" action="{{route('admin.parientes.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="familia_id" value="{{$familia->id}}">
                                <input type="hidden" name="evento_id" value="{{$familia->evento->id}}">
                                <label for="nombre" class="required">Nombre </label>
                                <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese nombre" value="{{old('nombre', '')}}">
                                @if ($errors->has('nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="apellido" class="required">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control {{$errors->has('apellido') ? 'is-invalid' : ''}}" placeholder="Ingrese el apellido" value="{{old('apellido', '')}}">
                                @if ($errors->has('apellido'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="edad" class="required">Edad</label>
                                <input type="number" name="edad" id="edad" class="form-control {{$errors->has('edad') ? 'is-invalid' : ''}}" placeholder="Ingrese la edad" value="{{old('edad', '')}}">
                                @if ($errors->has('edad'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('edad') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tipo_documento_id" class="required">Tipo documento</label>
                                <select class="form-control select2" name="tipo_documento_id" style="width: 100%;">
                                    <option value="">Seleccione tipo de documento</option>
                                    @foreach ($tipoDocumentos as $tipoDocumento)
                                    <option value="{{ $tipoDocumento->id }}" {{old('tipo_documento_id') == $tipoDocumento->id ? 'selected' : ''}}>
                                        {{ $tipoDocumento->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_documento_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('tipo_documento_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="documento" class="required">Número de documento</label>
                                <input type="text" name="documento" id="documento" class="form-control {{$errors->has('documento') ? 'is-invalid' : ''}}" placeholder="Ingrese el número de documento" value="{{old('documento', '')}}">
                                @if ($errors->has('documento'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('documento') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="genero_id" class="required">Género</label>
                                <select class="form-control select2" name="genero_id" style="width: 100%;">
                                    <option value="">Seleccione género</option>
                                    @foreach ($generos as $genero)
                                    <option value="{{ $genero->id }}" {{old('genero_id') == $genero->id ? 'selected' : ''}}>
                                        {{ $genero->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('genero_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('genero_id') }}</strong>
                                </span>
                                @endif                                
                            </div>
                            <div class="form-group">
                                <label for="parentesco_id" class="required">Parentesco</label>
                                <select class="form-control select2" name="parentesco_id" style="width: 100%;">
                                    <option value="">Seleccione parentesco</option>
                                    @foreach ($parentescos as $parentesco)
                                    <option value="{{ $parentesco->id }}" {{old('parentesco_id') == $parentesco->id ? 'selected' : ''}}>
                                        {{ $parentesco->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('parentesco_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('parentesco_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="tipo_poblamiento_id" class="required">Tipo de población</label>
                                <select class="form-control select2" name="tipo_poblacion_id" style="width: 100%;">
                                    <option value="">Seleccione tipo de población</option>
                                    @foreach ($tipoPoblaciones as $tipoPoblacion)
                                    <option value="{{ $tipoPoblacion->id }}" {{old('tipo_poblacion_id') == $tipoPoblacion->id ? 'selected' : ''}}>
                                        {{ $tipoPoblacion->nombre }}: {{ $tipoPoblacion->descripcion }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_poblacion_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('tipo_poblacion_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="etnia_id" class="required">Etnia</label>
                                <select class="form-control select2" name="etnia_id" style="width: 100%;">
                                    <option value="">Seleccione etnia</option>
                                    @foreach ($etnias as $etnia)
                                    <option value="{{$etnia->id}}" {{old('etnia_id', $familia->etnia_id) == $etnia->id ? 'selected' : ''}}>
                                    
                                        {{ $etnia->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('etnia_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('etnia_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="required">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control {{$errors->has('telefono') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono" value="{{old('telefono', '')}}">
                                @if ($errors->has('telefono'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>





                            <div class="form-group">
                                <label for="descripcion" class="required">Notas</label>
                                <textarea name="notas" class="form-control">{{old('notas', '')}}</textarea>
                                @if ($errors->has('notas'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('notas') }}</strong>
                                </span>
                                @endif
                            </div>
                           

                           

                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.familias.index',$familia->evento_id)}}">
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
