<?php

class PensionsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pensions = Pension::all();

        /* if ( !Entrust::can('view_pension') ) // Checks the current user
        {
        return Redirect::to('home')->with('notice', 'you do not have access to this resource. Contact your system admin');
        }else{*/
        Audit::logaudit('Pension', 'view', 'viewed employee pension');

         return View::make('pensions.index',compact('pensions'));
      // }
      
    }

    public function deductions()
    {
        $data['users']= User::all();

      
    return View::make('pensions.employee',$data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $employees = DB::table('employee')
              ->where('in_employment','=','Y')
              ->where('employee.organization_id',Confide::user()->organization_id)
              ->get();
      /*if ( !Entrust::can('create_pension') ) // Checks the current user
        {
        return Redirect::to('home')->with('notice', 'you do not have access to this resource. Contact your system admin');
        }else{*/
      return View::make('pensions.create',compact('employees')); 
    //}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    
    //Pension::create($request->all());

        $pension = new Pension;

        $pension->employee_id = Input::get('employee');
        $pension->employee_contribution=str_replace(",","",Input::get('employeecont'));
        $pension->employer_contribution=str_replace(",","",Input::get('employercont'));
        $pension->employee_percentage=str_replace(",","",Input::get('pemployeecont'));
        $pension->employer_percentage=str_replace(",","",Input::get('pemployercont'));
        $pension->type=Input::get('formular');
        $pension->save();

    Audit::logaudit('Pension', 'create', 'created pension for employee '.$pension->personal_file_number.' : '.$pension->first_name.' '.$pension->last_name.' employee contribution '.str_replace(",","",Input::get('employeecont')).' and employer contribution '.str_replace(",","",Input::get('employercont')));

    return Redirect::to('pensions')->withFlashMessage('Pension contribution successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deductions  $deductions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data['pension']=Pension::find($id);

      return View::make('pensions.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deductions  $deductions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pension']=Pension::find($id);

       // return $data;
        /*if ( !Entrust::can('update_pension') ) // Checks the current user
        {
        return Redirect::to('home')->with('notice', 'you do not have access to this resource. Contact your system admin');
        }else{*/
        return View::make('pensions.edit',$data);
      //}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deductions  $deductions
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

       $pension=Pension::find($id);
       
       /*$deduction->update(array('employee_contribution'=>$request->employee_contribution,
                                 'employer_contribution'=>$request->employer_contribution,
                                 'interest'=>$request->interest,
                                 'monthly_deduction'=>$request->monthly_deduction,
                                 'comments'=>$request->comments)); */

        $pension->employee_contribution=str_replace(",","",Input::get('employeecont'));
        $pension->employer_contribution=str_replace(",","",Input::get('employercont'));
        $pension->employee_percentage=str_replace(",","",Input::get('pemployeecont'));
        $pension->employer_percentage=str_replace(",","",Input::get('pemployercont'));
        $pension->type=Input::get('formular');
        $pension->save();

       Audit::logaudit('Pension', 'update', 'updated pension for employee '.$pension->personal_file_number.' : '.$pension->first_name.' '.$pension->last_name.' employee contribution '.str_replace(",","",Input::get('employeecont')).' and employer contribution '.str_replace(",","",Input::get('employercont')));

    return Redirect::to('pensions')->withFlashMessage('Pension contribution successfully created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deductions  $deductions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pension=Pension::find($id);
        /*if ( !Entrust::can('delete_pension') ) // Checks the current user
        {
        return Redirect::to('home')->with('notice', 'you do not have access to this resource. Contact your system admin');
        }else{*/
        Pension::find($id)->delete();
        Audit::logaudit('Pension', 'delete', 'deleted pension for employee '.$pension->personal_file_number.' : '.$pension->first_name.' '.$pension->last_name.' employee contribution '.str_replace(",","",$request->employeecont).' and employer contribution '.str_replace(",","",$request->employercont));

    return Redirect::to('pensions')->withDeleteMessage('Pension contribution successfully deleted!');
    //}
    }


    public function user_import($id)
    {
     $data['user']=User::find($id);
      return view('pensions.import',$data); 
    }


    public function import(Request $request)
    {

    
    $path= Controller::showUploadFile($request);

            
       if($path!=1){     
            
            
          $file = fopen($path,"r");
        
          $headings=fgetcsv($file);        
        
          $columns=array('monthly_deduction', 'cummulative_deduction', 'comments', 'month', 'year');
         
         $records=fgetcsv($file);
         
          foreach($headings as $key=>$heading){               
                $temp_record[$heading]= $records[$key]; 
           }
           
           
         
         $missing=0;
        foreach($columns as $column){
            if(!array_key_exists( $column,$temp_record)){
            $missing++;
              echo $column."= Missing<br>";           
            }else{
            echo $column."= Exists<br>";      
            }
        }
        
    
        
    if($missing==0){
       $count=0;
        while(! feof($file))
          {
                
          $records=fgetcsv($file);
          $temp_record=array();
              foreach($headings as $key=>$heading){               
                $record[$heading]= $records[$key]; 
              }           
          $payroll_no=$request->payroll_no;
          $monthly_deduction=addslashes($record['monthly_deduction']);
          $cummulative_deduction=addslashes($record['cummulative_deduction']); 
          $comments=addslashes($record['comments']); 
          $month=addslashes($record['month']);        
          $year=addslashes($record['year']);    

          
  $Deductions = new Deductions;      
$inv_response=$Deductions->insert_record($payroll_no,$monthly_deduction,$cummulative_deduction,$comments,$month,$year);
             
       $count++;  
          }

    }else{
        $import_msg='A column is missing.'; 
        }
                 
        fclose($file); 
        
    
        
    }else{
        $import_msg="file was not uploaded";
        
        }
    
   return Redirect::to('deductions');
        
    }

}
