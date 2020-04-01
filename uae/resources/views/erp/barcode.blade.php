
@include('erp.layout.head')
<link rel="stylesheet" href="{{asset('public/maruti/css/select2.css')}}" />
    
<body>
@include('erp.layout.sidebar')
<!--Header-part-->



<div id="content">
  
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-cog"></i>Barcode</a>
        <a href="{{'/print_barcode'}}" class="current"> List</a>
        
      </div>
               
      </div>
      <div class="">
      @include('erp.layout.notify')  
      <div class="">
        <div class="">
          
          <div class="widget-box" style="">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Barcode of Product's</h5>
          </div>
          <div class="widget-content nopadding">
            
                <form action="{{url('/post_print_barcode')}}" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  
                  
                   <div class="control-group">
                    
                    <div class="controls span3" >
                      <select name="product_code" >
                        <option value="1">Select All</option>
                       @foreach($product1 as $product1)
                        <option value="{{$product1->PdtProductCode}}">{{$product1->PdtProductCode}}</option>
                        @endforeach
                      </select>
                      
                    </div>

                   
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-success">Show</button>
                    <button type="reset" class="btn btn-primary">Reset</button>                
                    <button type="cancel" class="btn btn-danger">Cancel</button>
                  </div>
                  </form>
              
            <div class="">
             @foreach($product as $product)
             <div class="span2">
              <div class="">
                <div class="" style="height:80px;background-color:white;"> 
                  <img style="BORDER-LEFT: black 0.02in solid; DISPLAY: inline-block; HEIGHT: 50px" src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->PdtProductCode, 'C39E')}}" alt="barcode" />
                 
                  <div class="widget-content">
                     <center><strong>{{$product->PdtProductCode}}</strong></center>
                  </div>
                </div>
              </div>
             
              </div>  
              @endforeach
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
      var BranchName = $(this).attr("data-BranchName");
      var address = $(this).attr("data-address");
      var contactno = $(this).attr("data-contactno");
      var email = $(this).attr("data-email");
    //alert(BranchName);

    $("#branch_edit #id").val( id );        
    $("#branch_edit #branch_Name").val( BranchName );
    $("#branch_edit #address").val( address );
    $("#branch_edit #contact_no").val( contactno );
    $("#branch_edit #email").val( email );
    
      //alert(id);
     // window.location.href='product_edit/'.concat(id);
  });
    </script>
    <script  type="text/javascript">
       function printDiv(printablediv) {

       var printContents = document.getElementById(divName).innerHTML;
       w=window.open();
       w.document.write(printContents);
       w.print();
       w.close();
      }
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
