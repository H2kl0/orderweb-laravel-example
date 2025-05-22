<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technicians = Technician::all();
        return view('technician.index', compact('technicians'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technician.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
{
    $validated = $request->validate([
        'document' => 'required|string|max:255', 
    ]);

    Technician::create($validated);

    session()->flash('message', 'Registro creado exitosamente');
    return redirect()->route('technician.index');
}
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
    $technicians = technician::find($id); 
    if ($technicians) {
        return view('technician.edit', compact('technicians'));
    } else {
        session()->flash('Warning', 'No se encuentra el registro solicitado');
        return redirect()->route('technician.index');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $technicians = technician::find($id);

    if ($technicians) {
        $technicians->update($request->all()); 
        session()->flash('message', 'Registro actualizado exitosamente');
    } else {
        session()->flash('Warning', 'No se encuentra el registro solicitado');
    }

    return redirect()->route('technician.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technicians = Technician::find($id);
        if ($technicians) //si existe el causal
        {
            $technicians->delete();
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
            
        }

        return redirect()->route('technician.index');
    }
}
