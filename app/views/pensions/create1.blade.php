@extends('layouts.app')
@section('content')
<?php use App\Http\Controllers\UserController;?>


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Deductions</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Deduction</a>
                        </li>
                        <li class="active">
                            <strong>Edit </strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

          </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter a deduction</h5>                       

                        <div class="ibox-tools">

                        <a class="btn btn-primary" href="{{ url('/deduction-users') }}"> Back</a>


                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">


                    @if (count($errors) > 0)
     <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
  </ul>
    </div>
@endif

  {!! Form::open(array('route' => 'deductions.store','method'=>'POST')) !!}
<div class="row">

  <div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
           <strong>Name:</strong>
      <input name="name" value="{{$user->name}}" class="form-control" disabled />
   </div>
  </div>

 <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Payroll No:</strong>
    <input  type="text" name="payroll_no" value="{{$user->payroll_no}}" class="form-control" disabled="" />
   </div>
 </div>
<input type="hidden" name="payroll_no" value="{{$user->payroll_no}}" class="form-control"/>
<input type="hidden" name="entered_by" value="{{AUTH::user()->id}}" class="form-control"/>

<div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Employee Deduction:</strong>
    <input name="employee_contribution" id="employee_contribution" class="form-control"/>
   </div>
 </div>
 <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Employer Contribution:</strong>
    <input name="employer_contribution" id="employer_contribution" class="form-control"/>
   </div>
 </div>


 <script>
  function cummulative() {
     var employee=parseFloat($('#employee_contribution').val());
     var employer=parseFloat($('#employer_contribution').val());
     var total=employee+employer;
     var interest=(3/100)*total;
     $('#interest').val(interest);
     var cummulative=total+interest;
     $('#cummulative_deduction').val(cummulative);
  }

 </script>


    <input type="hidden" name="interest" id="interest" value="0"/>
   
 <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Total Contribution:</strong>
    <input name="monthly_deduction" id="cummulative_deduction" value="" class="form-control"/>
   </div>
 </div>

 <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Entry Month</strong>
        
     <input name="month" value=" " class="monthly form-control"/>

   </div>
 </div>

 <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Year (e.g 2017)</strong>
    <input name="year" value=" " class="yearly form-control"/>
   </div>
 </div>
  
  <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Comments:</strong>
    <textarea name="comments" class="form-control"></textarea> 
       </div>
 </div>



<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>


</div>

  {!! Form::close() !!}


                                   

                    </div>
                    
                </div>
            </div>
            </div>
  </div>




@endsection





























