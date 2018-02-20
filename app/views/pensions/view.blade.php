@extends('layouts.payroll')
@section('content')
<?php


function asMoney($value) {
  return number_format($value, 2);
}

?>
<br>
<div class="row">
	<div class="col-lg-12">


<a class="btn btn-info btn-sm "  href="{{ URL::to('pensions/edit/'.$pension->id)}}">update details</a>
<a class="btn btn-danger btn-sm "  href="{{URL::to('pensions/delete/'.$pension->id)}}" onclick="return (confirm('Are you sure you want to delete this employee`s pension?'))">Delete</a>
<a class="btn btn-success btn-sm "  href="{{ URL::to('pensions')}}">Go Back</a>
<hr>
</div>	
</div>


<div class="row">

<div class="col-lg-3">

<img src="{{asset('/uploads/employees/photo/'.$pension->employee->photo) }}" width="150px" height="130px" alt=""><br>
<br>
<img src="{{asset('/uploads/employees/signature/'.$pension->employee->signature) }}" width="120px" height="50px" alt="">
</div>

<div class="col-lg-6">

<table class="table table-bordered table-hover">
<tr><td colspan="2"><strong><span style="color:green">Employee Pension Contribution</span></strong></td></tr>
      @if($pension->employee->middle_name != null || $pension->employee->middle_name != ' ')
      <tr><td><strong>Employee: </strong></td><td> {{$pension->employee->last_name.' '.$pension->employee->first_name.' '.$pension->employee->middle_name}}</td>
      @else
      <td><strong>Employee: </strong></td><td> {{$pension->employee->last_name.' '.$pension->employee->first_name}}</td>
      @endif
      </tr>
      <tr><td><strong>Formular: </strong></td><td>{{$pension->type}}</td></tr>
      <tr><td><strong>Employee Percentange: </strong></td><td>{{$pension->employee_percentage}}%</td></tr>
      <tr><td><strong>Employee Contribution: </strong></td><td>{{number_format($pension->employee_contribution,2)}}</td></tr>
      <tr><td><strong>Employer Percentange: </strong></td><td>{{$pension->employer_percentage}}%</td></tr>
      <tr><td><strong>Employer Contribution: </strong></td><td>{{number_format($pension->employer_contribution,2)}}</td></tr>
      <tr><td><strong>Total Contribution: </strong></td><td>{{number_format($pension->employee_contribution+$pension->employer_contribution,2)}}</td></tr>
      
</table>
</div>

</div>

@stop