

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

                                    <th>Nombre</th>
                                    <th>Documento </th>
                                    <th>numero miembros</th>
                                    <th>Atenciones</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evento->eventoFamilias as $familia)
                                <tr>

                                    <td>{{$familia->nombre}} {{$familia->apellido}}</td>
                                    <td>{{$familia->documento}}</td>
                                    <td>{{$familia->numero_miembros}}</td>
                                    <td>{{$familia->atenciones->count()}}</td>
                                    
                                    <td>

                                        <a href="{{ route('admin.familias.show',$familia->id) }}" class="btn btn-info" style="display: inline-block;">
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
