<?php

class Menuitem extends Eloquent {
    
    public static $rules = array(
        'name' => 'required|max:40',
        'price' => 'required|numeric'
    );
    
    function orders(){
        return $this->belongsToMany('Order')->withPivot('quantity', 'totalPrice');
    }
}