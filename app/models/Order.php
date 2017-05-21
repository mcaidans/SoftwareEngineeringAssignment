<?php

class Order extends Eloquent {
    
    function customer(){
        return $this->belongsTo('Customer');
    }
    
    function menuitems(){
        return $this->belongsToMany('Menuitem')->withPivot('quantity', 'totalPrice');
    }
    
    public static $rules = array(
       // 'customer_id' => 'required',
        'delivery' => 'required'
    );
    
    public static $itemRules = array(
        'menuitem_id' => 'required|integer|exists:menuitems,id'
    );
    
}