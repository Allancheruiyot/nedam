<?php

class Transact extends \Eloquent {

public $table = "transact";

	protected $fillable = [];

public static function getUser($id){
 $user = User::find($id);
 return $user->username;
}

public static function getTransact($month,$year){
 $period = $month.'-'.$year;
 $statutories = DB::table('transact')
            ->join('employee', 'transact.employee_id', '=', 'employee.personal_file_number')
            ->where('employee.organization_id',Confide::user()->organization_id)
            ->where('financial_month_year' ,'=', str_replace(' ', '', $period))
            ->get(); 
 return $statutories;
}

}