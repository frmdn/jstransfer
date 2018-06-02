<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends Controller
{
    public function index()
    {
    	$data = Customer::with('bank')->paginate(10);
    	return CustomerResource::collection($data);
    }

    public function show($id)
    {
    	$data = Customer::with('bank')->findOrFail($id);
    	return new CustomerResource($data);
    }

    public function store(Request $request)
    {
    	$data = $request->isMethod('put') ? Customer::findOrFail($request->customer_id) : new Customer;
    	$data->id = $request->input('customer_id');
    	$data->nama_customer = $request->input('nama_customer');
    	$data->norek = $request->input('norek');
    	$data->bank_id = $request->input('bank_id');

    	if ($data->save()) {
    		return new CustomerResource($data);
    	}
    }

    public function destroy()
    {
    	$data = Customer::findOrFail($id);
    	if ($data->delete()) {
    		return new CustomerResource($data);
    	}
    }
}
