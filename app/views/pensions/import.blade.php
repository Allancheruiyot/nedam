@extends('layouts.payroll')
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
                            <strong>Import </strong>
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
                        <h5>Import deductions csv</h5>                       

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
<p> Before uploading your csv file, download the sample below and udjust your columns to look like the sample csv. The file will be rejected if the columns are not correct.</p>
                    <a href="{{ url('/uploads/joshua.csv') }}" class="btn btn-primary">Sample csv File</a>

 {!! Form::open(array('url' => '/import','method'=>'POST','files'=>'true')) !!}

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

  <div class="col-xs-8 col-sm-8 col-md-8">
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
    <div class="form-control" data-trigger="fileinput">
        <i class="glyphicon glyphicon-file fileinput-exists"></i>
    <span class="fileinput-filename"></span>
    </div>
    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Select file</span>
        <span class="fileinput-exists">Change</span>
        <input type="file" name="thefile"/>
    </span>
    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
</div> 
  </div>

 


<div class="col-xs-4 col-sm-4 col-md-4 text-center">
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





























