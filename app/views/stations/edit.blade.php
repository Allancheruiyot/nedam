@extends('layouts.erp')
@section('content')

<div class="row">
	<div class="col-lg-12">
  <h4><font color='green'>Update Stations</font></h4>

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

		 <form method="POST" action="{{{ URL::to('stations/update/'.$stations->id) }}}" accept-charset="UTF-8">
   <font color="red"><i>All fields marked with * are mandatory</i></font>
    <fieldset>
        <div class="form-group">
            <label for="username">Station Name <span style="color:red">*</span> :</label>
            <input class="form-control" placeholder="" type="text" name="station_name" id="name" value="{{$stations->station_name}}" required>
        </div>

        <div class="form-group">
            <label for="username">Location <span style="color:red">*</span> :</label>
            <input class="form-control" placeholder="" type="text" name="location" id="name" value="{{$stations->location}}" required>
        </div>

        <div class="form-group">
            <label for="username">Description <span style="color:red">*</span> :</label>
            <input class="form-control" placeholder="" type="text" name="description" id="name" value="{{$stations->description}}" required>
        </div>

        

        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </div>

    </fieldset>
</form>
		

  </div>

</div>

@stop