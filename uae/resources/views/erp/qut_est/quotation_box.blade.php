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
<title>Quotation</title>
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
.row-fluid:after {
    clear: initial;
}
body {
    margin: 0;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 0px;
    color: #333;
    background-color: white;

}
.form-horizontal .control-group {
    border-top: 0px solid #ffffff;
    border-bottom: 0px solid #eeeeee;
    margin-bottom: 0;
}
.widget-box{
    padding-top: 0px;
    margin: 0px;
}
.widget-content{
  background-color:white;
}.widget-title{
  background-color:;
  color:white;
  font-weight: 12px;
  font-style: bold;
}
</style>

</head>
 
<body >
@include('erp.layout.sidebar')
<!--Header-part-->

<div id="content" ng-app>
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-file"></i>Quotation</a>
        <a href="#" class="current">Make</a>
        
      </div>
               
      </div>
  </div>
      <div class="row-fluid">
      @include('erp.layout.notify')  
      <div class="">
        <div class="">
          
          <div class="">
          
          <div class="widget-content nopadding">
          <div class="">
     
      <div class="span4">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5> <code>Quotation {{$order_no}}</code></h5>
          </div>
          <div class="widget-content ">
            <form action="{{url('/add_to_quatation')}}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              
               <div class="control-group">
                <label class="control-label">Quotation No</label>
                <div class="controls">
                @if(!empty($order_no))
                  <input type="text" class="span12" value="{{$order_no}}" name="sup_invoice_no" placeholder="Enter Supplier Invoice No" readonly/>
                @else
                  <input type="text" class="span12" value="" name="sup_invoice_no" placeholder="Enter Supplier Invoice No" readonly />
                @endif

                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <select name="product_id">
                    <option value="0" selected="selected"> Select Product</option>
                    @foreach($product_det as $product_det)
                    <option value="{{$product_det->id}}">{{$product_det->product_code}}</option>
                    @endforeach
                    
                  </select>
                 
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Quantity</label>
                <div class="controls">
                  <div class="input-append">
                    
                  <input type="text"  name="quantity" id="quantity"  class="span11">
                    <span class="add-on"> ৳ </span> </div>
                </div>
              </div>
              <div class="control-group">
                <button type="submit" class="pull-right btn btn-success btn-mini">Add Product</button>

              </div>
            </form>

          </div>
 
            </form>

          </div>
        </div>
      </div>
      @if(!empty($estimate))
       <div class="span8 pull-right">
        <div class="">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><code>Product List</code></h5>
          </div>
          <div class="widget-content nopadding" >
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
                
                 @foreach($estimate as $sales)

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$sales->product_code}}</td>
                  
                  <td class="taskOptions">{{date('d-M-Y',strtotime($sales->sales_date))}}</td>
                  <td class="taskOptions">{{$sales->sales_price}}</td>
                  <td class="taskOptions">{{$sales->quantity}}</td>
                  <td class="taskOptions">{{number_format($sales->sales_price*$sales->quantity,2) }}
                  <?php $total_amount = $total_amount+$sales->sales_price * $sales->quantity ?></td>
                
                    <td class="taskOptions">
                   

                    <a href="{{url("delete-quatation/$sales->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


                    </td>
                </tr>


                 @endforeach
                 
                 
              </tbody>

            </table>
            </div>
           <br>
             <div class="widget-content nopadding">
            
            <form action="{{url('/generate_quatation')}}" method="post" class="form-horizontal pull-center" 
            style="padding-top:5px;">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" class="span11" value="{{$order_no1}}" name="order_no" placeholder="Enter Supplier Invoice No" />
                   <div class="row-fluid">
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-th-list"></i>
                </span>
                <h5>  <code>Customer Address</code></h5>
              </div>
              
              <div class="widget-content ">
              <div class="control-group">
                <label class="control-label">Select Customer Address </label>
                <div class="controls ">
                  <select name="buyer_id" id="buyer_id"  class="span12" required>
                      <option selected="selected">Select Customer Address</option>
                      @foreach($buyer as $buyer)
                        <option value="{{$buyer->id}}">{{$buyer->BuyBuyerName}}</option>
                      @endforeach
                      </select>
                   </div>
              </div>

              <div class="control-group">
                <label class="control-label">Attention</label>
                <div class="controls">
                   <select name="name1" id="name1" class="span12" required>
                     
                   </select>
                  </div>
                 
              </div>
              
               
          </div>
            </div><hr>
            <!--<div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-th-list"></i>
                </span>
                <h5>  <code>Shipping Address</code></h5>
              </div>
              
              <div class="widget-content ">
             
              <div class="control-group">
                <label class="control-label">Select Shipping Address </label>
                <div class="controls">
                  <select name="shipping_id" id="shipping_id"  class="span12" required>
                      <option  selected="selected">Select Shipping Address</option>
                      @foreach($buyer1 as $buyer1)
                        <option value="{{$buyer1->id}}">{{$buyer1->BuyBuyerName}}</option>
                      @endforeach
                      </select>
                   </div>
              </div>

              <div class="control-group">
                <label class="control-label">Attention</label>
                <div class="controls">
                   <select name="shipping_name" class="span12" id="shipping_name1" required>
                     
                   </select>
                  </div>
                  
              </div>
              
               
          </div>
            </div>-->
          </div>
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title">
                <span class="icon">
                  <i class="icon-th-list"></i>
                </span>
                <h5> <code>Bill Information</code></h5>
              </div>
              <div class="widget-content">
                <div class="col-md-6" ng-controller="TodoCtrl">
                                          
                                          <div class="control-group">
                                            <label class="control-label">Total Amount</label>
                                            <div class="controls">
                                              
                                              <input type="text" disabled="disabled" class="form-control input-sm span11"   name="total_amount" 
                                                id="total_amount"  id="total_amount" value=<?php echo ($total_amount); ?>  required>
                                                <input type="hidden"  name="total_amount" 
                                                id="total_amount"  id="total_amount" value=<?php echo ($total_amount); ?>  >
                                            </div>
                                          </div>
                                           
                                          <div class="control-group">
                                            <label class="control-label">Total Less</label>
                                            <div class="controls">
                                              
                                             <input type="text" ng-model="less" class="form-control input-sm span8" name="less" id="less"  required>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">VAT(%)</label>
                                            <div class="controls">
                                              
                                              <input type="text" ng-model="vat" class="form-control input-sm span7" name="vat" id="vat" required>
                                            </div>
                                          </div>
                                          
                                          <div class="control-group">
                                            <label class="control-label">Net Amount</label>
                                            <div class="controls">
                                              <input type="text" class="form-control input-sm span7" value="@{{total()}}" id="total" name="net_amout" disabled="disabled" required>
                                                <input type="hidden" class="form-control input-sm" value="@{{total()}}" id="total"  name="net_amout"  required>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            
                                            <button class="pull-right btn-mini btn-success"  href="{{url('/generate_bill')}}"  class="btn btn-success">Generate Bill</button>
                                          </div>

                                        
                                          
                                            
                                        
                                    </div>
              </div>
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
<script type="text/javascript">
  $("#notifications").fadeTo(2000, 500).slideUp(500, function(){
    $("#notifications").slideUp(500);
});


