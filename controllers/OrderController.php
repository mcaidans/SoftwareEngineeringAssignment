<?php

class OrderController extends \BaseController {	//CONTROLLER FOR ALL ORDER FUNCTIONALITY

	//Function to make the homepage-view
	public function index()
	{
		$orders = Order::all();
		return View::make('index', compact('orders'));
	}

	//Function to make the view to create a new Order
	public function create()
	{
		return View::make('createOrder');
	}
	
	//Function to store a new Order in the database
	public function store()
	{
		$input = Input::all();
		$v = Validator::make($input, Order::$rules);
		if ($v->passes())
		{		
			$order = new Order();
			$order->customer_id = $input['customer_id'];
			$order->details = $input['details'];
			$order->delivery = $input['delivery'];
			$order->ordTotal= 0;
			$order->complete = false;
			$order->save();
			return View::make('ordOpen')->withOrder($order);
		}
		else
		{
		return View::make('createOrder')->withErrors($v);
		}
	}
	
	//Function to show a currently 'open' order
	public function show($id)
	{
	$order = Order::find($id);
	return View::make('ordOpen')->withOrder($order);
	}

	public function edit($id)
	{
		$order = Order::find($id);
		return View::make('editOrder')->withOrder($order);
	}

	public function update($id)
	{
		//$input = Input::all();
		$order = Order::find($id);
		$order->complete = true;
		$order->save();
		return Redirect::route('order.index');
	}

	//Function to delete an order from the database
	public function destroy($id)
	{
		$order = Order::find($id);
		$order->menuitems()->detach();	//Also deletes all items in order
		$order->delete();
		return Redirect::route('order.index');
	}
	
	//Function to add an item to an order
	public function addItem($id)
	{
		$input = Input::all();
		$v = Validator::make($input, Order::$itemRules);
		$order = Order::find($id);
		if ($v->passes())
		{	
		$menuitem_id = $input['menuitem_id'];
		$quantity = $input['quantity'];
		$menuitem = Menuitem::find($menuitem_id);	//Finds correct menuitem
		$price = $menuitem->price;
		$totalPrice = $price * $quantity;		//Generates total price of item depending on quantity
		$order->menuitems()->sync([$menuitem_id, ['quantity' => $quantity, 'totalPrice' => $totalPrice]]);
		$sum = 0;
		foreach($order->menuitems as $menuitem){
			$sum += $menuitem->pivot->totalPrice;
		}
		$order->ordTotal = $sum;
		$order->save();
		return Redirect::route('order.show', array($id));
		}
		else{
			return View::make('ordOpen')->withOrder($order)->withErrors($v);
		}
	}
	
	//Function to remove an item from the database
	public function removeItem($id)
	{
		$input = Input::all();
		$order = Order::find($id);
		$menuitem_id = $input['menuitem_id'];
		$menuitem = Menuitem::find($menuitem_id);
		$totalPrice = $input['totalPrice'];
		$order->menuitems()->detach($menuitem->id);		//Removes item corresponding to order
		$order->ordTotal = $order->ordTotal - $totalPrice;
		$order->save();
		return Redirect::route('order.show', array($id));
	}
	
	public function viewTakings(){
		$orders = Order::all();
		$sum = 0;
		foreach($orders as $order){
			$sum += $order->ordTotal;	
		}
		return View::make('viewTakings')->withSum($sum);
	}

}
