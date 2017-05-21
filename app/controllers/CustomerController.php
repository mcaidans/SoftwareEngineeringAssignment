<?php

class CustomerController extends \BaseController {

	public function index(){
	}
	//Function to make view for creating a customer
	public function create()
	{
		return View::make('createCustomer');
	}
	
	//Function to store a customer in the database
	public function store()
	{
		$input = Input::all();
		$v = Validator::make($input, Customer::$rules);
		if ($v->passes())
		{		
		$customer = new Customer();
		$customer->phoneNo = $input['phoneNo'];
		$customer->address = $input['address'];
		$customer->name = $input['name'];
		$customer->cardNo = $input['cardNo'];
		$customer->secCode = $input['secCode'];
		$customer->cardName = $input['cardName'];
		$customer->expDate = $input['expDate'];
		$customer->save();
		return View::make('createOrder')->withCustomer($customer);
		}
		else{
			return Redirect::back()->withErrors($v);
		}
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$customer = Customer::find($id);
		return View::make('editCustomer')->withCustomer($customer);
	}

	public function update($id)
	{
		$input = Input::all();
		$v = Validator::make($input, Customer::$rules);
		if ($v->passes())
		{		
		$customer = Customer::find($id);
		$customer->phoneNo = $input['phoneNo'];
		$customer->address = $input['address'];
		$customer->name = $input['name'];
		$customer->cardNo = $input['cardNo'];
		$customer->secCode = $input['secCode'];
		$customer->cardName = $input['name'];
		$customer->expDate = $input['name'];
		$customer->save();
		return View::make('createOrder')->withCustomer($customer);
		}
		else{
			return Redirect::back()->withErrors($v);
		}
	}

	public function destroy($id)
	{
		$customer = Customer::find($id);
		$customer->delete();
	}
	
	public function search()
	{
		$input = Input::all();
		$v = Validator::make($input, Customer::$searchRules);
		if ($v->passes())
		{
			$searchterm = $input['searchterm'];
			$customers = Customer::where('phoneNo', '=', "$searchterm")->get();
			if (!$customers->isEmpty()){
				return View::make('createOrder')->withCustomer($customers->first());
			}
			else{
				return View::make('createCustomer')->withSearchterm($searchterm);
			}
		}
		else{
			return Redirect::route('order.index')->withErrors($v);
		}
	}
		
	

}
