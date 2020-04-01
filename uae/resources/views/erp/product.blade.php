<!DOCTYPE html>
<html lang="en">
<head>
<title>{!! config('config.application_title') ? : config('constants.ITEM_NAME') !!}</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/fullcalendar.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-media.css')}}" class="skin-color" />
<link rel="stylesheet" href="{{asset('public/maruti/css/jquery.gritter.css')}}" />

<link rel="shortcut icon" href="{{ asset('assets/img/Rent_Home-512.png') }}">

<link rel="stylesheet" href="{{asset('public/maruti/css/uniform.css')}}" />


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
.widget-box{
    padding-top: 0px;
    margin: 0px;
}
</style>
<style type="text/css">
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
.modal {
    display: none; /* Hidden by default */
   
    z-index: 1; /* Sit on top */
   
   
    overflow: auto; /* Enable scroll if needed */
   
}
</style>
</head>
<div class="modal fade" id="branch_edit" >
   
 <div class="modal-dialog">
    
      <!-- Modal content-->
    
      <div class="modal-content">
        <div class="modal-header" style="background-color:#34495e;color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Update</h4>
        </div>
        <div class="modal-body">
          <div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{url('/update_product')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <div class="control-group">
                          <label class="control-label">Select Brand</label>
                          <div class="controls">
                            <select name="BrdBrandID" id="BrdBrandID">
                              @foreach($brand1 as $brand1)
                                      <option value="{{$brand1->BrdBrandID}}">{{$brand1->BrdBrandName}}</option>
                                      @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">Select Category</label>
                          <div class="controls">
                            <select name="CtgCategoryID" id="CtgCategoryID">
                              @foreach($category1 as $category1)
                                      <option value="{{$category1->CtgCategoryID}}">{{$category1->CtgCategoryName}}</option>
                                      @endforeach
                            </select>
                          </div>
                        </div>
                        
                        <div class="control-group">
                          <label class="control-label">Select Product Group</label>
                          <div class="controls">
                            <select name="productgroup_id" id="productgroup_id">
                              @foreach($productgroup1 as $productgroup1)
                                      <option value="{{$productgroup1->PgpGroupId}}">{{$productgroup1->PgpGroupName}}</option>
                                      @endforeach
                            </select>
                          </div>
                        </div>
                     <div class="control-group">
                        <label class="control-label">Model No</label>
                        <div class="controls">
                        <input type="hidden" name="id" id="id">
                          <input type="text" placeholder="Enter Model No" name="PdtModelNo" id="PdtModelNo" class="span5 tip" required>
                        </div>
              </div>             
              <div class="control-group">
                        <label class="control-label">Product Price</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Product Price" name="PdtPrice" id="PdtPrice" class="span5 tip" required>
                        </div>
                      </div>
              <div class="control-group">
                        <label class="control-label">Product Code</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Product Code" name="PdtProductCode" id="PdtProductCode" class="span5 tip" required>
                        </div>
                      </div>
              <div class="control-group">
                        <label class="control-label">Warrenty Days</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Warrenty Days" name="PdtWarrantyDays" id="PdtWarrantyDays" class="span5 tip" required>
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
<div id="myModal" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Create New Product</h3>
              </div>
              <div class="modal-body">
              <div class="">
        <div class="">
          
          <div class="widget-content nopadding">
           <form class="" method="post" action="{{url('/post_product')}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      
                      
              <div class="control-group">
                <label class="control-label">Select Brand</label>
                <div class="controls">
                  <select name="BrdBrandID">
                    @foreach($brand as $brand)
                            <option value="{{$brand->BrdBrandID}}">{{$brand->BrdBrandName}}</option>
                            @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Select Model</label>
                <div class="controls">
                  <select name="CtgCategoryID">
                    @foreach($category as $category)
                            <option value="{{$category->CtgCategoryID}}">{{$category->CtgCategoryName}}</option>
                            @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Select Product Group</label>
                <div class="controls">
                  <select name="productgroup_id">
                    @foreach($productgroup as $productgroup)
                            <option value="{{$productgroup->PgpGroupId}}">{{$productgroup->PgpGroupName}}</option>
                            @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                          <input type="hidden" placeholder="Enter Model No" name="PdtModelNo" class="span5 tip" required>
                        </div>
              </div>             
              <div class="control-group">
                        <label class="control-label">Product Price</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Product Price" name="PdtPrice" class="span5 tip" required>
                        </div>
                      </div>
              <div class="control-group">
                        <label class="control-label">Product Code</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Product Code" name="PdtProductCode" class="span5 tip" required>
                        </div>
                      </div>
              <div class="control-group">
                        <label class="control-label">Warrenty Days</label>
                        <div class="controls">
                          <input type="text" placeholder="Enter Warrenty Days" name="PdtWarrantyDays" class="span5 tip" required>
                        </div>
                      </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
                
  </div>
</div>

    
<body>
@include('erp.layout.sidebar')
<!--Header-part-->


<div id="content">
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-cog"></i>Set-up</a>
        <a href="{{'/product'}}" class="current"> Product</a>
        <button  class="pull-right" href="#myModal" data-toggle="modal" class="btn btn-success">Create Product</button>
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
            <h5>Product List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>SL #</th>
                  <th> ID</th>
                  <th>Grp</th>
                 <th>Brand</th>
                 <th>Category</th>
                 <th>Model</th>
                <th>Pdt Price</th>
                
                 <th> Product Code</th>
                
                  <th>PdtWarrantyDays</th>
                 <th>PdtNameDL</th>
  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $sl=0;?>
                 @foreach($group as $group)
    

 
                <tr class="gradeU">
                <td class=""><?php echo $sl=$sl+1; ?></td>
                <td class="">{{$group->id}}</td>
                  <td class="">{{$group->PgpGroupName}}</td>
                  <td class="">{{$group->brand_name}}</td>
                  <td class="">{{$group->PdtCategoryID}}</td>
                  <td class="">{{$group->PdtModelNo}}</td>
                  
                  <td class="">{{$group->PdtPrice}}</td>

                  <td class="">{{$group->PdtProductCode}}</td>
                 
                  <td class="">{{$group->PdtWarrantyDays}}</td>
                  <td class="">{{$group->PdtNameDL}}</td>
                  
                    <td class="">
                   <button type="button" id="{{$group->id}}" class="edit_product" data-toggle="modal" data-target="#branch_edit"
                              data-PgpGroupName="{{$group->PgpGroupName}}" 
                              data-brandname="{{$group->brand_name}}" 
                              data-PdtBrandID="{{$group->PdtBrandID}}" 
                              data-PdtGroupID="{{$group->PdtGroupID}}" 
                              
                              data-PdtCategoryID="{{$group->PdtCategoryID}}" 
                              data-PdtModelNo="{{$group->PdtModelNo}}"

                              data-PdtPrice="{{$group->PdtPrice}}" 
                              data-PdtProductCode="{{$group->PdtProductCode}}" 
                              data-PdtWarrantyDays="{{$group->PdtWarrantyDays}}" 
                              data-PdtNameDL="{{$group->PdtNameDL}}" 
                             
                              ><i class="icon-edit"></i></button>

                    <a href="{{url("delete-product/$group->id") }}" onclick="return confirm('Are you sure you want to delete this product?');"><i class="icon-remove"></i></a>


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

    <script type="text/javascript">
      //alert('id');
      $('.edit_product').click(function(){    
      var id=$(this).attr('id');
      var PgpGroupName = $(this).attr("data-PdtGroupID");
      var brandname = $(this).attr("data-PdtBrandID");
      var PdtCategoryID = $(this).attr("data-PdtCategoryID");
      var PdtModelNo = $(this).attr("data-PdtModelNo");

      var PdtPrice = $(this).attr("data-PdtPrice");
      var PdtProductCode = $(this).attr("data-PdtProductCode");
      var PdtWarrantyDays = $(this).attr("data-PdtWarrantyDays");
      var PdtNameDL = $(this).attr("data-PdtNameDL");
    //alert(BranchName);

    $("#branch_edit #id").val( id );        
    
    $("#branch_edit #BrdBrandID").val( brandname ).attr("selected","selected").change();
    $("#branch_edit #CtgCategoryID").val( PdtCategoryID ).attr("selected","selected").change();
    $("#branch_edit #productgroup_id").val( PgpGroupName ).attr("selected","selected").change();


    $("#branch_edit #PdtModelNo").val( PdtModelNo );
        $("#branch_edit #PdtPrice").val( PdtPrice );
    $("#branch_edit #PdtProductCode").val( PdtProductCode );
    $("#branch_edit #PdtWarrantyDays").val( PdtWarrantyDays );
    
    

      //alert(id);
     // window.location.href='product_edit/'.concat(id);
  });
    </script>
