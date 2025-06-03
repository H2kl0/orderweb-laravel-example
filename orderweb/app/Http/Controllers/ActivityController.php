<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    private $rules = [
        'description' => 'required|string|min:3|max:255',
        'hours' => 'required|numeric|min:1|max:9999999999',
        'technician_id' => 'required|numeric|min:1|max:99999999999999999999',
        'type_activity_id' => 'required|numeric|min:1|max:99999999999999999999'
    ];
    private $traductionAttributes = [
        'description' => 'Descripción',
        'hours' => 'Horas',
        'technician_id' => 'Técnico',
        'type_activity_id' => 'Tipo de Actividad'
    ];
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     $technicians = Technician::all();
     $types = TypeActivity::all();
             return view('activity.create', compact('technicians','types'));
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
            return redirect()->route('activity.create')
                ->withInput()->withErrors($errors);
        }

        $activity =  Activity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('activity.index');
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
    public function edit(Request $request, string $id)
    {
      $validator = Validator::make($request->all(), $this->rules);
      $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails()) 
        {
            $errors = $validator->errors();
            return redirect()->route('type_activity.edit')
                ->withInput()->withErrors($errors);
        }

        $activity = Activity::find($id);
        if ($activity) //si existe el causal
        {
        $technicians = Technician::all();
        $types = TypeActivity::all();
            return view('activity.edit', compact('activity','types','technicians'));
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
             
        }
        return redirect()->route('activity.index');


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
            return redirect()->route('activity.edit', $id)
                ->withInput()->withErrors($errors);
    
        }
        $activity = Activity::find($id);
        if ($activity) //si existe el causal
        {
            $activity->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');
            return redirect()->route('activity.index');
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
 
        }
        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::find($id);
        if ($activity) //si existe el causal
        {
            $activity->delete();
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
            
        }

        return redirect()->route('activity.index');
    }
}
