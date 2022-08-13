
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

                        

                        <table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>

                                    <th>Tipo ayuda</th>
                                    <th>Cantidad </th>
                                    
                                    <th>Fecha</th>
                                    <th>Responsable</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evento->eventoAtenciones as $atencion)
                                <tr>

                                    <td>{{$atencion->tipoAyuda->nombre}}</td>
                                    <td>{{$atencion->cantidad}}</td>                                   
                                    <td>{{$atencion->fecha_hora_atencion}}</td>
                                    <td>{{$atencion->responsable_atencion}}</td>

                                    <td>
                                        <a href="{{ route('admin.atenciones.show',$atencion->id) }}" class="btn btn-info" style="display: inline-block;">
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
