<?php

namespace App\Http\Controllers;

use App\Models\Pariente;
use App\Http\Requests\StoreParienteRequest;
use App\Http\Requests\UpdateParienteRequest;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParienteRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pariente  $pariente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pariente $pariente)
    {
        //
    }
}
