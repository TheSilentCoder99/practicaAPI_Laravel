<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademyController extends Controller
{
    /**
     * Display a listing of the resource.
     * Muestro todas las academias.
     */
    public function index()
    {
        return response()->json([
        'message' => 'Funciona la ruta',
    ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * Creo una academia
     */
    public function store(Request $request)
    {
        return response()->json([
        'message' => 'Funciona la ruta',
    ], 200);
    }

    /**
     * Display the specified resource.
     * Muestro una academia determinada
     */
    public function show(string $id)
    {
        return response()->json([
        'message' => 'Funciona la ruta',
    ], 200);
    }

    /**
     * Update the specified resource in storage.
     * Actualizo una academia determinada
     */
    public function update(Request $request, string $id)
    {
                return response()->json([
        'message' => 'Funciona la ruta',
    ], 200);

    }

    /**
     * Remove the specified resource from storage.
     * Elimino una academia determinada
     */
    public function destroy(string $id)
    {
                return response()->json([
        'message' => 'Funciona la ruta',
    ], 200);
    }
}
