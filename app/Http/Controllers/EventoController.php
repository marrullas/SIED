<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\TipoEvento;
use App\Models\Zona;
use App\Models\EstadoEvento;
use App\Models\Entidad;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\StoreEventoCierreRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\EventoFoto;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventos = Evento::with(['tipoEvento', 'zona', 'estadoEvento', 'entidad'])->get();

        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipoEventos = TipoEvento::all();
        $zonas = Zona::all();
        //$estadoEventos = EstadoEvento::all();
        $estadoEventos = EstadoEvento::where('nombre', '=', 'Verificación')->get();
        $entidades = Entidad::all();

        return view('admin.eventos.create', compact('tipoEventos', 'zonas', 'estadoEventos', 'entidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreEventoRequest $request)
    public function store(StoreEventoRequest $request)
    {
        //

        //print_r ($request->responsable_reporte);
        //dd($request);
        Evento::create($request->validated());
        //dd($request);

        return redirect()->route('admin.eventos.index')->with('success', 'Evento creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
        //$eventoFotos = EventoFoto::all();
        $evento = Evento::with(['tipoEvento', 'zona', 'estadoEvento', 'entidad', 'eventoFotos'])->findOrFail($evento->id);
        //dd($evento);
        return view('admin.eventos.show', compact('evento'));
    }

    public function resumen(Evento $evento){
        $evento = Evento::with(['tipoEvento', 'zona', 'estadoEvento', 'entidad', 'eventoFotos'])->findOrFail($evento->id);
        return view('admin.eventos.resumen', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        $tipoEventos = TipoEvento::all();
        $zonas = Zona::all();
        $estadoEventos = EstadoEvento::all();
        $entidades = Entidad::all();
        //dd($evento);
        return view('admin.eventos.edit', compact('tipoEventos', 'zonas', 'estadoEventos', 'entidades', 'evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventoRequest  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        //
        //dd($request->request->all());
        $evento->update($request->validated());

        return redirect()->route('admin.eventos.index')->with('success', 'Evento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
        $evento->delete();
        return redirect()->back();
    }

    public function addFotos(Evento $evento)
    {   
        $imagenes = EventoFoto::where('evento_id', $evento->id)->get();
        return view('admin.eventos.addFoto', compact('evento', 'imagenes'));
    }

    public function storeFoto(Request $request, Evento $evento)
    {

        //dd($request->file('image'));
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            //$file->move(public_path('public/images/eventos'), $filename);
            
            $file->move(public_path('images/eventos'), $filename);
            $eventoFoto = new EventoFoto();
            $eventoFoto->evento_id = $evento->id;
            $eventoFoto->url = $filename;
            $eventoFoto->descripcion = $request->descripcion;

           // dd($eventoFoto);
            $eventoFoto->save();
            

            return redirect()->back()->with('success', 'Foto agregada exitosamente');
        }else{
            return redirect()->back()->with('error', 'No se puedo agregar imagen');
        }
    }

    public function addFamilia(Evento $evento)
    {
        $familias = $evento->familias;
        return view('admin.familias.index', compact('evento', 'familias'));
    }

    public function cerrar(Evento $evento)
    {
        return view('admin.eventos.cerrar', compact('evento'));
    }

    public function storecerrar(StoreEventoCierreRequest $request, Evento $evento)
    {
        //dd($request->validated());
        $evento->update($request->validated());
        // $evento->estado_eventi_id = 2;
        // $evento -> fecha_hora_cierre = $request->fecha_hora_cierre;
        // $evento -> descripcion_cierre = $request->descripcion_cierre;
        // $evento -> save();
        return redirect()->route('admin.eventos.index')->with('success', 'Evento cerrado exitosamente');
    }
}
