<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\InstructorController;

// Vista principal
Route::get('/', function () {
    return view('index');
})->name('index');

// Por ahora lo mantengo aquí, para posibles gestiones locales
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Middleware 'auth' para que se acceda a la ruta solo si se ha autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('plans', PlanController::class);

Route::resource('activities', ActivityController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.indexAdmin');
    Route::get('/admin/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuariosAdmin');
    Route::get('/admin/actividades', [AdminController::class, 'actividades'])->name('admin.activityAdmin');
    Route::get('/admin/planes', [AdminController::class, 'planes'])->name('admin.planesAdmin');

    Route::resource('customer', CustomerController::class);
    Route::resource('instructors', InstructorController::class);

    Route::post('/instructor/bind/{idAct}/{idIns}', [InstructorController::class, 'bindInstructor'])->name('instructors.bind');

    Route::get('/instructor/instructBindAct', [InstructorController::class, 'instructors'])->name('instructors.bindAct');

    Route::resource('reservations', ReservationController::class);
});

require __DIR__ . '/auth.php';
