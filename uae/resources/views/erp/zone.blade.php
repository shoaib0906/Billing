
@include('erp.layout.head')

    
<body>
@include('erp.layout.sidebar')
<!--Header-part-->
<div id="myModal" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Create New Zone</h3>
              </div>
              <div class="modal-body">
                <div class="" >
    
   
            <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/post_Zone')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="control-group">
                        <label class="control-label">RegRegionID</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Zone ID" name="regionid" class="span11 tip" required>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Zone Name</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Zone Name" name="Zone_Name" class="span11 tip" required>
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
        <button  class="pull-right" href="#myModal" data-toggle="modal" class="btn btn-success">Create Zone</button>
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
                  <th>Zone Name</th>
                  <th>Zone ID</th>
                 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                 @foreach($group as $group)
    

 
                <tr class="gradeU">
                <td class="taskOptions">{{$group->id}}</td>
                  <td class="taskOptions">{{$group->ZonZoneName}}</td>
                   <td class="taskOptions">{{$group->ZonZoneID}}</td>
                 
                    
                    <td class="taskOptions">
                   
                    <a href="{{url("delete-zone/$group->id") }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-remove"></i></a>


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



</body>
</html>
<script type="text/javascript">
  $("#notifications").fadeTo(2000, 500).slideUp(500, function(){
    $("#notifications").slideUp(500);
});

   
</script>
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>
