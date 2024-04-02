<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomerViewController extends Controller
{

    protected $customer;
    public function __construct(){
        $this->customer = new Customers();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response['customers'] = $this->customer->all();
        return view('pages.customers.index')->with($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->customer->create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['customer'] = $this->customer->find($id);
        return view('pages.customers.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = $this->customer->find($id);
        $customer->update(array_merge($customer->toArray(), $request->toArray()));
        return redirect('customersview');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = $this->customer->find($id);
        $customer->delete();
        return redirect('customersview');
    }
}
