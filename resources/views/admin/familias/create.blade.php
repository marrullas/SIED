@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva familia para evento: {{$evento->descripcion}}</h1>
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

                        <form method="POST" action="{{route('admin.familias.store')}}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="evento_id" value="{{$evento->id}}">
                                <label for="nombre" class="required">Nombre persona cabeza familia</label>
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
                                <label for="telefono" class="required">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control {{$errors->has('telefono') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono" value="{{old('telefono', '')}}">
                                @if ($errors->has('telefono'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="required">Dirección</label>
                                <input type="text" name="direccion" id="direccion" class="form-control {{$errors->has('direccion') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono" value="{{old('direccion', '')}}">
                                @if ($errors->has('direccion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="required">Email</label>
                                <input type="text" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Ingrese el teléfono" value="{{old('email', '')}}">
                                @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="numero_miembros" class="required">Número de miembros</label>
                                <input type="text" name="numero_miembros" id="numero_miembros" class="form-control {{$errors->has('numero_miembros') ? 'is-invalid' : ''}}" placeholder="Ingrese el número de miembros" value="{{old('numero_miembros', '')}}">
                                @if ($errors->has('numero_miembros'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('numero_miembros') }}</strong>
                                </span>
                                @endif                                
                            </div>
                            <div class="form-group">
                                <label for="mayores65" class="required">Mayores de 65</label>
                                <input type="text" name="mayores65" id="mayores65" class="form-control {{$errors->has('mayores65') ? 'is-invalid' : ''}}" placeholder="Ingrese el número de mayores de 65" value="{{old('mayores65', '')}}">
                                @if ($errors->has('mayores65'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('mayores65') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="numero_miembros" class="required">Mayores de 18</label>
                                <input type="text" name="mayores18" id="mayores18" class="form-control {{$errors->has('mayores18') ? 'is-invalid' : ''}}" placeholder="Ingrese el número de mayores de 18" value="{{old('mayores18', '')}}">
                                @if ($errors->has('mayores18'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('mayores18') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="numero_miembros" class="required">Menores de 18</label>
                                <input type="text" name="menores18" id="menores18" class="form-control {{$errors->has('menores18') ? 'is-invalid' : ''}}" placeholder="Ingrese el número de menores de 18" value="{{old('menores18', '')}}">
                                @if ($errors->has('menores18'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('menores18') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="descripcion" class="required">Observaciones</label>
                                <textarea name="observaciones" class="form-control">{{old('observaciones', '')}}</textarea>
                                @if ($errors->has('observaciones'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('observaciones') }}</strong>
                                </span>
                                @endif
                            </div>
                           

                           

                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.tasks.index')}}">
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
