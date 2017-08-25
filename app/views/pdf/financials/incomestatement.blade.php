<html>
  <head>
   <style>
     @page { margin: 170px 30px; }
     .header { position: fixed; left: 0px; top: -150px; right: 0px; height: 150px;  text-align: center; }
     .footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 50px;  }
     .footer .page:after { content: counter(page, upper-roman); }
     .content { margin-top: -70px;  }
      
   </style>
  <body style="font-size:10px">
<?php


function asMoney($value) {
  return number_format($value, 2);
}

?>

    
   <div class="header">
     <table >

      <tr>


       
        <td style="width:150px">

            <img src="{{ '../images/logo.png' }}" alt="{{ $organization->logo }}" width="90px"/>
    
        </td>

        <td>
        <strong>
          {{ strtoupper($organization->name)}}<br>
          </strong>
          {{ $organization->phone}} |
          {{ $organization->email}} |
          {{ $organization->website}}<br>
          {{ $organization->address}}
       

        </td>

        
        <?php 
        $range = '';
        if($period == 'As at date'){
        $newDate = date("d-M-Y", strtotime($date));
        $range = 'As at '.$newDate;
        }else if($period == 'custom'){
        $newFrom = date("d-M-Y", strtotime($from));
        $newTo = date("d-M-Y", strtotime($to));
        $range = $newFrom.' to '.$newTo;
        }
        ?>

        <td>
          <strong><h3>PROFIT & LOSS<br> {{$range}} </h3></strong>

        </td>
        

      </tr>


      <tr>

        <hr>
      </tr>



    </table>
   </div>
   <div class="footer">
     <p class="page">Page <?php $PAGE_NUM ?></p>
   </div>



   <div class="content">
     

      <table class="table table-bordered" style="width:100%">

        <tr>

          <td style="border-bottom:1px solid black;"><strong>Account Description</strong></td>
          <td style="border-bottom:1px solid black;"><strong>Amount</strong></td>
         

        </tr>


        <tr>
          <td style="border-bottom:1px solid black;"><strong>Income</strong></td>
          <td style="border-bottom:1px solid black;"></td>
          
            <?php 
            $total_income =0;
            $total_cogs =0;  
             ?>

        </tr>


        @foreach($accounts as $account)
        @if($account->category == 'INCOME'  && $account->income_category == 'normal')
        <tr>

          <td style="border-bottom:0.5px solid gray;">{{ $account->name}}</td>
          <td style="border-bottom:0.5px solid gray;">{{asMoney(Account::getAccountBalanceAtDate($account, $from, $to, $date, $period))}}</td>
        
          <?php $total_income = $total_income + Account::getAccountBalanceAtDate($account, $from, $to, $date, $period); ?>
        </tr>
        @endif
        @endforeach
        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Total Income</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_income)}}</strong></td>
          
          

        </tr>

        <tr>
          <td style="border-bottom:1px solid black;"><strong>Cost of Goods Sold</strong></td>
          <td style="border-bottom:1px solid black;"></td>


        </tr>

        @foreach($accounts as $account)
        @if($account->category == 'EXPENSE' && $account->expense_category == 'COGS')
        <tr>

          <td style="border-bottom:0.5px solid gray;">{{ $account->name}}</td>
          <td style="border-bottom:0.5px solid gray;">{{asMoney(Account::getAccountBalanceAtDate($account, $from, $to, $date, $period))}}</td>
        
          <?php $total_cogs = $total_cogs + Account::getAccountBalanceAtDate($account, $from, $to, $date, $period); ?>
        </tr>
        @endif
        @endforeach

        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Total COGS</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_cogs)}}</strong></td>
          
          

        </tr>

        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Gross Profit</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_income - $total_cogs)}}</strong></td>
          
          

        </tr>

<tr>
<td><br></td>
</tr>


         <tr>
          <td style="border-bottom:1px solid black;"><strong>Expense</strong></td>
          <td style="border-bottom:1px solid black;"></td>
          
            <?php $total_expense =0; ?>

        </tr>


        @foreach($accounts as $account)
        @if($account->category == 'EXPENSE' && $account->expense_category == 'Normal')
        <tr>

          <td style="border-bottom:0.5px solid gray;">{{ $account->name}}</td>
          <td style="border-bottom:0.5px solid gray;">{{asMoney(Account::getAccountBalanceAtDate($account,  $from, $to, $date, $period))}}</td>
        
          <?php $total_expense = $total_expense + Account::getAccountBalanceAtDate($account, $from, $to, $date, $period); ?>
        </tr>
        @endif
        @endforeach
        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Total Expense</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_expense)}}</strong></td>
          
          

        </tr>

        </tr>


        <tr>
        <td><br></td>
        </tr>

        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Net Ordinary Income</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_income - $total_cogs-$total_expense)}}</strong></td>
          
          

        </tr>

        <tr>
        <td><br></td>
        </tr>

        <tr>
          <td style="border-bottom:1px solid black;"><strong>Other Income/Expense</strong></td>
          <td style="border-bottom:1px solid black;"></td>
          
            <?php 
            $total_other_income =0;  
            $total_other_expense = 0;
             ?>

        </tr>
  
        
        @foreach($accounts as $account)
        @if($account->category == 'INCOME' && $account->income_category == 'other')
        <tr>

          <td style="border-bottom:0.5px solid gray;">{{ $account->name}}</td>
          <td style="border-bottom:0.5px solid gray;">{{asMoney(Account::getAccountBalanceAtDate($account, $from, $to, $date, $period))}}</td>
        
          <?php $total_other_income = $total_other_income + Account::getAccountBalanceAtDate($account, $from, $to, $date, $period); ?>
        </tr>
        @endif
        @endforeach
        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Total Other Income</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_other_income)}}</strong></td>
          
          

        </tr>

        @foreach($accounts as $account)
        @if($account->category == 'EXPENSE' && $account->expense_category == 'Other')
        <tr>

          <td style="border-bottom:0.5px solid gray;">{{ $account->name}}</td>
          <td style="border-bottom:0.5px solid gray;">{{asMoney(Account::getAccountBalanceAtDate($account, $from, $to, $date, $period))}}</td>
        
          <?php $total_other_expense = $total_other_expense + Account::getAccountBalanceAtDate($account, $from, $to, $date, $period); ?>
        </tr>
        @endif
        @endforeach
        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Total Other Expense</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_other_expense)}}</strong></td>
          
          

        </tr>


        </tr>
        
        <tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Net Other Income</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney($total_other_income - $total_other_expense)}}</strong></td>
          
          

        </tr>

<tr>
<td><br></td>
</tr>

<tr>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>Net Income</strong></td>
          <td style="border-top:1px solid black; border-bottom:1px solid black;"><strong>{{asMoney(($total_income - $total_cogs-$total_expense)+($total_other_income - $total_other_expense))}}</strong></td>
          
          

        </tr>


       


       


      </table>















    
   </div>








 </body>
 </html>