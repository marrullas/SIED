@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Genero</h1>
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
                        <form method="POST" action="{{route('admin.generos.update', $genero->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="contact_name" class="required">Nombre del genero </label>
                                <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del cliente" value="{{old('nombre', $genero->nombre)}}">
                                @if ($errors->has('nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="required">Descripción </label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" placeholder="Ingrese la descripcion" value="{{old('descripcion', $genero->descripcion)}}">
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.generos.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Editar
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
