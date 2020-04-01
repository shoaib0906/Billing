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
<title>Purchase</title>
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
        <a href="#"> <i class="icon-file"></i>Inventory</a>
        <a href="{{'/product_purchase'}}" class="current"> Purchase</a>
       
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
            <h5><code>Purchase</code></h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{url('/post_purchase')}}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="control-group">
                <label class="control-label"> Invoice No</label>
                <div class="controls">
                @if(!empty($inv_no))
                  <input type="text" class="span11" value="{{$inv_no}}" name="sup_invoice_no" placeholder="Enter Supplier Invoice No" readonly />
                @else
                  <input type="text" class="span11" value="" name="sup_invoice_no" placeholder="Enter Supplier Invoice No" />
                @endif

                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Supplier Name</label>
                <div class="controls">
                  <select name="supplier_id" >
                  <option> Select Supplier </option>
                    @foreach($supplier as $supplier)
                    @if($supplier_id  == $supplier->id)
                    <option selected="selected" value="{{$supplier->id}}">{{$supplier->SupCompanyName}}</option>
                    @else

                    <option value="{{$supplier->id}}">{{$supplier->SupCompanyName}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <select name="product_code">
                    <option> Select Product Code</option>
                    @foreach($product as $product)
                    <option value="{{$product->PdtProductCode}}">{{$product->PdtProductCode}}</option>
                    @endforeach
                  </select>
                  
                </div>
              </div>
             <div class="control-group">
                <label class="control-label">Product Cost Price</label>
                <div class="controls">
                  <div class="input-append">
                    
                  <input type="text"   name="cost_price" placeholder="Enter Product Cost Price" class="span9">
                    <span class="add-on">&nbsp ৳ &nbsp</span> </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Quantity</label>
                <div class="controls">
                  <div class="input-append">
                    
                  <input type="text"   name="quantity" placeholder="Enter Product Qty" class="span9">
                    <span class="add-on">Qty</span> </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Purchase date</label>
                <div class="controls">
                  <input type="text"  name="purchase_date"   value="<?php echo date('m/d/Y');?>" class="datepicker span11">
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
      @if(!empty($purchase))
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
                
                 @foreach($purchase as $purchase)

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$purchase->product_code}}</td>
                  
                  <td class="taskOptions">{{date('d-M-y', strtotime($purchase->purchase_date))}}</td>
                  <td class="taskOptions">{{$purchase->cost_price}}</td>
                  <td class="taskOptions">{{$purchase->quantity}}</td>
                  <td class="taskOptions">{{number_format($purchase->cost_price*$purchase->quantity,2) }}
                   <?php $total_amount = $total_amount+$purchase->cost_price*$purchase->quantity; ?>
                     
                   </td>
                
                    <td class="taskOptions">
                   

                    <a href="{{url("delete-purchase/$purchase->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


                    </td>
                </tr>


                 @endforeach

              </tbody>
            </table>
            <form action="{{url('/generate_invoice')}}" method="post" class="form-horizontal pull-right" style="padding:10px;">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <input type="hidden" class="span11" value="{{$inv_no}}" name="sup_invoice_no" placeholder="Enter Supplier Invoice No" />
                  <input type="hidden" name="supplier_id" value="{{$supplier_id}}">
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
                                            <label class="control-label">Total Less</label>
                                            <div class="controls">
                                              
                                             <input type="text" ng-model="less" class="form-control input-sm" name="less" id="less"  required>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">VAT(%)</label>
                                            <div class="controls">
                                              
                                              <input type="text" ng-model="vat" class="form-control input-sm" name="vat" id="vat" required>
                                            </div>
                                          </div>
                                          
                                          <div class="control-group">
                                            <label class="control-label">Net Amount</label>
                                            <div class="controls">
                                              <input type="text" class="form-control input-sm" value="@{{total()}}" id="total" name="net_amout" disabled="disabled" required>
                                                <input type="hidden" class="form-control input-sm" value="@{{total()}}" id="total"  name="net_amout"  required>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label">Net Amount</label>
                                            <div class="controls">
                                               <input type="text" class="form-control input-sm"   name="paid_amount"  required>
                                            </div>
                                          </div>


                                        <br/>
                                        <div class="control-group">
                                            <label class="control-label"></label>
                                            <div class="controls">
                                              <button class="pull-right btn-success"  href="{{url('/generate_bill')}}"  class="btn btn-success">Generate Bill</button>
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
  $("#notifications").fadeTo(2000, 500).slideUp(500, function(){
    $("#notifications").slideUp(500);
});


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
</html>
