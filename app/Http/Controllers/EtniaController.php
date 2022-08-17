<?php

namespace App\Http\Controllers;

use App\Models\Etnia;
use App\Http\Requests\StoreEtniaRequest;
use App\Http\Requests\UpdateEtniaRequest;

class EtniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Etnia::all();

        return view('admin.etnias.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.etnias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEtniaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEtniaRequest $request)
    {
        Etnia::create($request->validated());

        return redirect()->route('admin.etnias.index')->with('success', 'Etnia creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\etnia  $etnia
     * @return \Illuminate\Http\Response
     */
    public function show(Etnia $etnia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\etnia  $etnia
     * @return \Illuminate\Http\Response
     */
    public function edit(Etnia $etnia)
    {
        return view('admin.etnias.edit', compact('etnia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateetniaRequest  $request
     * @param  \App\Models\etnia  $etnia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEtniaRequest $request, Etnia $etnia)
    {
        $etnia->update($request->validated());

        return redirect()->route('admin.etnias.index')->with('success', 'Etnia actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\etnia  $etnia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etnia $etnia)
    {

        if($etnia->familias->count() > 0) {
            return redirect()->route('admin.etnias.index')->with('error', 'No se puede eliminar la etnia porque tiene familias asociadas');
        }
        if($etnia->parientes->count()>0){
            return redirect()->route('admin.etnias.index')->with('error', 'No se puede eliminar la etnia porque tiene parientes asociados');
        }

        $etnia->delete();

        return redirect()->route('admin.etnias.index')->with('success', 'Etnia eliminada exitosamente');
    }
}
