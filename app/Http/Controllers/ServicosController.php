<?php

namespace App\Http\Controllers;

use App\Models\servicos;
use App\Http\Requests\StoreservicosRequest;
use App\Http\Requests\UpdateservicosRequest;

class ServicosController extends Controller
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

    
    public function create()
    {
        return view('back.pages.servicos');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreservicosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreservicosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function show(servicos $servicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function edit(servicos $servicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateservicosRequest  $request
     * @param  \App\Models\servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateservicosRequest $request, servicos $servicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\servicos  $servicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicos $servicos)
    {
        //
    }
    
}
