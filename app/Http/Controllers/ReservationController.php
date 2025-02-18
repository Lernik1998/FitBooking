<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Plan;
use App\Models\Activity;
use Carbon\Carbon; // Para la gestión de fechas
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtengo todas las reservas 
        $Datosreservations = DB::select('
                SELECT re.*, pl.*, ac.*, us.name, us.id, ac.image AS activity_image, pl.image AS plan_image, re.id AS reservation_id
                FROM reservations AS re
                LEFT JOIN plans AS pl ON re.plan_id = pl.id 
                LEFT JOIN activities AS ac ON re.activity_id = ac.id 
                LEFT JOIN users AS us ON re.customer_id = us.id
            ');

        // dd($Datosreservations);

        // Pasamos a la vista todas las reservas 
        return view('admin.reservationsAdmin', compact('Datosreservations'));
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
    // Gestiona la creación de una reserva pudiendo seleccionar solo una actividad o un plan
    public function store(Request $request)
    {
        // dd($request->all());

        $reservation = Reservation::create([
            'customer_id' => auth()->id(),
            'activity_id' => $request->input('activity_id'),
            'plan_id' => $request->input('plan_id'),
        ]);

        // Inserto la reserva en la base de datos
        $reservation->save();

        // Si se ha reservado una actividad o un plan
        if ($request->input('activity_id')) {
            // Redirecciono al cliente a la página de reservas con un mensaje de exito
            return redirect()->route('activities.index')->with('success', 'Reservado correctamente');

        } else {
            // Redirecciono al cliente a la página de reservas con un mensaje de exito
            return redirect()->route('plans.index')->with('success', 'Reservado correctamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Verifico el tipo de rol del usuario
        if (Auth::check()) {
            if (Auth::user()->role === 'user') {


                // Determino si es una actividad o un plan 

                $reservation = Reservation::where('activity_id', $id)->orWhere('plan_id', $id)->where('customer_id', auth()->id())->first();

                // dd($reservation);

                // Si la reserva es de plan
                if ($reservation->plan_id) {
                    $plan = Plan::find($reservation->plan_id);
                    return view('customer.gestionPlanCustomer', compact('plan', 'reservation'));
                } else {
                    // Si la reserva es de actividad
                    $activity = Activity::find($reservation->activity_id);
                    return view('customer.reservaActCustomer', compact('activity', 'reservation'));
                }
            } else {
                // Si es admin
                $reservation = Reservation::where('activity_id', $id)->where('customer_id', auth()->id())->first();

                // Verifico si la reserva existe
                if ($reservation) {
                    // Si la reserva existe, la paso a la vista de la actividad
                    return view('activity.activity', compact('reservation'));
                } else {
                    // Si la reserva no existe, redirecciono a la página de reservas con un mensaje de error
                    return redirect()->route('reservations.index')->with('error', 'Reserva no encontrada');
                }
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);

        // Obtengo el rol del usuario
        $role = auth()->user()->role;

        // Verifico si el usuario es cliente
        if ($role == 'user') {
            // Busco la reserva por el id
            $reservation = Reservation::where('customer_id', auth()->id())->where('id', $id)->first();

            // Si se ha reservado una actividad o un plan
            if ($reservation->activity_id) {

                // Obtengo la actividad
                $activity = Activity::findOrFail($reservation->activity_id);

                // Elimino la reserva
                $reservation->delete();
                // Redirecciono al cliente a la página de reservas con un mensaje de exito
                return redirect()->route('activities.index')->with('success', 'Reserva cancelada correctamente');

            } else {
                // Obtengo el plan
                $plan = Plan::findOrFail($reservation->plan_id);

                // Elimino la reserva
                $reservation->delete();
                // Redirecciono al cliente a la página de reservas con un mensaje de exito
                return redirect()->route('plans.index')->with('success', 'Reserva cancelada correctamente');
            }

            // FALTA PROBAR ESTA PARTE!!!!
        } else {
            // Si el usuario es admin, elimino la reserva
            // Busco la reserva por el id
            $reservation = Reservation::findOrFail($id);

            // Elimino la reserva
            $reservation->delete();

            return redirect()->route('reservations.index')->with('success', 'Reserva cancelada correctamente');
        }
    }
}
