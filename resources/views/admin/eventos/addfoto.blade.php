@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nueva foto del Evento: {{$evento->descripcion}}</h1>
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
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('admin.eventos.addfotos.create', $evento)}}" enctype="multipart/form-data">
                            @csrf

                            <div class="image">
                                <label>
                                    <h4>Agregar imagen</h4>
                                </label>
                                <input type="file" class="form-control" required name="image">
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
                <div class="container">
    <h3>View all image</h3><hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Image id</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach($imagenes as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>
	     <img src="{{ url('images/eventos/'.$data->url) }}"
 style="height: 100px; width: 150px;">
	  </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
            </div>
        </div>
    </div>
</div>

@endsection