@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Editar Zona</h1>
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
                        <form method="POST" action="{{route('admin.zonas.update', $zona->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="contact_name" class="required">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre') ? 'is-invalid' : ''}}" placeholder="Ingrese el nombre de la zona" value="{{old('nombre', $zona->nombre)}}">
                                @if ($errors->has('nombre'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="required">Descripción </label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control {{$errors->has('descripcion') ? 'is-invalid' : ''}}" placeholder="Ingrese la descripcion" value="{{old('descripcion', $zona->descripcion)}}">
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="descripcion" class="required">Rural </label>                                
                                <input type="checkbox" name="rural" id="rural" {{  ($zona->rural == 1 ? ' checked' : '') }}>
                            </div>
                            <div class="form-group">
                                <label for="estrato_id" class="required">Estrato</label>
                                <select name="estrato_id" id="estrato_id" class="form-control {{$errors->has('estrato_id') ? 'is-invalid' : ''}}">
                                    <option value="">Seleccione un estrato</option>
                                    @foreach ($estratos as $estrato)
                                    <option value="{{$estrato->id}}" {{old('estrato_id', $zona->estrato_id) == $estrato->id ? 'selected' : ''}}>{{$estrato->descripcion}}</option>
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
