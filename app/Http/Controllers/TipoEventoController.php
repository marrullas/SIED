<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use App\Http\Requests\StoreTipoEventoRequest;
use App\Http\Requests\UpdateTipoEventoRequest;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoEvento::all();

        return view('admin.tipoEventos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoEventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoEventoRequest $request)
    {
        TipoEvento::create($request->validated());

        return redirect()->route('admin.tipoEventos.index')->with('success', 'Tipo de Evento creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoEvento $tipoEvento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoEvento $tipoEvento)
    {
        return view('admin.tipoEventos.edit', compact('tipoEvento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoEventoRequest  $request
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoEventoRequest $request, TipoEvento $tipoEvento)
    {
        $tipoEvento->update($request->validated());

        return redirect()->route('admin.tipoEventos.index')->with('success', 'Tipo de Evento actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoEvento $tipoEvento)
    {

        if($tipoEvento->eventos()->count() > 0) {
            return redirect()->route('admin.tipoEventos.index')->with('error', 'No se puede eliminar el tipo de evento porque tiene eventos asociados');
        }
        $tipoEvento->delete();

        return redirect()->route('admin.tipoEventos.index')->with('success', 'Tipo de Evento eliminado exitosamente');
    }
}
