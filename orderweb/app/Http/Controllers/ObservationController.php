<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $observations = Observation::all();
        return view('observations.index', compact('observations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('observations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Observation =  Observation::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('observations.index');
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
    $observation = Observation::find($id); 
    if ($observation) {
        return view('observations.edit', compact('observation'));
    } else {
        session()->flash('Warning', 'No se encuentra el registro solicitado');
        return redirect()->route('observations.index');
    }
}


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $observation = Observation::find($id);

    if ($observation) {
        $observation->update($request->all()); 
        session()->flash('message', 'Registro actualizado exitosamente');
    } else {
        session()->flash('Warning', 'No se encuentra el registro solicitado');
    }

    return redirect()->route('observations.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Observation = Observation::find($id);
        if ($Observation) //si existe el causal
        {
            $Observation->delete();
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
            
        }

        return redirect()->route('observations.index');

    }
}
