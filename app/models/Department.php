<?php

class Department extends \Eloquent {

public static $rules = [
		'name' => 'required',
		'code' => 'required'
	];

public static $messages = array(
        'name.required'=>'Please insert department name!',
        'code.required'=>'Please insert department code!',
    );
	// Don't forget to fill this array
	protected $fillable = [];


	public function employees(){

		return $this->hasMany('Employee');
	}


public static function getName($id){
	$depart = Department::find($id);

return $depart->department_name;
}

public static function getCode($id){
	$depart = Department::find($id);

return $depart->codes;
}

}
