@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Familias evento: {{$evento->descripcion}}</h1>
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

                        <a href="{{ route('admin.familias.create',$evento) }}" class="btn btn-primary mb-3">Nueva familia</a>

                        <table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Documento </th>
                                    <th>numero miembros</th>
                                    <th>Mayores 65</th>
                                    <th>Menores 18</th>
                                    <th>Afectados</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evento->eventoFamilias as $familia)
                                <tr>

                                    <td>{{$familia->nombre}} {{$familia->apellido}}</td>
                                    <td>{{$familia->documento}}</td>
                                    <td>{{$familia->numero_miembros}}</td>
                                    <td>{{$familia->mayores65}}</td>
                                    <td>{{$familia->menores18}}</td>
                                    <td>{{$evento->numero_afectados}}</td>
                                    <td>
                                        <a href="{{ route('admin.familias.edit', $familia->id) }}" class="btn btn-success">
                                            <i class='fa fa-edit' style='color: white'></i>
                                        </a>

                                        <form action="{{ route('admin.familias.destroy', $familia->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger" value="Eliminar"> <i class='fas fa-trash' style='color: white' value="Eliminar"></i></button>
                                        </form>

                                        <a href="{{ route('admin.familias.show',$evento->id) }}" class="btn btn-info" style="display: inline-block;">
                                        <i class='fa fa-info-circle' style='color: white'></i>
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