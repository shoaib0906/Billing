
@include('erp.layout.head')

    
<body>
@include('erp.layout.sidebar')


<div id="content">
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-cog"></i>Set-up</a>
        <a href="{{'/buyer'}}" class="current"> Buyer</a>
        <a href="{{'/buyer'}}" class="current"> Add Attention</a>
        
      </div>
               
      </div>
  </div>
      <div class="row-fluid">
      @include('erp.layout.notify')  
      <div class="">

        <div class="widget-box">
          
          <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>{{$buyer[0]->BuyCompanyName}} </h5>
          </div>
          <div class="widget-content nopadding">
            <div class="">
                  
                    <form class="form-horizontal" method="post" action="{{url('/post_attention')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row-fluid">
                      
                      <div class="span6">
                        <div class="widget-box">
                          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Attention Two</h5>
                          </div>
                          <div class="widget-content nopadding">
                           <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Attention 1 Name" name="name2" value="{{isset($buyer_attention[0]->name2)? $buyer_attention[0]->name2 :''}}"  class="span11 tip" required>
                         <input type="hidden" name="buyer_id" value="{{$buyer_id}}">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mobile No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Mobile no" name="mobile2" value="{{isset($buyer_attention[0]->mobile2)? $buyer_attention[0]->mobile2 :''}}" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Designation </label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Designation" name="designation2" value="{{isset($buyer_attention[0]->designation2)? $buyer_attention[0]->designation2 :''}}" class="span11 tip" required>
                        </div>
                      </div>
                          </div>
                        </div>
                      </div>
                      <div class="span6">
                        <div class="widget-box">
                          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Attention Three</h5>
                          </div>
                          <div class="widget-content nopadding">
                           <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Attention 1 Name" name="name3" value="{{isset($buyer_attention[0]->name3)? $buyer_attention[0]->name3 :''}}" class="span11 tip" required>
                         
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Mobile No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Mobile no" name="mobile3" value="{{isset($buyer_attention[0]->mobile3)? $buyer_attention[0]->mobile3 :''}}"class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Designation</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Designation" name="designation3" value="{{isset($buyer_attention[0]->designation3)? $buyer_attention[0]->designation3 :''}}" class="span11 tip" required>
                        </div>
                      </div>
                          </div>
                        </div>
                      </div>
                    </div>
                     
                      <div class="form-actions pull-right">
                        <button type="submit" class="btn btn-success">Save</button>
                        
                        <button type="reset" class="btn btn-danger">Reset</button>
                        
                      </div>
                    </form>
                  </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>


  <div class="container-fluid" style="visibility: hidden!important;">
    
   
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Site Analytics</h5>
          
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span8">
              <div class="chart"></div>
            </div>
            <div class="span4">
              
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
      var BuyBuyerName = $(this).attr("data-BuyBuyerName");
      var BuyCompanyName = $(this).attr("data-BuyCompanyName");
      var BuyAddress = $(this).attr("data-BuyAddress");
      var BuyEmail = $(this).attr("data-BuyEmail");
      var ZonZoneName = $(this).attr("data-ZonZoneName");
      var BuyBusinessMobile = $(this).attr("data-BuyBusinessMobile");
    //alert(BranchName);

    $("#branch_edit #id").val( id );  
    //alert(BuyBuyerName)      ;
    $("#branch_edit #BuyBuyerName").val( BuyBuyerName );
    $("#branch_edit #BuyCompanyName").val( BuyCompanyName );
    $("#branch_edit #BuyAddress").val( BuyAddress );
    $("#branch_edit #BuyEmail").val( BuyEmail );
    $("#branch_edit #ZonZoneName").val( ZonZoneName );
    $("#branch_edit #BuyBusinessMobile").val( BuyBusinessMobile );
    
      //alert(id);
     // window.location.href='product_edit/'.concat(id);
  });
    </script>

<script src="{{asset('public/maruti/js/excanvas.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.ui.custom.js')}}"></script> 

<script src="{{asset('public/maruti/js/jquery.flot.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.flot.resize.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.peity.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/fullcalendar.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.js')}}"></script> 



<script src="{{asset('public/maruti/js/maruti.dashboard.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.chat.js')}}"></script> 

<script src="{{asset('public/maruti/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.tables.js')}}"></script>

<!--
<script src="{{asset('public/maruti/js/maruti.chat.js')}}"></script> 




<script src="{{asset('public/maruti/js/jquery.flot.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.flot.resize.min.js')}}"></script> 

<script src="{{asset('public/maruti/js/fullcalendar.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.dashboard.js')}}"></script> 



<script src="{{asset('public/maruti/js/jquery.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.ui.custom.js')}}"></script> 
-->
<script src="{{asset('public/maruti/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.gritter.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.peity.min.js')}}"></script> 

<script src="{{asset('public/maruti/js/maruti.interface.js')}}"></script>
<script src="{{asset('public/maruti/js/maruti.popover.js')}}"></script>


</html>
