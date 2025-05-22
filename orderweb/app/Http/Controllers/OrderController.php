<?php

namespace App\Http\Controllers;

use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
            '1' => 'Cali',
            '2' => 'Medellin',
            '3' => 'Bogota',
            '4' => 'Barranquilla',
            '5' => 'Cartagena',
            '6' => 'Pereira',
            '7' => 'Bucaramanga',
            '8' => 'Cucuta',
            '9' => 'Manizales',
            '10' => 'Santa Marta'
        ];
        return view('order.edit', compact('order', 'causals', 'observations', 'cities'));
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
}
