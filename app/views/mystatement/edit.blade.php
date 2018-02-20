@extends('layouts.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Deductions</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Deductions</a>
                        </li>
                        <li class="active">
                            <strong>Edit</strong>
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
                        <h5>Edit User</h5>                       

                        <div class="ibox-tools">

                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>


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

  {!! Form::model($deduction, ['method' => 'PATCH','route' => ['deductions.update', $deduction->id]]) !!}

 <div class="row">

   <input  type="hidden" name="id" value="{{$deduction->id}}"/>

 <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Payroll No:</strong>
    <input  type="text" name="payroll_no" value="{{$deduction->payroll_no}}" class="form-control" disabled="" />
   </div>
 </div>


<input type="hidden" name="payroll_no" value="{{$deduction->payroll_no}}" class="form-control"/>
<div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Monthly Deduction:</strong>
    <input name="monthly_deduction" value=" {{$deduction->monthly_deduction}}" class="form-control"/>
   </div>
 </div>
  
  <div class="col-xs-4 col-sm-4 col-md-4">
     <div class="form-group">
       <strong>Comments:</strong>
    <textarea name="comments" class="form-control">{{$deduction->comments}}</textarea> 
       </div>
 </div>



<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>


</div>

  {!! Form::close() !!}
  </div><!-- Main row -->

                                   

                    </div>
                    
                </div>
            </div>
            
  </div>


@endsection


