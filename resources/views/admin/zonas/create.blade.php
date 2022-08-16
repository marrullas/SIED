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
                                <input type="test" name="descripcion" id="nombre" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" placeholder="Ingrese la decripcion de la zona" value="{{old('descripcion', '')}}">
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="contact_email" class="required">Rural </label>
                                <input class="btn-check" type="checkbox" name="rural" id="rural">
                            </div>
                            <div class="form-group">
                                <label for="estrato_id" class="required">Estrato</label>
                                <select class="form-control select2" name="estrato_id" style="width: 100%;">
                                    <option value="">Seleccione estrato</option>
                                    @foreach ($estratos as $estrato)
                                    <option value="{{ $estrato->id }}" {{old('estrato_id') == $estrato->id ? 'selected' : ''}}>
                                        {{ $estrato->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('estrato_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('estrato_id') }}</strong>
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
