<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para verificar si el usuario está autentificado
use App\Models\Activity; // Para obtener las actividades
use Illuminate\Support\Str; // Para renombrar la imagen


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtengo las actividades
        $activities = Activity::all();

        // Sin login muestro las actividades
        if (!Auth::check()) {
            return view('activity.indexActivity', compact('activities'));
        }

        // Obtengo el rol del usuario
        $role = Auth::user()->role;

        // Verifico si el usuario es cliente
        if ($role === 'user') {

            // Obtengo las actividades reservadas por el current_user y la imagen de la tabla de Activities
            $activitiesReservadas = DB::select('
                SELECT reservations.*, activities.* 
                FROM reservations 
                JOIN activities ON reservations.activity_id = activities.id 
                WHERE reservations.customer_id = ? AND reservations.activity_id IS NOT NULL',
                [Auth::user()->id]
            );

            // Obtengo las actividades que no están reservadas por el current_user
            $otherActivities = DB::select('
                SELECT *
                FROM activities
                WHERE id NOT IN (
                    SELECT activity_id
                    FROM reservations
                    WHERE customer_id = ?
                )
            ', [Auth::user()->id]);

            return view('activity.customerActivities.customerActivities', compact('activitiesReservadas', 'otherActivities'));


        } elseif ($role === 'admin') { // Si el usuario es admin
            return view('admin.activityAdmin', compact('activities')); // Pasar las actividades a la vista
        } else {
            // Manejar el caso donde el rol no es reconocido
            return redirect()->route('index')->with('error', 'Acceso no autorizado.');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtengo todos los instructores diponibles
        $instructors = Instructor::where('is_active', '0')->get();

        // Retorno la vista con los instructores
        return view('admin.createActAdmin', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([]);

        // $request->validate([     --> Se podría hacer así.
        //     'name' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric|min:0',
        //     'duration' => 'required|integer|min:1',
        //     'image' => 'nullable|image|max:2048', // Máx. 2MB
        // ]);

        // Creo la actividad 
        $activity = Activity::create($request->all());

        // Subir imágen si existe
        if ($request->hasFile('image')) {

            // Obtengo la imagen y la almaceno
            $image = $request->file('image');

            // Renombro la imagen
            $nombreImagen = Str::slug($request->name) . '.' . $image->guessExtension(); // Para que lo guarde con el nombre original y extension

            // Guardo la imágen en la carpeta public/activities
            $ruta = public_path('images/acts/');

            $image->move($ruta, $nombreImagen);

            $activity->image = $nombreImagen;

            $activity->save(); // Guardo la actividad en la BD
        }

        // Redirigir a la vista de actividades index
        return redirect()->route('activities.index')->with('success', 'Actividad creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busco la actividad por su id
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->route('activities.index')->with('error', 'Actividad no encontrada');
        }

        return view('admin.activityAdmin', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // PENDIENTE GESTIÓN DE IMÁGENES EN LA EDICIÓN
    public function edit(string $id)
    {
        // Busco la actividad por su id
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->route('activities.index')->with('error', 'Actividad no encontrada');
        }

        return view('admin.editActivityAdmin', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación
        $request->validate([]);

        // Busco la actividad por su id
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->route('activities.index')->with('error', 'Actividad no encontrada');
        }

        // Actualizo la actividad
        $activity->update($request->all());

        // Redirigir a la vista de actividades index
        return redirect()->route('activities.index')->with('success', 'Actividada actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busco la actividad por su id
        $activity = Activity::find($id);

        if (!$activity) {
            return redirect()->route('activities.index')->with('error', 'Actividad no encontrada');
        } else {
            $activity->delete();
            return redirect()->route('activities.index')->with('success', 'Actividad eliminada correctamente');
        }
    }
}
