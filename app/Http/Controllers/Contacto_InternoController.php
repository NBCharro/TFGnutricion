<?php

namespace App\Http\Controllers;

use App\Models\Contacto_Interno;
use Illuminate\Http\Request;

class Contacto_InternoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $mensajes_internos = Contacto_Interno::all();
        // return $mensajes_internos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto_Interno $contacto_Interno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto_Interno $contacto_Interno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto_Interno $contacto_Interno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto_Interno $contacto_Interno)
    {
        //
    }
}
