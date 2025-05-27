<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Matcher\Type;

class Type_ActivityController extends Controller
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
        $TypeActivity = TypeActivity::all();
        return view('type_activity.index', compact('TypeActivity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('type_activity.create');
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
            return redirect()->route('type_activity.create')
                ->withInput()->withErrors($errors);

        $TypeActivity =  TypeActivity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('type_activity.index');
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
        $typeActivity = TypeActivity::find($id);
        if($typeActivity) //si existe
        {
            return view('type_activity.edit', compact('typeActivity'));
        }
        else
        {
            session()->flash('warning', 'No se encuentra el tipo de actividad solicitado');
            return redirect()->route('type_activity.index');
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
            return redirect()->route('type_activity.edit', $id)
                ->withInput()->withErrors($errors);
        $TypeActivity = TypeActivity::find($id);
    $TypeActivity = TypeActivity::find($id);
    if ($TypeActivity) //si existe el causal
    {
        return view('type_activity.edit', compact('TypeActivity'));
        session()->flash('message', 'Registro actualizado exitosamente');
             
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
 
        }
        return redirect()->route('type_activity.index');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $TypeActivity = TypeActivity::find($id);
        if ($TypeActivity) //si existe el causal
        {
            $TypeActivity->delete();
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
        }
        else
        {
            session()->flash('Warning', 'No se encuentra el resgistro solicitado');
            
        }

        return redirect()->route('type_activity.index');
    }
}
