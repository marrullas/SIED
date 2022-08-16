<table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>

                                    <th>Fecha entrega</th>
                                    <th>Nombre jefe</th>
                                    <th>Cédula</th>
                                    <th>Ocupación</th>
                                    <th>Dirección</th>
                                    <th>Zona</th>
                                    <th>Rural</th>
                                    <th>Teléfono</th>
                                    <th># Personas nucleo</th>                                    
                                    <th>Tipo ayuda</th>
                                    <th>Cantidad</th>
                                    <th>Tipo poblacion </th>
                                    <th>Encargado</th>
                                    <th>Codigo Evento </th>
                                    <th>Descripción </th>
                                    <th>Fecha evento </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atenciones as $atencion)
                                <tr>

                                    <td>{{$atencion->fecha_hora_atencion}}</td>
                                    <td>{{$atencion->familia->nombre}} {{$atencion->familia->apellido}}</td>
                                    <td>{{$atencion->familia->documento}}</td>
                                    <td>{{$atencion->familia->ocupacion}}</td>
                                    <td>{{$atencion->evento->direccion}}</td>
                                    <td>{{$atencion->evento->zona->nombre}}</td>
                                    <th>{{ ($atencion->evento->zona->rural == 1 ? 'Si' : 'No') }}</th>
                                    <td>{{$atencion->familia->telefono}}</td>
                                    <td>{{$atencion->familia->parientes->count()+1}}</td>
                                    <td>{{$atencion->tipoAyuda->nombre}}</td>
                                    <td>{{$atencion->cantidad}}</td>
                                    <td>{{$atencion->familia->tipoPoblacion->nombre}}</td>
                                    <td>{{$atencion->responsable_atencion}}</td>
                                    <td>{{$atencion->evento->id}}</td>
                                    <td>{{$atencion->evento->descripcion}}</td>
                                    <td>{{$atencion->evento->fecha_hora_evento}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>