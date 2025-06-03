<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    private $rules = [
        'legalization_date' => 'required|date|date_format: Y-m-d',
        'address' => 'required|string|min:3|max:80',
        'city' => 'string|min:3|max: 99999999999999999999',
        'causal_id' => 'required|numeric|min:1|max:99999999999999999999',
        'observation_id' => 'max:99999999999999999999'
    ];
    private $traductionAttributes = [
        'legalization_date' => 'Fecha de Legalización',
        'address' => 'Dirección',
        'city' => 'Ciudad',
        'causal_id' => 'Causal',
        'observation_id' => 'Observación'
    ];
    private $cities = [
        ['name' => 'TULUÁ', 'value' => 'TULUA'],
        ['name' => 'CALI', 'value' => 'CALI'],
        ['name' => 'BUGA', 'value' => 'BUGA'],
        ['name' => 'PALMIRA', 'value' => 'PALMIRA']
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $causals = Causal::all();
        $observations = Observation::all();
        return view('order.create', compact('causals', 'observations'));
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
            return redirect()->route('order.create')
                ->withInput()->withErrors($errors);
        }
        $order = Order::create($request->all());
        session()->flash('success', 'Order created successfully.');
        return redirect()->route('order.index');
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
        $order = Order::find($id);
        
        if ($order)
        {

        $causals = Causal::all();
        $observations = Observation::all();
        $cities =[
                ['name' => 'TULUÁ', 'value' => 'TULUA'],
                ['name' => 'CALI', 'value' => 'CALI'],
                ['name' => 'BUGA', 'value' => 'BUGA'],
                ['name' => 'PALMIRA', 'value' => 'PALMIRA']
        ];

        $query = DB::select("SELECT * FROM activity WHERE activity.id NOT IN (
	SELECT order_activity.activity_id FROM order_activity
	WHERE order_activity.order_id = ?)", [$id]);

    $availableActivities = Collection::make($query);

        //Consultar ACTIVIDADES AGREGADAS
        $addedActivities = $order->activities;

        return view('order.edit', compact('order', 'causals', 'observations', 'cities', 'availableActivities', 'addedActivities'));
        }
        else
        {
            session()->flash('error', 'Order not found.');
            return redirect()->route('order.index');
        }
 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if ($order)
        {
            $order->update($request->all());
            session()->flash('success', 'Order updated successfully.');
            return redirect()->route('order.index');
        }
        else
        {
            session()->flash('error', 'Order not found.');
            return redirect()->route('order.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order)
        {
            $order->delete();
            session()->flash('success', 'Order deleted successfully.');
            return redirect()->route('order.index');
        }
        else
        {
            session()->flash('error', 'Order not found.');
            return redirect()->route('order.index');
        }
    }

    public function remove_activity(String $order_id, string $activity_id)
    {
        $order = Order::find($order_id);
        if (!$order)
        {
            session()->flash('error', 'Order not found.');
            return redirect()->route('order.edit', $order_id)->withInput();
        }
        $activity = Activity::find($activity_id);
        if (!$activity)
        {
            session()->flash('error', 'Activity not found.');
            return redirect()->route('order.edit', $order_id)->withInput(); 
        }
 

 //elimina la actividad en order_activity
        $order->activities()->detach($activity->id);
        session()->flash('success', 'Activity removed successfully.');
        return redirect()->route('order.edit', $order_id);
    
    }
    public function add_Activity(String $order_id, string $activity_id)
    {
        $order = Order::find($order_id);
        if (!$order)
        {
            session()->flash('error', 'Order not found.');
            return redirect()->route('order.edit', $order_id)->withInput();
        }
        $activity = Activity::find($activity_id);
        if (!$activity)
        {
            session()->flash('error', 'Activity not found.');
            return redirect()->route('order.edit', $order_id)->withInput(); 
        }
 

 //guardar la actividad en order_activity
        $order->activities()->attach($activity->id);
        session()->flash('success', 'Activity added successfully.');
        return redirect()->route('order.edit', $order_id);
    
    }

}