<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObservationController extends Controller
{
    private $rules = [
        'description' => 'required|string|min:3|max:255'
    ];
    private $traductionAttributes = [
        'description' => 'Descripción'
    ];
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
         $validator = Validator::make($request->all(), $this->rules);
      $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails()) 
        {
            $errors = $validator->errors();
            return redirect()->route('observations.create')
                ->withInput()->withErrors($errors);
        }
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
             $validator = Validator::make($request->all(), $this->rules);
      $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails()) 
        {
            $errors = $validator->errors();
            return redirect()->route('observations.edit')
                ->withInput()->withErrors($errors);
    
        }
    $observation = Observation::find($id);

    if ($observation) {
        $observation->update($request->all()); 
        session()->flash('message', 'Registro actualizado exitosamente');
    } else {
        session()->flash('Warning', 'No se encuentra el registro solicitado');
    }

    return redirect()->route('observations.index', $id);
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
