@extends('layouts.payroll')
@section('content')


     <div class="row">
      <div class="col-lg-12">
       <h3>Pension</h3>

       <hr>
      </div>  
     </div>
            
            <div class="row">
                <div class="col-lg-12">
                  @if (Session::has('flash_message'))

      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      {{ Session::get('flash_message') }}
     </div>
    @endif

     @if (Session::has('delete_message'))

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      {{ Session::get('delete_message') }}
     </div>
    @endif
                <!-- <div class="ibox float-e-margins">
                    <div class="ibox-title"> -->

                      @if ($message = Session::get('success'))
                       <div class="alert alert-success">
                         <p>{{ $import_msg }}</p>
                         </div>
                        @endif

                        <!-- <h5>Deductions summary</h5>     -->                  

                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <a class="btn btn-info btn-sm" href="{{ URL::to('pensions/create')}}">new pension</a>
                          </div>
                        <div class="panel-body">


                  <div class="table-responsive">
                    <table id="users" class="table table-striped table-bordered table-hover deductions_tbl" >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Employee Contribution</th>
                        <th>Employee Percentage (%)</th>
                        <th>Employer Contribution</th>
                        <th>Employer Percentage (%)</th>
                        <th>Total Contribution</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; $employee=0;$employer=0;$interest=0; $total=0;?>

                    @foreach ($pensions as $deduction)

                  <?php echo $deduction->id; ?>

                      <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $deduction->employee->personal_file_number.' : '.$deduction->employee->first_name.' '.$deduction->employee->last_name }}</td>
                          <td> Ksh {{ number_format(floatval($deduction->employee_contribution),2) }}</td>
                          <td>{{ number_format(floatval($deduction->employee_percentage),2) }}</td>
                          <td> Ksh {{ number_format(floatval( $deduction->employer_contribution),2)  }}</td>
                          <td>{{ number_format(floatval($deduction->employer_percentage),2) }}</td>
                          <td> Ksh {{ number_format(floatval( $deduction->employee_contribution + $deduction->employer_contribution),2)  }}</td>
                          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                     <li><a href="{{URL::to('pensions/view/'.$deduction->id)}}">View</a></li> 
                    <li><a href="{{URL::to('pensions/edit/'.$deduction->id)}}">Update</a></li>
                   
                    <li><a href="{{URL::to('pensions/delete/'.$deduction->id)}}" onclick="return (confirm('Are you sure you want to delete this employee pension?'))">Delete</a></li>
                    
                  </ul>
              </div>

                    </td>

                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    
                    </tbody>
                    
                    </table>
                        </div>                      

                    </div>
                </div>
            </div>
            </div>
        
<?php $i++;?>
@endsection
