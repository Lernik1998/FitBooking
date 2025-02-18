<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor; // Obtengo el modelo Instructor
use App\Models\Activity;
use Illuminate\Support\Str; // Para renombrar la imagen

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all(); // dd($instructors);
        return view('admin.instructorsAdmin', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createInstAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtengo los datos del request
        $data = $request->all();

        // Creo un nuevo instructor
        $instructor = new Instructor($data);

        // Subir imágen si existe
        if ($request->hasFile('image')) {

            // Obtengo la imagen y la almaceno
            $image = $request->file('image');

            // Renombro la imagen
            $nombreImagen = Str::slug($request->name) . '.' . $image->guessExtension(); // Para que lo guarde con el nombre original y extension

            // Guardo la imágen en la carpeta public/instructors
            $ruta = public_path('images/instructors/');

            $image->move($ruta, $nombreImagen);

            $instructor->image = $nombreImagen;

            // Guardo el instructor en la base de datos
            $instructor->save();
        }

        // Redirijo a la página principal de instructores
        return redirect()->route('instructors.index')->with('success', 'Instructor creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busco el instructor por su id
        $instructor = Instructor::findOrFail($id);

        // Retorno la vista con el instructor
        return view('admin.editInstructorAdmin', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Busco el instructor por su id
        $instructor = Instructor::findOrFail($id);

        // Actualizo el instructor
        $instructor->update($request->all());

        // Redirijo a la página principal de instructores
        return redirect()->route('instructors.index')->with('success', 'Instructor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busco el instructor por su id
        $instructor = Instructor::findOrFail($id);

        // Elimino el instructor
        $instructor->delete();

        // Redirijo a la página principal de instructores
        return redirect()->route('instructors.index')->with('success', 'Instructor eliminado correctamente');
    }


    // Función para asignar un instructor a una actividad
    public function bindInstructor(Request $request, string $idAct, string $idIns)
    {
        // dd($request->all(), $idAct, $idIns);

        // Busco el instructor por su id
        $instructor = Instructor::findOrFail($idIns);

        // Busco la actividad por su id
        $activity = Activity::findOrFail($idAct);

        // Asigno el instructor a la actividad
        $activity->instructor_id = $instructor->id;
        $activity->save();

        // Redirijo a la página principal de instructores
        return redirect()->route('instructors.bindAct')->with('success', 'Instructor asignado correctamente a la tarea');
    }

    // Muestro todos los instructores
    public function instructors()
    {
        // Busco el instructor por su id
        $instructors = Instructor::all()->where('is_active', 1);

        // Busco la actividad por su id
        $activities = Activity::all()->where('instructor_id', null);

        // Devuelvo la vista con los instructores
        return view('instructor.instructBindAct', compact('instructors', 'activities'));
    }
}
