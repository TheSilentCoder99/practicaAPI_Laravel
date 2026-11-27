<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Academy;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Academy $academy)
    {
        // A través del model binding primero encuentro la academia (a través de una ruta anidada). Con el objeto "padre" o sea, academia, obtengo los cursos que contiene directamente. Así no hace falta estar haciendo consultas.
        $cursos = $academy->courses()->get();

        return response()->json([
        'message' => 'Todos los cursos',
        'datos' => $cursos
    ], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request, Academy $academy)
    {
        $NuevoCurso = $request->validated();

        $course = $academy->courses()->create($NuevoCurso);

        return response()->json([
            'message' => 'Curso creado correctamente.',
            'datos' => $course,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Academy $academy, Course $course)
    {

    $EsteCurso = $academy->courses()->get($course);

        return response()->json([
        'message' => 'Datos del curso',
        'datos' => $EsteCurso
    ], 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */

    // En rutas anidadas con {academy} y {course}, la firma del método debe declarar ambos parámetros en el orden que aparecen en la ruta:
    public function destroy(Academy $academy, Course $course){

        $academy->courses()->delete($course);

        return response()->json([
        'message' => 'Curso eliminado correctamente.',
        'datos' => $course
        ], 200);
    }
}
