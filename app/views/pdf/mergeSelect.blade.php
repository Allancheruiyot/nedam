@extends('layouts.stat_ports')
@section('content')

<script type="text/javascript">
    $(document).ready(function(){
       $('#periodmonth').hide();
       $('#periodyear').hide();

       $('#type').on('change',function(){

         if($(this).val() == 'month'){
           $('#periodmonth').show();
           $('#periodyear').hide();
           $('#py').val("");
         }else if($(this).val() == 'year'){
           $('#periodmonth').hide();
           $('#periodyear').show();
           $('#pm').val("");
         }else{
            $('#periodmonth').hide();
            $('#periodyear').hide();
            $('#pm').val("");
            $('#py').val("");
         }
       });
    });
</script>

<div class="row">
	<div class="col-lg-12">
  <h3>Select Period</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-5">

    
		
		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

		 <form target="_blank" method="POST" action="{{URL::to('mergeStatutory/report')}}" accept-charset="UTF-8">
   
    <fieldset>

        <div class="form-group">
                        <label for="username">Select By: <span style="color:red">*</span></label>
                        <select required id="type" name="type" class="form-control">
                            <option></option>
                            <option value="month"> Month</option>
                            <option value="year"> Year</option>
                        </select>
                
            </div>

        <div class="form-group" id="periodmonth">
                        <label for="username">Period <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input required class="form-control datepicker2" readonly="readonly" placeholder="" type="text" name="periodmonth" id="pm" value="{{{ Input::old('periodmonth') }}}">
                    </div>
       </div>

       <div class="form-group" id="periodyear">
                        <label for="username">Period <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input required class="form-control year" readonly="readonly" placeholder="" type="text" name="periodyear" id="py" value="{{{ Input::old('periodyear') }}}">
                    </div>
       </div>
        
       <div class="form-group">
                        <label for="username">Download as: <span style="color:red">*</span></label>
                        <select required name="format" class="form-control">
                            <option></option>
                            <option value="excel"> Excel</option>
                            <option value="pdf"> PDF</option>
                        </select>
                
            </div>

        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Select</button>
        </div>

    </fieldset>
</form>
		

  </div>

</div>


@stop