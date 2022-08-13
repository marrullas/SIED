@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
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

                                        <a href="{{ route('admin.eventos.resumen',$evento->id) }}" class="btn btn-info" style="display: inline-block;">
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
