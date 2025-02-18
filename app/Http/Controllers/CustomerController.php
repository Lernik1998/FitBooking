<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargo la pagina principal de los clientes
        return view('customer.indexCustomer');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestro el formulario para crear un nuevo cliente
        return view('admin.createCustomerAdmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recibo los datos del formulario
        $data = $request->all();

        // Validación
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        // Creo el cliente
        User::create($validatedData);

        // Redirecciono a la vista de clientes
        return redirect()->route('admin.usuariosAdmin')->with('success', 'Usuario creado correctamente');
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
        $customer = User::findOrFail($id); //  Si el usuario no existe, Laravel mostrará automáticamente una página 404.
        return view('admin.editCustomerAdmin', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Recibo el id del cliente
        $customer = User::find($id);

        if (!$customer) {
            return redirect()->route('admin.indexAdmin')->with('error', 'Customer not found');
        } else {
            $customer->update($request->all());
            return redirect()->route('admin.usuariosAdmin')->with('success', 'Customer updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recibo el id del cliente
        $customer = User::find($id);

        if (!$customer) {
            return redirect()->route('admin.indexAdmin')->with('error', 'Customer not found');
        } else {
            $customer->delete();
            return redirect()->route('admin.usuariosAdmin')->with('success', 'Customer deleted successfully');
        }
    }

    /*  No se usa por ahora, pero lo dejo por si se quiere agregar en el futuro
    public function customerActivities()
    {
        // Verifico si el usuario esté autentificado y es un cliente
        if (!Auth::check() || Auth::user()->role !== 'user') {
            abort(403);
        }
        // Devuelvo vista de actividades
        return view('activity.customerActivities.customerActivities');
    }*/
}