</script>

 <script type="text/javascript">

  function TodoCtrl($scope) {
    var total_amount = $('#total_amount').val();
     //alert(total_amount);
     //$('#net_amout').val(total_amount);
     $scope.less=0;
     $scope.one=0;
     $scope.vat=0;
     
     $scope.total = total_amount;
    $scope.total = function(){
      if($scope.less==0){
        return total_amount;
      }
      else if($scope.less==0 &&$scope.vat==0)
      {
        $('#net_amout').val(total_amount);  
        $net_total = total_amount-$scope.less; 
            return $net_total;
      }
      else{
        $net_total = total_amount-$scope.less; 
            return $net_total + ($net_total  * $scope.vat/100);
      }      
    };

      
}
;
</script>

    <script type="text/javascript">
      //alert('id');
      $('.edit_product').click(function(){    
      var id=$(this).attr('id');
      var SupSupplierName = $(this).attr("data-SupSupplierName");
      var SupCompanyName = $(this).attr("data-SupCompanyName");
      var ZonZoneID = $(this).attr("data-ZonZoneID");
      var SupAddress = $(this).attr("data-SupAddress");
      
      var SupEmail = $(this).attr("data-SupEmail");
      var SupBusinessMobile = $(this).attr("data-SupBusinessMobile");
    //alert(BranchName);

    $("#branch_edit #id").val( id );        
    $("#branch_edit #SupSupplierName").val( SupSupplierName );
    $("#branch_edit #SupCompanyName").val( SupCompanyName );
    $("#branch_edit #ZonZoneID").val( ZonZoneID );
    $("#branch_edit #SupAddress").val( SupAddress );
    
    $("#branch_edit #SupEmail").val( SupEmail );
    $("#branch_edit #SupBusinessMobile").val( SupBusinessMobile );
    
      //alert(id);
     // window.location.href='product_edit/'.concat(id);
  });
    </script>

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
     $( "#buyer_id").change(function() {
            $caterory_in = $(this).find(":selected").val();
          // alert($caterory_in);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});                    
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#name1').empty().change();
            $.ajax({
                url: 'get_buyer_details/'.concat($caterory_in),
                type: 'get',
                contentType: 'application/json',
                data: {_token: CSRF_TOKEN},
                //dataType: 'JSON',
                success: function (data) {
                  
                    //$('#category_product_code').append("<option value="+data+">"+data+"</option>");
                    //$('#category_product_code').html(data);
                    /*$('#billing_address').val(data[0].BuyAddress);
                    $('#shipping_address').val(data[0].BuyAddress);*/
                    if($.isEmptyObject(data[0].BuyContactPerson)){
                         //alert("This Object is empty.");
                      }else{
                        $('#name1').append("<option value='"+data[0].BuyContactPerson+"'>"+data[0].BuyContactPerson+"</option>");
                      }
                    
                    if($.isEmptyObject(data[0].name2)){
                         //alert("This Object is empty.");
                      }else{
                        $('#name1').append("<option value='"+data[0].name2+"'>"+data[0].name2+"</option>");
                      }
                      if($.isEmptyObject(data[0].name2)){
                         //alert("This Object is empty.");
                      }else{
                        $('#name1').append("<option value='"+data[0].name3+"'>"+data[0].name3+"</option>");
                      }

                    //$('#name1').val(data[0].BuyContactPerson);
                    /*$('#designation1').val(data[0].BuyDesignation);
                    $('#mobile1').val(data[0].BuyBusinessMobile);

                     $('#name2').val(data[0].name2);
                    $('#designation2').val(data[0].designation2);
                    $('#mobile2').val(data[0].mobile2);

                     $('#name3').val(data[0].name3);
                    $('#designation3').val(data[0].designation3);
                    $('#mobile3').val(data[0].mobile3);
                    */
                }
            });

            
        });
      $( "#shipping_id").change(function() {
            $caterory_in = $(this).find(":selected").val();
          // alert($caterory_in);
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});                    
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('#shipping_name1').empty().change();
            $.ajax({
                url: 'get_buyer_details/'.concat($caterory_in),
                type: 'get',
                contentType: 'application/json',
                data: {_token: CSRF_TOKEN},
                //dataType: 'JSON',
                success: function (data) {
                  
                    if($.isEmptyObject(data[0].BuyContactPerson)){
                         //alert("This Object is empty.");
                      }else{
                        $('#shipping_name1').append("<option value='"+data[0].BuyContactPerson+"'>"+data[0].BuyContactPerson+"</option>");
                      }
                    
                    if($.isEmptyObject(data[0].name2)){
                         //alert("This Object is empty.");
                      }else{
                        $('#shipping_name1').append("<option value='"+data[0].name2+"'>"+data[0].name2+"</option>");
                      }
                      if($.isEmptyObject(data[0].name2)){
                         //alert("This Object is empty.");
                      }else{
                        $('#shipping_name1').append("<option value='"+data[0].name3+"'>"+data[0].name3+"</option>");
                        
                      }
                }
            });
        });
     
</script>
</html>
