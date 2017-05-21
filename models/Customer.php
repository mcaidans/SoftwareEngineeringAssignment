<?php

class Customer extends Eloquent {
    
    function cards(){
        return $this->hasOne('Card');
    }
    
    function orders(){
        return $this->hasMany('Order');
    }
    
    public static $rules = array(
        'name' => 'required|alpha|max:40',
        'address' => 'required',
        'phoneNo' => '|required|digits_between:8,10',
        'cardNo' => 'required|digits:16',
        'secCode' => 'required|digits:3',
        'cardName' => 'required|alpha|max:40',
        'expDate' => 'required|max:5'
    );
    
    public static $searchRules = array(
        'searchterm' => 'required|integer|digits_between:8,10'
    );
}