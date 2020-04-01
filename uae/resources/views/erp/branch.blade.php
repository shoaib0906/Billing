
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
                    <form class="form-horizontal" method="post" action="{{url('/update_branch')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      
                      <div class="control-group">
                        <label class="control-label">Branch Name</label>
                        <div class="controls">
                         <input type="hidden" placeholder="" name="id" id="id">
                          <input type="text" placeholder="Enter Branch Name" name="branch_Name" id="branch_Name" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Branch Address</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Branch Address" name="address" id="address" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Contact No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Contact No" name="contact_no" id="contact_no" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Email" name="email" id="email" class="span11 tip" required>
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
                <h3>Create New Branch</h3>
              </div>
              <div class="modal-body">
                <div class="" >
    
   
            <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/post_branch')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      
                      <div class="control-group">
                        <label class="control-label">Branch Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Branch Name" name="branch_Name" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Branch Address</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Branch Address" name="address" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Contact No</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Contact No" name="contact_no" class="span11 tip" required>
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
        <a href="{{'/group'}}" class="current"> Zone</a>
        <button  class="pull-right" href="#myModal" data-toggle="modal" class="btn btn-success">Create Branch</button>
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
                  <th> ID</th>
                  <th>Branch Name</th>
                 <th>Address</th>
                 <th>Contact No</th>
                 <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                 @foreach($group as $group)
    

 
                <tr class="gradeU">
                <td class="taskOptions">{{$group->id}}</td>
                  <td class="taskOptions">{{$group->BranchName}}</td>
                  <td class="taskOptions">{{$group->address}}</td>
                  <td class="taskOptions">{{$group->contact_no}}</td>
                  <td class="taskOptions">{{$group->email}}</td>
                  
                  
                    
                    <td class="taskOptions">
                   <button type="button" id="{{$group->id}}" class="edit_product" data-toggle="modal" data-target="#branch_edit"
                              data-BranchName="{{$group->BranchName}}" 
                              data-address="{{$group->address}}" 
                              data-contactno="{{$group->contact_no}}" 
                              data-email="{{$group->email}}" 
                             
                              ><i class="icon-edit"></i></button>

                    <a href="{{url("delete-branch/$group->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


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
