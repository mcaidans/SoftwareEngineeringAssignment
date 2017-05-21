<?php
//Route Determining Home Controller
Route::get('/', array('as' => 'home', 'uses' => 'OrderController@index'));

//Auto-generated "common" routes
Route::resource('customer', 'CustomerController');
Route::resource('menuitem', 'MenuitemController');
Route::resource('order', 'OrderController');

//Customer Function Routes
Route::post('customer/search', array('as' => 'customer.search', 'uses' => 'CustomerController@search'));
Route::post('order/addItem/{id}', array('as' => 'order.additem', 'uses' => 'OrderController@addItem'));
Route::get('/viewTakings', array('as' => 'order.viewTakings', 'uses' => 'OrderController@viewTakings'));
Route::post('order/complete/{id}', array('as' => 'order.complete', 'uses' => 'OrderController@complete'));
Route::delete('order/removeItem/{id}', array('as' => 'order.removeitem', 'uses' => 'OrderController@removeItem'));

