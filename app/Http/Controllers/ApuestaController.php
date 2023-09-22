<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use App\Http\Requests\StoreApuestaRequest;
use App\Http\Requests\UpdateApuestaRequest;

class ApuestaController extends Controller
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
     * @param  \App\Http\Requests\StoreApuestaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApuestaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function show(Apuesta $apuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(Apuesta $apuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApuestaRequest  $request
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApuestaRequest $request, Apuesta $apuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apuesta  $apuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apuesta $apuesta)
    {
        //
    }
}
