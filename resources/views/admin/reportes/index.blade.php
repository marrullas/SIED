@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Reporte TAE</h1>
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
                        <form method="POST" action="{{route('admin.reportes.tae')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="required">Fecha Inicio</label>
                                <input name="start_date" type="text" class="form-control date" value="{{old('start_date')}}">
                            </div>
                            <div class="form-group">
                                <label for="name" class="required">Fecha Fin</label>
                                <input name="end_date" type="text" class="form-control date" value="{{old('end_date')}}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Generar Reporte
                                </button>
                            </div>
                        
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
