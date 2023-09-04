<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $current_customers_id)
    {
        $order = new Order;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->billing_address = $request->billing_address;
        $order->shipping_address = $request->shipping_address;
        $order->total = '50';
        $order->phone_number = $request->phone_number;
        $order->zip_code = $request->zip_code;
        $order->customer_id = $current_customers_id;
        $order->user_id = auth()->user()->id;
        $order->save();

        return redirect()->route('homepage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $oreder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $oreder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $oreder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $oreder)
    {
        //
    }
}
