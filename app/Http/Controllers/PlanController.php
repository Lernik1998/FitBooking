<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para verificar si el usuario está autentificado
use App\Models\Plan;
use Illuminate\Support\Str; // Para renombrar la imagen
use DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtengo los planes
        $plans = Plan::all();

        // Sin login muestro las planes
        if (!Auth::check()) {
            return view('plan.indexPlan', compact('plans'));
        }

        // Obtengo el rol del usuario
        $role = Auth::user()->role;

        // Verifico si el usuario es cliente
        if ($role === 'user') {

            // Obtengo los planes reservados por el current_user y la imagen de la tabla de Plans
            $plans = DB::select('
                SELECT reservations.*, plans.* 
                FROM reservations 
                JOIN plans ON reservations.plan_id = plans.id 
                WHERE reservations.customer_id = ? AND reservations.plan_id IS NOT NULL',
                [Auth::user()->id]
            );

            // Obtengo los planes que no están reservados por el current_user y la imagen de la tabla de Plans
            $otherPlans = DB::select('
                SELECT *
                FROM plans
                WHERE id NOT IN (
                    SELECT plan_id
                    FROM reservations
                    WHERE customer_id = ?
                ) 
                
            ', [Auth::user()->id]);

            // Retorno la vista con los planes
            return view('customer.planCustomer', compact('plans', 'otherPlans'));

        } elseif ($role === 'admin') { // Si el usuario es admin
            $plans = Plan::all(); // Obtengo todas los planes
            return view('admin.indexPlanAdmin', compact('plans')); // Pasar las actividades a la vista
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
        return view('admin.createPlanAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Valido los datos
        $request->validate([]); // dd($request);

        // Crear el plan
        $plan = Plan::create($request->all());

        // Subir la imagen si existe
        if ($request->hasFile('image')) {

            // Obtengo la imagen y la almaceno
            $image = $request->file('image');

            // Renombro la imagen
            $nombreImagen = Str::slug($request->name) . '.' . $image->guessExtension(); // Para que lo guarde con el nombre original y extension

            // Guardo la imagen

            $ruta = public_path('images/plans/');

            $image->move($ruta, $nombreImagen);

            $plan->image = $nombreImagen;

            $plan->save(); // Guardo el plan en la base de datos

        }
        // Redirigir a la vista de planes
        return redirect()->route('plans.index')->with('success', 'Plan creado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Busco el plan por su id
        $plan = Plan::find($id);

        if (!$plan) {
            return redirect()->route('plans.index')->with('error', 'Plan no encontrado');
        } else {
            return view('plan.showPlan', compact('plan'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Busco el plan por su id
        $plan = Plan::find($id);

        if (!$plan) {
            return redirect()->route('plans.index')->with('error', 'Plan no encontrado');
        } else {
            return view('admin.editPlanAdmin', compact('plan'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Valido los datos
        $request->validate([]);

        // Obtener los datos del request
        $data = $request->all();

        // Busco el plan por su id
        $plan = Plan::find($id);

        if (!$plan) {
            return redirect()->route('plans.index')->with('error', 'Plan no encontrado');
        } else {
            $plan->update($data);
            return redirect()->route('plans.index')->with('success', 'Plan actualizado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busco la actividad por su id
        $plan = Plan::find($id);

        if (!$plan) {
            return redirect()->route('plans.index')->with('error', 'Plan no encontrado');
        } else {
            $plan->delete();
            return redirect()->route('plans.index')->with('success', 'Plan eliminado correctamente');
        }
    }
}
