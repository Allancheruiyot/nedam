<?php

class Transact extends \Eloquent {

public $table = "transact";

	protected $fillable = [];

public static function getUser($id){
 $user = User::find($id);
 return $user->username;
}

}