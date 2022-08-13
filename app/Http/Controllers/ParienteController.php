<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParienteRequest;
use App\Http\Requests\UpdateParienteRequest;
use App\Models\Pariente;
use App\Models\Familia;
use App\Models\TipoDocumento;
use App\Models\TipoPoblacion;
use App\Models\Genero;
use App\Models\Parentesco;

class ParienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Familia $familia)
    {
        $tipoDocumentos = TipoDocumento::all();
        $tipoPoblaciones = TipoPoblacion::all();
        $generos = Genero::all();
        $parentescos = Parentesco::all();
        return view('admin.parientes.create', compact('familia', 'tipoDocumentos', 'tipoPoblaciones', 'generos', 'parentescos'));
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParienteRequest $request)
    {
        $familia = Familia::find($request->familia_id);
        $familia->parientes()->create($request->validated());
        //return redirect()->route('familias.show', $familia->id);
        return redirect()->route('admin.familias.index', $familia->evento_id)->with('success', 'Pariente agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pariente  $pariente
     * @return \Illuminate\Http\Response
     */
    public function show(Pariente $pariente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pariente  $pariente
     * @return \Illuminate\Http\Response
     */
    public function edit(Pariente $pariente)
    {
        $tipoDocumentos = TipoDocumento::all();
        $tipoPoblaciones = TipoPoblacion::all();
        $generos = Genero::all();
        $parentescos = Parentesco::all();
        return view('admin.parientes.edit', compact('pariente', 'tipoDocumentos', 'tipoPoblaciones', 'generos', 'parentescos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParienteRequest  $request
     * @param  \App\Models\Pariente  $pariente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParienteRequest $request, Pariente $pariente)
    {
        //dd($request->all());
        $pariente->update($request->validated());
        return redirect()->route('admin.familias.show', $pariente->familia_id)->with('success', 'Pariente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pariente  $pariente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pariente $pariente)
    {
        $pariente->delete();
        return redirect()->route('admin.familias.show', $pariente->familia_id)->with('success', 'Pariente eliminado con éxito');
    }
}
