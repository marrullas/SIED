<table class="table table-bordered" id="tasks_table">
                            <thead>
                                <tr>

                                    <th>Descripcion</th>
                                    <th>Fecha reporte</th>
                                    <th>Fecha evento</th>
                                    <th>Fecha verificacion</th>
                                    <th>Zona</th>
                                    <th>Direccion</th>
                                    <th>Tipo evento</th>
                                    <th>Rural</th>
                                    <th>Status</th>
                                    <th># Familias </th>
                                    <th># Personas</th>                                    
                                    <th># Atenciones</th>
                                    <th>TAE</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                <tr>

                                    <td><p>{{$evento->descripcion}}</p></td>
                                    <td>{{$evento->fecha_hora_reporte}}</td>
                                    <td>{{$evento->fecha_hora_evento}}</td>
                                    <td>{{$evento->fecha_verificacion}}</td>
                                    <td>{{$evento->zona->nombre}}</td>
                                    <td>{{$evento->direccion}}</td>
                                    <td>{{$evento->tipoEvento->nombre}}</td>
                                    <th>{{ ($evento->zona->rural == 1 ? 'Si' : 'No') }}</th>
                                    <td>{{$evento->estadoEvento->nombre}}</td>
                                    <td>{{$evento->numerofamilias}}</td>
                                    <td>{{$evento->numeroafectados}}</td>
                                    <td>{{$evento->numeroatenciones}}</td>
                                    <td>{{$evento->tae}}</td>
                                    
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="12" align="right">
                                        <strong>TAE:</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $eventostae[0]->TAE }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12" align="right">
                                        <strong>PROM TAE:</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $eventostae[0]->PROM_TAE }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>