<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneroRequest;
use App\Http\Requests\UpdateGeneroRequest;
use App\Models\Genero;
use App\Models\User;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Genero::all();

        return view('admin.generos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.generos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneroRequest $request)
    {
        Genero::create($request->validated());

        return redirect()->route('admin.generos.index')->with('success', 'Genero creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Geneor  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(User $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        return view('admin.generos.edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneroRequest  $request
     * @param  \App\Models\Genero  $data
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneroRequest $request, Genero $genero)
    {
        //print($genero);
        $genero->update($request->validated());

        return redirect()->route('admin.generos.index')->with('success', 'Genero editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {

        if($genero->Familias()->count() > 0){
            return redirect()->route('admin.generos.index')->with('error', 'No se puede eliminar el genero porque tiene familias asociadas');
        }

        $genero->delete();

        return back();
    }
}
