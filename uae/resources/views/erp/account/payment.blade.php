<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/colorpicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-media.css')}}" class="skin-color" />
<link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">
<title>Payment</title>
<style type="text/css">
  #sidebar {
    width: 100%;
    background: #49cced;
    position: absolute;
    clear: both;
    top: 0px;
}
#sidebar > ul > li {
    list-style-type: none;
    float: left;
    display: block;
    margin: 0px;
    border-right: 1px solid #41bedd;
    position: relative;
    padding: 10px 7px;
    cursor: pointer;
}
body {
    margin: 0;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 0px;
    color: #333;
    background-color: #fff;

}

.widget-content{
  background-color:white;
}.widget-title{
  background-color:#2A8FB9;
  color:white;
  font-weight: 12px;
  font-style: bold;
}
</style>

</head>
 
<body>
@include('erp.layout.sidebar')
<!--Header-part-->

<div id="content" ng-app>
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-file"></i>Account</a>
        <a href="{{'/payment'}}" class="current"> Payment</a>
       
      </div>
               
      </div>
  </div>
      <div class="row-fluid">
      @include('erp.layout.notify')  
      <div class="">
        <div class="">
          
          <div class="">
          
          <div class="widget-content nopadding">
          <div class="row-fluid">
     
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><code>Payment</code></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{url('/post_payment')}}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="control-group">
                <label class="control-label"> Payment NO</label>
                <div class="controls">
                @if(!empty($payment_no))
                  <input type="text" class="span11" value="{{$payment_no}}" name="payment_no"  readonly />
                @else
                  <input type="text" class="span11" value="" name="payment_no"  />
                @endif

                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Bill No</label>
                <div class="controls">
                  <select name="invoice_id" id="invoice_id" >
                   <option>Select Invoice No</option>
                   @foreach($purchased_master as $purchased_master)
                  <option value="{{$purchased_master->id}}"> {{$purchased_master->sup_invoice_no}} </option>
                   @endforeach
                  </select>
                </div>
              </div>
               
             <div class="control-group">
                <label class="control-label">Payment Amount</label>
                <div class="controls">
                  <div class="input-append">
                    
                  <input type="text"   name="payment_amount" placeholder="Enter Payment Amount" class="span12">
                    <span class="add-on">&nbsp ৳ &nbsp</span> </div>
                     <span class="help-block" id="invoice_det"></span> 
                    
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Collected date</label>
                <div class="controls">
                  <input type="text"  name="date"   value="<?php echo date('m/d/Y');?>" class="datepicker span11" readonly>
                  <span class="help-block">Date with Formate of  (dd-mm-yy)</span> </div>
              </div>
              
              
              <div class="control-group">
                <label class="control-label">Remarks</label>
                <div class="controls">
                  <input type="text" class="span11" name="remarks" placeholder="" />
                </div>
              </div>

              <div class="control-group">
                <button type="submit" class="pull-right btn-success btn-mini ">&nbsp Save &nbsp</button><br>
              </div>
            </form>
          </div>
        </div>
      </div>
      @if(!empty($payment))
       <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><code>Product List</code></h5>
          </div>
          <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th> SL #</th>
                  <th> Payment Code</th>
                 
                 <th>Transaction Date</th>
                  <th>Amount</th>
                 <th>Branch Name</th>
                
                  <th>Officer</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php $sl=0; $total_amount=0;?>
                
                 @foreach($payment as $payment)

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$payment->payment_no}}</td>
                  
                  <td class="taskOptions">{{date('d-M-y', strtotime($payment->date))}}</td>
                  <td class="taskOptions">{{$payment->payment_amount}}</td>
                  <td class="taskOptions">{{$payment->branch_name}}</td>
                  <td class="taskOptions">{{$payment->entry_username }}
                   <?php $total_amount = $total_amount+$payment->payment_amount; ?>
                     
                   </td>
                
                    <!--<td class="taskOptions">
                   

                    <a href="{{url("delete-purchase/$payment->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


                    </td>-->
                </tr>


                 @endforeach

              </tbody>
            </table>
            <form action="{{url('/generate_invoice')}}" method="post" class="form-horizontal pull-right" style="padding:10px;">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                 
                  <div class="col-md-6" ng-controller="TodoCtrl">
                                          
                                          <div class="control-group">
                                            <label class="control-label">Total Amount</label>
                                            <div class="controls">
                                              
                                              <input type="text" disabled="disabled" class="form-control input-sm"   name="total_amount" 
                                                id="total_amount"  id="total_amount" value=<?php echo ($total_amount); ?>  required>
                                                <input type="hidden"  name="total_amount" 
                                                id="total_amount"  id="total_amount" value=<?php echo ($total_amount); ?>  >
                                            </div>
                                          </div>
                                         
                                         
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                              <!--<button class="pull-right btn-success"  href="{{url('/generate_bill')}}"  class="btn btn-success">Generate Bill</button>-->
                                            </div>
                                          </div>
                                        
                                          
                                            
                                        
                                    </div>
                   
                </form>
          </div>
        </div>
      </div>
      @endif
    </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>


  
</div>
@include('erp.layout.footer')





</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script src="{{asset('public/maruti/js/jquery.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('public/maruti/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/bootstrap-colorpicker.js')}}"></script> 
<script src="{{asset('public/maruti/js/bootstrap-datepicker.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.uniform.js')}}"></script> 
<script src="{{asset('public/maruti/js/select2.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.form_common.js')}}"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.2/angular.min.js"></script>

 <script type="text/javascript">
  $("#notifications").fadeTo(2000, 500).slideUp(500, function(){
    $("#notifications").slideUp(500);
});
    $( "#invoice_id").change(function() {
            $invoice_id = $(this).find(":selected").val();
           //alert($invoice_id);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});                    
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#invoice_det').empty();
            $.ajax({
                url: 'get_invoice_det/'.concat($invoice_id),
                type: 'get',
                contentType: 'application/json',
                data: {_token: CSRF_TOKEN},
                //dataType: 'JSON',
                success: function (data) {
                  
                        $('#invoice_det').append('Net:'.concat(data[0].net_amout).concat(' Paid: ').concat(data[0].paid_amount+data[0].payment_made).concat(' Outstanding: ').concat(data[0].net_amout - (data[0].paid_amount+data[0].payment_made)));                     
                }
            });
        });
</script>

</html>
