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
                                    <th>Status</th>
                                    <th>Familias </th>
                                    <th>Personas</th>                                    
                                    <th>Atenciones</th>
                                    <th>TAE</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                <tr>

                                    <td><p>
                                        {{$evento->descripcion}} <br>
                                        Fecha: <small>{{$evento->fecha_hora_reporte}}</small> <br>
                                        Zona: <small>{{$evento->zona->nombre}}</small> <br>
                                        Direccion: <small>{{$evento->direccion}}</small> <br>
                                        Tipo: <small>{{$evento->tipoEvento->nombre}}</small> <br>

                                    </p></td>
                                    <td>{{$evento->estadoEvento->nombre}}</td>
                                    <td>{{$evento->numerofamilias}}</td>
                                    <td>{{$evento->numeroafectados}}</td>
                                    <td>{{$evento->numeroatenciones}}</td>
                                    <td>{{$evento->tae}}</td>
                                    
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
