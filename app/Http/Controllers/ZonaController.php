<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZonaRequest;
use App\Http\Requests\UpdateZonaRequest;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Zona::all();
        $estratos = \App\Models\Estrato::all();

        return view('admin.zonas.index', compact('data', 'estratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estratos = \App\Models\Estrato::all();
        return view('admin.zonas.create', compact('estratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZonaRequest $request)
    {
        //Zona::create($request->validated());

        // $validated = $request->validated();

        //     $zona = new Zona();
        //     $zona->nombre = $request->nombre;
        //     $zona->descripcion = $request->descripcion;
        //     $zona->rural = $request->rural;
        //     $zona->save();
        //     return redirect()->route('admin.zonas.index')->with('success', 'Zona creada exitosamente');
        
        Zona::create($request->validated());

        return redirect()->route('admin.zonas.index')->with('success', 'Zona creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zona  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Zona $zona)
    {
        $estratos = \App\Models\Estrato::all();
        return view('admin.zonas.edit', compact('zona', 'estratos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneroRequest  $request
     * @param  \App\Models\Genero  $data
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZonaRequest $request, Zona $zona)
    {
        //print($genero);
        $zona->update($request->validated());

        return redirect()->route('admin.zonas.index')->with('success', 'Zona editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {

        //echo ($zona);

        if($zona->Eventos()->count() > 0){
            return redirect()->route('admin.zonas.index')->with('error', 'Zona no puede ser eliminada');
        }

        if($zona->delete()) {
            return redirect()->route('admin.zonas.index')->with('success', 'El registro fue elimando correctamente!');
          } else {
            return redirect()->route('admin.zonas.index')->with('error', 'El registro no pudo ser eliminado!');
          }
        //$zona->delete();

        //return back();
    }
}
