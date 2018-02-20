<?php

class Pension extends \Eloquent
{
    
    protected $fillable = [
        'employee_id','employee_contribution','employer_contribution','interest','comments'
    ];


   
     public function insert_record($payroll_no,$monthly_deduction,$cummulative_deduction,$comments,$month,$year){
     	$this->payroll_no = $payroll_no;
        $this->monthly_deduction=$monthly_deduction;
        $this->cummulative_deduction=$cummulative_deduction;
        $this->comments =$comments;
        $this->month= $month;
        $this->year= $year;
        $this->entered_by=Confide::user()->id;
        $this->save();
     }

     public function employee(){

        return $this->belongsTo('Employee');
    }

}
