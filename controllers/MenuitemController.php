<?php

class MenuitemController extends \BaseController {	//CONTROLLER FOR ALL MENUITEM FUNCTIONALITY

	//Function to make a view for menuitems ORDSYSTEM [MODIFY MENU] state
	public function index()
	{
		$menuitems = Menuitem::all();
		return View::make('modifyMenu', compact('menuitems'));
	}
	
	//Function to make a view for creating new menuitems
	public function create()
	{
		return View::make('createMenuitem');
	}

	//Function for storing menu items in the database
	public function store()
	{
		$input = Input::all();
		$v = Validator::make($input, Menuitem::$rules);
		if ($v->passes())
		{		
		$menuitem = new Menuitem();
		$menuitem->name = $input['name'];
		$menuitem->details = $input['details'];
		$menuitem->price= $input['price'];
		$menuitem->save();
		return Redirect::route('menuitem.index');
		}
		else{
			return Redirect::back()->withErrors($v);
		}
	}

	//Function for making a view to update a menu item 
	public function edit($id)
	{
		$menuitem = Menuitem::find($id);
		return View::make('editMenuitem')->withMenuitem($menuitem);
	}

	//Function to update a menu item
	public function update($id)
	{
		$input = Input::all();
		$v = Validator::make($input, Menuitem::$rules);
		if ($v->passes())
		{		
		$menuitem = Menuitem::find($id);
		$menuitem->name = $input['name'];
		$menuitem->details = $input['details'];
		$menuitem->price= $input['price'];
		$menuitem->save();
		return Redirect::route('menuitem.index');
		}
		else{
			return Redirect::back()->withErrors($v);
		}
	}

	//Function to delete a menu item from the database
	public function destroy($id)
	{
		$menuitem = Menuitem::find($id);
		$menuitem->delete();
		return Redirect::route('menuitem.index');
	}


}
