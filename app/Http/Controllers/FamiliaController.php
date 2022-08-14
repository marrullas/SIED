<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFamiliaRequest;
use App\Http\Requests\UpdateFamiliaRequest;
use App\Models\Familia;
use App\Models\Evento;
use App\Models\Genero;
use App\Models\TipoDocumento;
use App\Models\TipoPoblacion;
use App\Models\Estrato;
use App\Models\Etnia;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $evento)
    {
        $familias = $evento->familias;
        return view('admin.familias.index', compact('evento', 'familias'));
    
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Evento $evento)
    {
        $tipoDocumentos = TipoDocumento::all();
        $tipoPoblaciones = TipoPoblacion::all();
        $generos = Genero::all();
        $estratos = Estrato::all();
        $etnias = Etnia::all();
        return view('admin.familias.create',compact('evento', 'tipoDocumentos', 'tipoPoblaciones', 'generos', 'estratos','etnias'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFamiliaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFamiliaRequest $request)
    {
        //dd($request->all());

        $evento = Evento::find($request->evento_id);
       Familia::create($request->validated());
        return redirect()->route('admin.familias.index', $evento)->with('success', 'Familia creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        $evento = Evento::find($familia->evento_id);
        $atenciones = $familia->atenciones;
        return view('admin.familias.show', compact('familia', 'evento', 'atenciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
        $tipoDocumentos = TipoDocumento::all();
        $tipoPoblaciones = TipoPoblacion::all();
        $generos = Genero::all();
        $estratos = Estrato::all();
        $etnias = Etnia::all();
        return view('admin.familias.edit', compact('familia', 'tipoDocumentos', 'tipoPoblaciones', 'generos', 'estratos','etnias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFamiliaRequest  $request
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFamiliaRequest $request, Familia $familia)
    {
        //
        $familia->update($request->validated());
        return redirect()->route('admin.familias.index', $familia->evento)->with('success', 'Familia actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        //
        $familia->delete();
        return redirect()->route('admin.familias.index', $familia->evento)->with('success', 'Familia eliminada con éxito');
    }
}
