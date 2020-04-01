
@include('erp.layout.head')

    
<body>
@include('erp.layout.sidebar')
<!--Header-part-->



<div id="content">
  
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-cog"></i>Sales</a>
        <a href="{{'/sales_list'}}" class="current"> List</a>
        
      </div>
               
      </div>
      <div class="">
      @include('erp.layout.notify')  
      <div class="">
        <div class="">
          
          <div class="widget-box" style="">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>Sales List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Bill No</th>
                 <th>Supplier </th>
                 <th>Vat(%)</th>
                 <th>Less</th>
                 <th>Net Amount</th>
                 <th>Paid Amount</th>
                 <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                 @foreach($sales_list as $sales_list)
    

 
                <tr class="gradeU">
                <td class="taskOptions">{{$sales_list->id}}</td>
                  <td class="taskOptions">{{$sales_list->order_no}}</td>
                  <td class="taskOptions">{{$sales_list->BuyBuyerName}}</td>
                  <td class="taskOptions">{{$sales_list->vat}}</td>
                  <td class="taskOptions">{{$sales_list->less}}</td>
                  <td class="taskOptions">{{$sales_list->net_amout}}</td>
                  <td class="taskOptions">{{$sales_list->paid_amount}}</td>
                  <td class="taskOptions">
                  @if($sales_list->paid_amount == $sales_list->net_amout )
                  <button class="btn-success btn-mini">Paid</button>
                  @else
                  <button class="btn-danger btn-mini">Pending</button>
                  @endif
                  </td>
                    
                    <td class="taskOptions">
                  

                    <a href="{{url("view_bill/$sales_list->order_no") }}" ><i class="icon-eye-open"></i></a>


                    </td>
                </tr>


                 @endforeach

              </tbody>
            </table>
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
