<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academy;
use App\Http\Requests\StoreRequest;


class AcademyController extends Controller
{  
    /**
     * Display a listing of the resource.
     * Muestro todas las academias.
     */
    public function index()
    {

        $academias = Academy::all();

        return response()->json([
        'message' => 'Todas las academias',
        'datos' => $academias
    ], 200);

    }

    /**
     * Store a newly created resource in storage.
     * Creo una academia. NO confundas el route model binding aquí. Laravel no encuentra nada porque no hay nada que buscar, lo estas creando, no existe aúm.
     */
    public function store(StoreRequest $request)
    {
        // Creo la academia
        $academiaCreada = Academy::create($request->validated());

        // El usuario siquiera llega aquí?
        if(!$academiaCreada){
            return response()->json([
                'message' => 'No tienes permiso para hacer esta accción: debes iniciar sesión.',
            ], 401);
        }

        return response()->json([
        'message' => 'Academia creada correctamente.',
        'datos'=> $academiaCreada
    ], 201);

    }

    /**
     * Display the specified resource.
     * Muestro una academia determinada
     */
    public function show(Academy $academy)
    {
        $existe = $academy;

        if (!$existe) {
            return response()->json([
                'message' => 'La academia que buscas no existe.',
            ], 404);
        }

        return response()->json([
            'message' => 'Academia',
            'datos' => $academy
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
