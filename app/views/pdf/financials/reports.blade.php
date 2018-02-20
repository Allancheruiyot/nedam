@extends('layouts.erp_ports')
@section('content')

<script type="text/javascript">
$(document).ready(function(){
$('#customperiod').hide();
$('#date').hide();

$('#period').change(function(){
if($(this).val() == "As at date"){
$('#customperiod').hide();
$('#date').show();
}else if($(this).val() == "custom"){
$('#customperiod').show();
$('#date').hide();
}else{
  $('#customperiod').hide();
  $('#date').hide();
}

});
});

</script>

<div class="row">
  <div class="col-lg-12">
  <h3> Financial Reports</h3>

<hr>
</div>  
</div>


<div class="row">
  <div class="col-lg-5">

   <form target="_blank" method="post" action="{{URL::to('reports/financials')}}">


      <div class="form-group">
            <label for="username">Report</label>
            <select class="form-control" name="report_type">
                <option value="">select report</option>
                <option>--------------------------</option>
                <option value="balancesheet">Balance Sheet</option>
                <option value="income">Profit & Loss</option>
                <option value="trialbalance">Trial Balance</option>
            </select>
            
        </div>

         <div class="form-group">
            <label for="username">Stations <span style="color:red">*</span> :</label>
            <select name="location" class="form-control" required>
            <option> select station ... </option>
            <option></option>
            <option value="all">All Stations</option>
                @foreach($stations as $station)
                <option value="{{$station->id}}">{{$station->station_name}}</option>
                @endforeach               
            </select>
        </div>

        <div class="form-group">
            <label for="username">Period</label>
            <select class="form-control" name="period" id="period">
                <option value="">select period</option>
                <option>--------------------------</option>
                <option value="As at date">As at Date</option>
                <option value="custom">Custom</option>
            </select>
            
        </div>

        <div id="customperiod">

        <div class="form-group">
                        <label for="username">From <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control datepicker20" readonly="readonly" placeholder="" type="text" name="from" id="from" value="{{{ Input::old('from') }}}">
                    </div>
       </div>


      <div class="form-group">
                        <label for="username">To <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control datepicker20" readonly="readonly" placeholder="" type="text" name="to" id="to" value="{{{ Input::old('to') }}}">
                    </div>
       </div>
       </div>

       <div class="form-group" id="date">
                        <label for="username">Date <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input class="form-control datepicker20" readonly="readonly" placeholder="" type="text" name="date" id="date" value="{{date('Y-m-d')}}">
                    </div>
       </div>


       <!--  <div class="form-group">
            <label for="username">As at Date </label>
            <input class="form-control" placeholder="" type="date" name="date" id="date" value="{{date('Y-m-d')}}">
        </div> -->


        <div class="form-actions form-group">
        
        

          <button type="submit" class="btn btn-primary btn-sm">View Report</button> 
        </div>


   </form>

  </div>

</div>
@stop