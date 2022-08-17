<?php

namespace App\Http\Controllers;

use App\Models\TipoAyuda;
use App\Http\Requests\StoreTipoAyudaRequest;
use App\Http\Requests\UpdateTipoAyudaRequest;

class TipoAyudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoAyuda::all();

        return view('admin.tipoAyudas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipoAyudas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoAyudaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoAyudaRequest $request)
    {
        TipoAyuda::create($request->validated());

        return redirect()->route('admin.tipoAyudas.index')->with('success', 'Tipo de Ayuda creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoAyuda  $tipoAyuda
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAyuda $tipoAyuda)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoAyuda  $tipoAyuda
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAyuda $tipoAyuda)
    {
        return view('admin.tipoAyudas.edit', compact('tipoAyuda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoAyudaRequest  $request
     * @param  \App\Models\TipoAyuda  $tipoAyuda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoAyudaRequest $request, TipoAyuda $tipoAyuda)
    {
        $tipoAyuda->update($request->validated());

        return redirect()->route('admin.tipoAyudas.index')->with('success', 'Tipo de Ayuda actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoAyuda  $tipoAyuda
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAyuda $tipoAyuda)
    {

        if($tipoAyuda->atenciones()->count() > 0){
            return redirect()->route('admin.tipoAyudas.index')->with('error', 'No se puede eliminar el tipo de ayuda porque tiene atenciones asociadas');
        }
        $tipoAyuda->delete();

        return redirect()->route('admin.tipoAyudas.index')->with('success', 'Tipo de Ayuda eliminado exitosamente');
    }
}
