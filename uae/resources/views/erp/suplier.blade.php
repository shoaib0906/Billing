
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
          <h4 class="modal-title">Branch Update</h4>
        </div>
        <div class="modal-body">
          <div class="row-fluid">
            <div class="">
                <div class="">
                     

                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/update_supplier')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      
                      <div class="control-group">
                        <label class="control-label">Supplier Name</label>
                        <div class="controls">
                         <input type="hidden" placeholder="" name="id" id="id">
                          <input type="text" placeholder="Enter Supplier Name" name="SupSupplierName" id="SupSupplierName" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Compnay</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Company name" name="SupCompanyName" id="SupCompanyName" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Address" name="SupAddress" id="SupAddress" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Email" name="SupEmail" id="SupEmail"  class="span11 tip" required>
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label">Zone Name</label>
                        <div class="controls">
                          
                          <select name="ZonZoneName" id="ZonZoneID"  class="span11 tip">
                            @foreach($zone1 as $zone1)
                            <option value="{{$zone1->ZonZoneID}}">{{$zone1->ZonZoneName}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label">Business Mobile No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Mobile" name="SupBusinessMobile" id="SupBusinessMobile" class="span11 tip" required>
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
<div id="myModal" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Create New Supplier</h3>
              </div>
              <div class="modal-body">
                <div class="" >
    
   
            <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/post_supplier')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      
                      <div class="control-group">
                        <label class="control-label">Supplier Name</label>
                        <div class="controls">
                         <input type="hidden" placeholder="" name="id" id="id">
                          <input type="text" placeholder="Enter Supplier Name" name="SupSupplierName"  class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Compnay</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Company name" name="SupCompanyName" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Address" name="SupAddress"  class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Email" name="SupEmail"   class="span11 tip" required>
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label">Zone Name</label>
                        <div class="controls">
                          
                          <select name="ZonZoneName"   class="span11 tip">
                            @foreach($zone as $zone)
                            <option value="{{$zone1->ZonZoneID}}">{{$zone1->ZonZoneName}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                       <div class="control-group">
                        <label class="control-label">Business Mobile No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Mobile" name="SupBusinessMobile"  class="span11 tip" required>
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
        <a href="{{'/supplier'}}" class="current"> Supplier</a>
        <button  class="pull-right" href="#myModal" data-toggle="modal" class="btn btn-success">Create Supplier</button>
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
                  <th>Buyer Name</th>
                 <th>Company</th>
                 <th>Address</th>
                 <th>Zone</th>
                 <th>Email</th>
                  <th>Bussiness Mobile</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $sl=0; ?>
                 @foreach($supplier as $supplier)
    

 
                <tr class="gradeU">
                <td class="taskOptions"><?php echo $sl=$sl+1; ?></td>
                <td class="taskOptions">{{$supplier->id}}</td>
                  <td class="taskOptions">{{$supplier->SupSupplierName}}</td>
                  <td class="taskOptions">{{$supplier->SupCompanyName}}</td>
                  <td class="taskOptions">{{$supplier->SupAddress}}</td>
                  <td class="taskOptions">{{$supplier->ZonZoneName}}</td>
                  <td class="taskOptions">{{$supplier->SupEmail}}</td>
                  <td class="taskOptions">{{$supplier->SupBusinessMobile}}</td>
                    
                    <td class="taskOptions">
                   <button type="button" id="{{$supplier->id}}" class="edit_product" data-toggle="modal" data-target="#branch_edit"
                              data-SupSupplierName="{{$supplier->SupSupplierName}}" 
                               data-SupCompanyName="{{$supplier->SupCompanyName}}" 
                              data-ZonZoneID="{{$supplier->ZonZoneID}}" 
                                  data-SupAddress="{{$supplier->SupAddress}}"
                                    data-ZonZoneName="{{$supplier->ZonZoneName}}"
                                      data-SupEmail="{{$supplier->SupEmail}}"
                                        data-SupBusinessMobile="{{$supplier->SupBusinessMobile}}"

                              
                             
                              ><i class="icon-edit"></i></button>

                    <a href="{{url("delete-branch/$supplier->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


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
