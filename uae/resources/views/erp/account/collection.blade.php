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
<title>Collection</title>
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

<div id="content">
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-file"></i>Account</a>
        <a href="{{'/collection'}}" class="current"> Collection</a>
       
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
            <h5><code>Collection</code></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{url('/post_collection')}}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="control-group">
                <label class="control-label"> Collection No</label>
                <div class="controls">
                @if(!empty($collection_no))
                  <input type="text" class="span11" value="{{$collection_no}}" name="collection_no" readonly />
                @else
                  <input type="text" class="span11" value="" name="collection_no"/>
                @endif

                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Bill No</label>
                <div class="controls">
                  <select name="bill_id" id="bill_id">
                 
                  <option>Select Bill No</option>
                    @foreach($sales_master as $sales_master)
                  <option value="{{$sales_master->id}}"> {{$sales_master->order_no}} </option>
                   @endforeach
                  </select>
                </div>
              </div>
               
             <div class="control-group">
                <label class="control-label">Amount(Collected)</label>
                <div class="controls">
                  <div class="input-append ">
                    
                  <input type="text"   name="collected_amount" placeholder="Enter Collected Amount" class="span12">
                    <span class="add-on">&nbsp ৳ &nbsp</span> </div>
                    <span class="help-block" id="bill_det"></span> 
                    
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Collection date</label>
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
      @if(!empty($collection))
       <div class="span8">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><code>Collection List</code></h5>
          </div>
          <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th> SL #</th>
                  <th> Product Code</th>
                 
                 <th>Purchase Date</th>
                  <th>Cost Price</th>
                 <th>Quantity</th>
                
                  <th>Sub Total</th>
                 <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $sl=0; $total_amount=0;?>
                
                 @foreach($collection as $collection)

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$collection->collection_no}}</td>
                  
                  <td class="taskOptions">{{date('d-M-y', strtotime($collection->date))}}</td>
                  <td class="taskOptions">{{$collection->collected_amount}}</td>
                  <td class="taskOptions">{{$collection->entry_username}}</td>
                  <td class="taskOptions">{{($collection->branch_name) }}
                   <?php $total_amount = $total_amount+$collection->collected_amount ?>
                     
                   </td>
                
                    <td class="taskOptions">
                   

                    <a href="{{url("collection-view/$collection->id") }}" ><i class="icon-fullscreen"></i></a>


                    </td>
                </tr>


                 @endforeach

              </tbody>
            </table>
            <form action="{{url('/generate_invoice')}}" method="post" class="form-horizontal pull-right" style="padding:10px;">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                 
                  <div class="col-md-6" ng-controller="TodoCtrl">
                                          
                                          <div class="control-group">
                                            <label class="control-label">Total Collection(today)</label>
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
                                              <button class="pull-right btn-success"  href="{{url('/generate_bill')}}"  class="btn btn-success">Generate Receipt</button>
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

   $( "#bill_id").change(function() {
            $bill_id = $(this).find(":selected").val();
            //alert($bill_id);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});                    
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#bill_det').empty();
            $.ajax({
                url: 'get_bill_det/'.concat($bill_id),
                type: 'get',
                contentType: 'application/json',
                data: {_token: CSRF_TOKEN},
                //dataType: 'JSON',
                success: function (data) {
                  
                        $('#bill_det').append('Net:'.concat(data[0].net_amout).concat(' Paid: ').concat(data[0].paid_amount+data[0].collected_amout).concat(' Outstanding: ').concat(data[0].net_amout - (data[0].paid_amount+data[0].collected_amout)));
                      
                    
                }
            });
        });
</script>
</html>
