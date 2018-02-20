@extends('layouts.employeecss')
@section('content')

<div class="row">
	<div class="col-lg-12">
  <h3>Select Period</h3>

<hr>
</div>	
</div>


<style type="text/css">
    .select2 {z-index:10 !important; }
</style>


<div class="row">
	<div class="col-lg-5">

    
		
		 @if (Session::has('flash_message'))

      <div class="alert alert-success">
      {{ Session::get('flash_message') }}
     </div>
    @endif

     @if (Session::has('delete_message'))

      <div class="alert alert-danger">
      {{ Session::get('delete_message') }}
     </div>
    @endif

		 <form target="_blank" method="POST" action="{{URL::to('payrollReports/pensions')}}" accept-charset="UTF-8">
    <fieldset>

        <div class="form-group">
                        <label for="username">From <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input required class="form-control datepicker2" readonly="readonly" placeholder="" type="text" name="from" id="from" value="{{{ Input::old('from') }}}">
                    </div>
       </div>

       <div class="form-group">
                        <label for="username">To <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input required class="form-control datepicker2" readonly="readonly" placeholder="" type="text" name="to" id="to" value="{{{ Input::old('to') }}}">
                    </div>
       </div>

           <input type="hidden" name="employeeid" value="{{$id}}">

            
            <!-- <div class="form-group">
                        <label for="username">Select Category <span style="color:red">*</span></label>
                        <select name="type" id="type" class="form-control" required>
                           <option></option>
                           @if(Entrust::can('manager_payroll'))
                           <option value='All'>All</option>
                           <option value="management"> Management </option>
                           @endif
                           <option value="normal"> Normal </option>
                        </select>
                
                    </div> -->

            <input type="hidden" name="type" value="normal">
                    
            <div class="form-group">
                        <label for="username">Download as: <span style="color:red">*</span></label>
                        <select required name="format" class="form-control select2">
                            <option></option>
                            <option value="excel"> Excel</option>
                            <option value="pdf"> PDF</option>
                        </select>
                
            </div>
        
        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Select</button>
        </div>

       <br>
    </fieldset>
</form>
		

  </div>

</div>


@stop