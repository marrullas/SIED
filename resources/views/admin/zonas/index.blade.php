@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Listado de Zonas</h1>
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
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

                        <a href="{{ route('admin.zonas.create') }}" class="btn btn-primary mb-3">Nueva Zona</a>

                        <table class="table table-bordered" id="client_table">
                            <thead>
                                <tr>
                                    <th>Nombre zona</th>
                                    <th>descripción</th>
                                    <th>rural</th>
                                    <th>estrato</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $zona)
                                <tr>
                                    <td>{{$zona->nombre}}</td>
                                    <td>{{$zona->descripcion}}</td>
                                    <td> {{ ($zona->rural == 1 ? 'Si' : 'No') }}</td>
                                    <td>{{$zona->estrato != null ? $zona->estrato->descripcion : 'No definido'}}</td>
                                    <td>
                                        <a href="{{ route('admin.zonas.edit', $zona->id) }}" class="btn btn-success">
                                            Editar
                                        </a>

                                        <form action="{{ route('admin.zonas.destroy', $zona->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
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
        $('#client_table').DataTable();
    });
</script>
@endsection
