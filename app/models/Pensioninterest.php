<?php


class Pensioninterest extends Eloquent
{
    //
    public static function getInterest($id){
       $pensioninterest = Pensioninterest::where('employee_id',$id)->first();
       return $pensioninterest->interest; 
    }

    public static function getComment($id){
       $pensioninterest = Pensioninterest::where('employee_id',$id)->first();
       return $pensioninterest->comment; 
    }

    public static function getPeriod($id){
       $pensioninterest = Pensioninterest::where('employee_id',$id)->first();
       return $pensioninterest->period; 
    }

    public static function getEmployee($id,$period){
       $pensioninterest = Pensioninterest::where('employee_id',$id)->where('period',$period)->first();
       if(count($pensioninterest) == 0){
        $employee = Employee::find($id);
        return $employee->id; 
       }
    }

    public static function getTransactInterest($id,$period){
       $pensioninterest = Pensioninterest::where('employee_id',$id)->where('period',$period)->first();
       if(count($pensioninterest) == 0){
       return 0.00;
       }else{
       return $pensioninterest->interest;
       } 
    }

    public static function getTransactTotalInterest($period){
       $pensioninterest = Pensioninterest::where('period',$period)->sum('interest');
       if(count($pensioninterest) == 0){
       return 0.00;
       }else{
       return $pensioninterest;
       } 
    }

    public static function getTransactComment($id,$period){
       $pensioninterest = Pensioninterest::where('employee_id',$id)->where('period',$period)->first();
       if(count($pensioninterest) == 0){
       return "";
       }else{
       return $pensioninterest->comment; 
       }
    }
}
