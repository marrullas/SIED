@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Eventos</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('admin.eventos.create') }}" class="btn btn-primary mb-3">Nuevo Evento</a>

                        <table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>

                                    <th>Descripcion</th>
                                    <th>Fecha </th>
                                    <th>Status</th>
                                    <th>Tipo</th>
                                    <th>Zona</th>
                                    <th>Afectados</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                <tr>

                                    <td>{{$evento->descripcion}}</td>
                                    <td>{{$evento->fecha_hora_reporte}}</td>
                                    <td>{{$evento->estadoEvento->nombre}}</td>
                                    <td>{{$evento->tipoEvento->nombre}}</td>
                                    <td>{{$evento->zona->nombre}}</td>
                                    <td>{{$evento->numero_afectados}}</td>
                                    <td>
                                        <a href="{{ route('admin.eventos.edit', $evento->id) }}" class="btn btn-success">
                                            <i class='fa fa-edit' style='color: white'></i>
                                        </a>

                                        <form action="{{ route('admin.eventos.destroy', $evento->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger" value="Eliminar"> <i class='fas fa-trash' style='color: white' value="Eliminar"></i></button>
                                        </form>
                                        <a href="{{ route('admin.eventos.addfotos',$evento) }}" class="btn btn-info" style="display: inline-block;">
                                            <i class='fa fa-images' style='color: white'></i>
                                        </a>
                                        <a href="{{ route('admin.eventos.show',$evento->id) }}" class="btn btn-info" style="display: inline-block;">
                                        <i class='fa fa-info-circle' style='color: white'></i>
                                        </a>
                                        <a href="{{ route('admin.eventos.show',$evento->id) }}" class="btn btn-warning" style="display: inline-block;">
                                        <i class='fa fa-address-card' style='color: white'></i>
                                        </a>
                                        <a href="{{ route('admin.eventos.cerrar',$evento->id) }}" class="btn btn-danger" style="display: inline-block;">
                                        <i class='fa fa-times-circle' style='color: white'></i>
                                        </a>

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
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#tasks_table').DataTable();
    });
</script>
@endsection