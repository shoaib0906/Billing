
@include('erp.layout.head')

    
<body>
@include('erp.layout.sidebar')
<!--Header-part-->
<div class="modal fade" id="branch_edit" role="dialog">
   
 <div class="modal-dialog">
    
      <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header" style="background-color:#34495e;color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Buyer Update</h4>
        </div>
        <div class="modal-body">
          <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/update_buyer')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                      <div class="control-group">
                        <label class="control-label">Buyer Name</label>
                        <div class="controls">
                         <input type="hidden" placeholder="" name="id" id="id">
                          <input type="text" placeholder="Enter Buyer Name" name="BuyBuyerName" id="BuyBuyerName" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Buyer Company Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Company Name" name="BuyCompanyName" id="BuyCompanyName"  class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Contact No" name="BuyAddress" id="BuyAddress" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Email" name="BuyEmail" id="BuyEmail"  class="span11 tip" required>
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label">Zone Name</label>
                        <div class="controls">
                          
                          <select name="ZonZoneName" id="ZonZoneName"  class="span11 tip">
                            @foreach($zone1 as $zone1)
                            <option value="{{$zone1->ZonZoneID}}">{{$zone1->ZonZoneName}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Attention one</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Attention One name" name="BuyContactPerson" id="BuyContactPerson"  class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Designation</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Buy Designation" name="BuyDesignation" id="BuyDesignation"  class="span11 tip" required>
                        </div>
                      </div>
                              
                       <div class="control-group">
                        <label class="control-label">Business Mobile No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Contact No" name="BuyBusinessMobile" id="BuyBusinessMobile" class="span11 tip" required>
                        </div>
                      </div>
                     <div class="modal-footer"><br/>
                      <button type="submit" class="btn btn-success ">Update</button>
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
<div id="myModal" class="modal hide"  role="dialog">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Create New Buyer</h3>
              </div>
              <div class="modal-body">
                <div class="" >
    
   
            <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/post_supplier')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <br>
                      
                      <div class="control-group">
                        <label class="control-label">Company Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Buyer Address" name="company_name" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Buyer Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Buyer Name" name="buyer_Name" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Contact No" name="address" class="span11 tip" required>
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label">Attention one</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Attention One name" name="BuyContactPerson"  class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Designation</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Buy Designation" name="BuyDesignation"  class="span11 tip" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Business Mobile No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Contact No" name="bussiness_mob_no" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Zone</label>
                        <div class="controls">

                          <select name="zoneid">
                            @foreach($zone as $zone)
                            <option value="{{$zone->ZonZoneID}}">{{$zone->ZonZoneName}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Email" name="email" class="span11 tip" required>
                        </div>
                      </div>
                     
                      <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button data-dismiss="modal" class="close" type="button">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
  </div>
</div>


<div id="content">
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-cog"></i>Set-up</a>
        <a href="{{'/buyer'}}" class="current"> Buyer</a>
        <button  class="pull-right" href="#myModal" data-toggle="modal" class="btn btn-success">Create Buyer</button>
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
            <h5>Product Group List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th> SL #</th>
                  <th> ID</th>
                  <th class="left">Buyer Name</th>
                 
                 <th class="left text-left">Address</th>
                 <th>Zone</th>
                 <th>Email</th>
                 <th>Contact Person</th>
                  <th>Bussiness Mobile</th>
                  <th width="100px">Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php $sl=0; ?>
                 @foreach($buyer as $buyer)
    

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$buyer->id}}</td>
                  <td class="left" width="1000px">{{$buyer->BuyBuyerName}}</td>
                  
                  <td class="left">{{$buyer->BuyAddress}}</td>
                  <td class="taskOptions">{{$buyer->ZonZoneName}}</td>
                  <td class="taskOptions">{{$buyer->BuyEmail}}</td>
                  <td class="taskOptions">{{$buyer->BuyContactPerson}}</td>
                  <td class="">{{$buyer->BuyBusinessMobile}}</td>
                  
                  
                  
                    
                    <td class="taskOptions" width="150px">
                   <a  id="{{$buyer->id}}" class="edit_product" data-toggle="modal" data-target="#branch_edit"
                              data-BuyBuyerName="{{$buyer->BuyBuyerName}}" 
                               data-BuyCompanyName="{{$buyer->BuyCompanyName}}" 
                                data-BuyAddress="{{$buyer->BuyAddress}}" 
                                 data-ZonZoneName="{{$buyer->ZonZoneID}}" 
                                  data-BuyEmail="{{$buyer->BuyEmail}}" 
                                  data-BuyBusinessMobile="{{$buyer->BuyBusinessMobile}}" 
                                  data-BuyDesignation="{{$buyer->BuyDesignation}}" 
                                  data-BuyContactPerson="{{$buyer->BuyContactPerson}}" 
                            
                             
                              ><i class="icon-edit"></i></a>

                             <a href="{{url("add-attention/$buyer->id") }}" ><i class="icon-plus"></i></a>

                    <a href="{{url("delete-buyer/$buyer->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


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
      var BuyBuyerName = $(this).attr("data-BuyBuyerName");
      var BuyCompanyName = $(this).attr("data-BuyCompanyName");
      var BuyAddress = $(this).attr("data-BuyAddress");
      var BuyEmail = $(this).attr("data-BuyEmail");
      var ZonZoneName = $(this).attr("data-ZonZoneName");
      var BuyBusinessMobile = $(this).attr("data-BuyBusinessMobile");
var BuyDesignation = $(this).attr("data-BuyDesignation");
var BuyContactPerson = $(this).attr("data-BuyContactPerson");
      

    //alert(BranchName);

    $("#branch_edit #id").val( id );  
    //alert(BuyBuyerName)      ;
    $("#branch_edit #BuyBuyerName").val( BuyBuyerName );
    $("#branch_edit #BuyCompanyName").val( BuyCompanyName );
    $("#branch_edit #BuyAddress").val( BuyAddress );
    $("#branch_edit #BuyEmail").val( BuyEmail );
    $("#branch_edit #ZonZoneName").val( ZonZoneName );
    $("#branch_edit #BuyBusinessMobile").val( BuyBusinessMobile );

        $("#branch_edit #BuyContactPerson").val( BuyContactPerson );
    $("#branch_edit #BuyDesignation").val( BuyDesignation );
    
    
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
