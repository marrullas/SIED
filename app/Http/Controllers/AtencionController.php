<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtencionRequest;
use App\Http\Requests\UpdateAtencionRequest;
use App\Models\Familia;
use App\Models\Genero;
use App\Models\TipoAyuda;
use App\Models\Atencion;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Familia $familia)
    {
        $atenciones = $familia->atenciones;
        return view('admin.atenciones.index', compact('familia', 'atenciones'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Familia $familia)
    {
        //dd('create Atencion');
        $generos = Genero::all();
        $tiposayudas = TipoAyuda::all();


        return view('admin.atenciones.create', compact('familia', 'generos', 'tiposayudas'));
    
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAtencionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtencionRequest $request)
    {
        //dd($request);
        $filename='';
        $filename2 ='';
        if ($request->hasFile('foto1')) {
            $file = $request->file('foto1');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/eventos/atenciones/' . $request->evento_id), $filename);
        }
        if ($request->hasFile('foto2')) {
            $file = $request->file('foto2');
            $filename2 = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/eventos/atenciones/' . $request->evento_id), $filename2);
        }
        $familia = Familia::find($request->familia_id);
        $saveAtencion = Atencion::create($request->validated());

        $saveAtencion->foto1 = $filename;
        $saveAtencion->foto2 = $filename2;
        $saveAtencion->save();
        return redirect()->route('admin.familias.index', $familia->evento_id)->with('success', 'Atencion creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function show(Atencion $atencion)
    {
        dd($atencion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function edit(Atencion $atencion, $id)
    {   
        $atencion = Atencion::find($id);
        $generos = Genero::all();
        $tiposayudas = TipoAyuda::all();
        $familia = $atencion->familia;
        
        return view('admin.atenciones.edit', compact('atencion', 'generos', 'tiposayudas', 'familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtencionRequest  $request
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtencionRequest $request, Atencion $atencion)
    {
        //dd($request);
        $atencion->update($request->validated());
        return redirect()->route('admin.familias.index', $atencion->familia->evento_id)->with('success', 'Atencion actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atencion $atencion)
    {
        //
    }
}
