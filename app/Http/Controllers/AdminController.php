<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use App\Models\Plan;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function index()
    {
        // Cargar datos desde la base de datos para pintar graficos
        $users = User::all();
        $activities = Activity::all();
        $plans = Plan::all();
        $reservations = Reservation::all();

        // Cargar información del sistema
        $sistema = php_uname();
        $cpuCarga = sys_getloadavg(); // Carga del CPU en los últimos 1, 5 y 15 minutos
        $memoria = memory_get_usage(true); // Uso de memoria en bytes

        return view('admin.indexAdmin', compact('users', 'activities', 'plans', 'sistema', 'cpuCarga', 'memoria', 'reservations')); // Vista en resources/views/admin/indexAdmin.blade.php
    }

    public function usuarios()
    {
        //Obtengo de la bd todos los usuarios que no sean admin
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin.usuariosAdmin', compact('users')); // Vista en resources/views/admin/usuariosAdmin.blade.php
    }

    public function actividades()
    {
        // Verifico que el usuario esté autentificado y es admin
        $user = auth()->user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        } else {
            // Obtengo de la bd todas las actividades
            $activities = Activity::all();

            return view('admin.activityAdmin', compact('activities')); // Vista en resources/views/admin/activityAdmin.blade.php
        }
    }

    public function planes()
    {
        // Verifico que el usuario esté autentificado y es admin
        $user = auth()->user();
        if (!$user || $user->role !== 'admin') {
            abort(403);
        } else {
            // Obtengo de la bd todos los planes
            $plans = Plan::all();
            return view('admin.indexPlanAdmin', compact('plans')); // Vista en resources/views/admin/indexPlanAdmin.blade.php
        }
    }
}
