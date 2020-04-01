<!DOCTYPE html>
<html charset="utf-8">
<head>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>


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
.modal {
    display: none; /* Hidden by default */
   
    z-index: 1; /* Sit on top */
   
   
    overflow: auto; /* Enable scroll if needed */
   
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
  background-color:#2A8FB9;
  color:white;
  font-weight: 12px;
  font-style: bold;
}
.fade .inner .item {
  opacity: 0;
  -webkit-transition-property: opacity;
  -moz-transition-property: opacity;
  -o-transition-property: opacity;
  transition-property: opacity;
}
.fade .inner .active {
  opacity: 1;
}
.fade .inner .active.left,
.fade .inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}
.fade .inner .next.left,
.fade .inner .prev.right {
  opacity: 1;
}
.fade .control {
  z-index: 2;
}
</style>

<div class="modal fade" id="branch_edit" >
   
 <div class="modal-dialog">
    
      <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header" style="background-color:#34495e;color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Quotation Product Update</h4>
        </div>
        <div class="modal-body">
          <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/quote_product_edit')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                       
                     <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="hidden"  name="id" id="id"  class="span11">
                  <input type="text"  name="product_name" id="product_name" placeholder="Enter Product Name"  />
               

                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  
                  <input type="text"  class="span11" name="product_code" id="product_code" placeholder="Enter Product Code"  >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Warrenty</label>
                <div class="controls">
                  
                  <input type="text"  class="span11" name="warrenty" id="warrenty" placeholder="Enter warrenty days" >
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product PdtDescription</label>
                <div class="controls">
                  <textarea class="span11" rows="7" name="description" id="description"></textarea>

                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product Price</label>
                <div class="controls">
                  <div class="input-append">
                    
                  <input type="text"  name="price" id="price"  class="span11">
                    <span class="add-on"> ৳ </span> </div>
                </div>
              </div>
                     <div class="modal-footer"><br/>
                      <button type="submit" class="btn btn-success ">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    
                    </form>
                  </div>
                </div>
              </div>
          </div>
            </div>

        
      </div>
      
    </div>
  </div>
</head>
 
<body >

@include('erp.layout.sidebar')

<!--Header-part-->

<div id="content">
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-file"></i>Quotation</a>
        <a href="{{'/Quatation-Setup'}}" class="current"> Setup</a>
        
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
                <div class="span7">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5> <code>Quotation Product Setup </code></h5>
          </div>
          <div class="widget-content ">
            
          </div>
           <form action="{{url('/post_quot_product')}}" method="post" class="form-horizontal">
          <div class="widget-content">
           
            <input type="hidden" name="_token" value="{{csrf_token()}}">
              
               <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                
                  <input type="text" class="span11" value="" name="product_name" placeholder="Enter Product Name" autofocus />
               

                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  
                  <input type="text"  class="span11" name="product_code" placeholder="Enter Product Code" class="span11"  required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Warrenty</label>
                <div class="controls">
                  
                  <input type="text"  class="span11" name="warrenty" placeholder="Enter warrenty days" class="span11"  required>
                </div>
              </div>
           

              <div class="control-group">
                <label class="control-label">Product PdtDescription</label>
                <div class="controls " >
                  
                  
                  <textarea name="editor1" ></textarea>
                  <script>
      CKEDITOR.replace( 'editor1' );
    </script>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product Price</label>
                <div class="controls">
                  <div class="input-append">
                    
                  <input type="text"  name="price"  class="span11">
                    <span class="add-on"> ৳ </span> </div>
                </div>
              </div>

              <div class="control-group">
                <button type="submit" class="pull-right btn btn-success btn-mini">Save</button>

              </div>
              </div>
            
              
            </form>

          </div>
        </div>

      </div>
      @if(!empty($product_quote))
       <div class="span5 pull-right">
        <div class="">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5><code>Quotatation Product List</code></h5>
          </div>
          <div class="widget-content nopadding" >
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th> SL #</th>
                  <th> Product Code</th>
                 
                 <th>Purchase Name</th>
                  <th>Cost Price</th>
                 <th>Warrenty</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
                <?php  $sl=0; ?>
                 @foreach($product_quote as $product_quote)

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$product_quote->product_code}}</td>
                  
                  <td class="taskOptions">{{$product_quote->product_name}}</td>
                  <td class="taskOptions">{{$product_quote->price}}</td>
                  <td class="taskOptions">{{$product_quote->warrenty}}</td>
               
                    <td class="taskOptions">
                     <button type="button" id="{{$product_quote->id}}" class="edit_product" data-toggle="modal" data-target="#branch_edit"
                              data-productcode="{{$product_quote->product_code}}" 
                              data-productname="{{$product_quote->product_name}}" 
                              data-description="{{$product_quote->description}}" 
                              data-price="{{$product_quote->price}}" 
                              data-warrenty="{{$product_quote->warrenty}}"
                               
                             
                              ><i class="icon-edit"></i></button>


                    <!--<a href="{{url("delete-quote_pro/$product_quote->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>-->


                    </td>
                </tr>


                 @endforeach
                 
                 
              </tbody>

            </table>
            </div>
           <br>
             
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
      //alert('id');
      $('.edit_product').click(function(){    
      var id=$(this).attr('id');
      var product_code = $(this).attr("data-productcode");
      var product_name = $(this).attr("data-productname");
      var description = $(this).attr("data-description");
      var price = $(this).attr("data-price");
      
      var warrenty = $(this).attr("data-warrenty");
      

    $("#branch_edit #id").val( id );        
    $("#branch_edit #product_code").val( product_code );
    $("#branch_edit #product_name").val( product_name );
    $("#branch_edit #description").val( description );
    $("#branch_edit #price").val( price );
    
    $("#branch_edit #warrenty").val( warrenty );
    
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



     
</html>
