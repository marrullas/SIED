@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva Zona</h1>
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

                        <form method="POST" action="{{route('admin.zonas.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="contact_name" class="required">Nombre del zona </label>
                                <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre del genero" value="{{old('nombre', '')}}">
                                @if ($errors->has('nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="contact_email" class="required">Descripcion </label>
                                <input type="test" name="descripcion" id="nombre" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" placeholder="Ingrese la decripcion del genero" value="{{old('descripcion', '')}}">
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-12 text-right">
                                    <a class="btn btn-danger" href="{{route('admin.zonas.index')}}">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar
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
