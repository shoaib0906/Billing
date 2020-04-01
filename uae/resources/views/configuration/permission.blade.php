<!DOCTYPE html>
<html lang="en">
<head>
<title>Maruti Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/colorpicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/datepicker.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/select2.css')}}" />
<link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap-confirm-delete.css') }}">
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-style.css')}}" />
<link rel="stylesheet" href="{{asset('public/maruti/css/maruti-media.css')}}" class="skin-color" />
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

</style>
</head>
<body>


@include('erp.layout.sidebar')
<!--close-left-menu-stats-sidebar-->
    <div class="modal fade" id="myModal" role="basic" aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

        </div>

      </div>

    </div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Configuration</a> <a href="#" class="current">Setup</a> </div>
    
  </div>

  <div class="row-fluid">
@include('erp.layout.notify')  
      
      <div class="span12">
      <div class="span2">
       <div class="widget-box">
            <ul class="nav nav-tabs nav-stacked " style="padding-right:0;">

             
              <li class="active"><a href="#permission" data-toggle="tab"><span class="fa fa-key"></span> {!! trans('messages.Permission') !!}</a></li>

              <li><a href="#mail" data-toggle="tab"><span class="fa fa-envelope"></span> {!! trans('messages.Mail') !!}</a></li>

             
            </ul>
        </div>
      </div>
      <div class="span10">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Configuration </h5>
          </div>
          <div class="widget-content nopadding">
            <div id="myTabContent" class="tab-content col-md-9">

            

              <div class="tab-pane animated fadeInRight" id="mail">
                <div class="row-fluid">
                  <div class="span12">
                    <div class="widget-box">
                      <div class="widget-title">
                        
                        
                      </div>
                      <div class="widget-content">
                       <h2></h2>

                {!! Form::open(['route' => 'configuration.mailStore','role' => 'form', 'class'=>'mail-form ']) !!}

                  @include('configuration._mail')

                {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                  
                </div>
                

              </div>

              

              <div class="tab-pane animated active fadeInRight" id="permission">
                <div class="row-fluid">
          <div class="span4">
            <div class="widget-box">
              <div class="widget-title">
               
                <h5><strong>Create New </strong><code>Role</code></h5>
              </div>
              <div class="widget-content">
               <div class="box-info">

                  

                    {!! Form::open(['route' => 'role.store','role' => 'form', 'class'=>'role-form']) !!}

                      @include('role._form')

                    {!! Form::close() !!}

                  </div>
              </div>
            </div>
          </div>
          <div class="span8">
            <div class="widget-box">
              <div class="widget-title">
                
                <h5> List All <code><strong> Role</strong> </code></h5>
              </div>
              <div class="widget-content">
               <div class="">


                    <div class="table-responsive">

                      <table class="table table-hover table-striped">

                        <thead>

                          <tr>

                            <th>{!! trans('messages.Name') !!}</th>

                            <th>{!! trans('messages.Display Name') !!}</th>

                            <th>Option</th>

                          </tr>

                        </thead>

                        <tbody>

                          @foreach($roles as $role)

                            <tr>

                              <td>{!! $role->name !!}</td>

                              <td>{!! $role->display_name !!}</td>

                              <td>

                                <a href="{!! URL::to('/role/'.$role->id.'/edit') !!}" class='fa icon-pencil' data-toggle='modal' data-target='#myModal' > <i class='fa fa-edit'></i> </a>

                                <form method="POST" action="{{ url("admin/delete-ad/$role->id") }}" accept-charset="UTF-8" style="display:inline">
                          {!! csrf_field() !!}
                          <button title="Ad delete" class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Ad Delete" data-message="Are you sure to delete Ad??">
                              <i class="glyphicon glyphicon-trash"></i> 
                          </button>
                      </form>
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
          
        </div>
                <div class="user-profile-content">

                <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title">
                
                <h5><strong>{!! trans('messages.Manage') !!}</strong> {!! trans('messages.Permission') !!}</h5>
              </div>
              <div class="widget-content">
                <div class="">
                

                {!! Form::open(['route' => 'configuration.save_permission','role' => 'form', 'class'=>'permission-form ']) !!}

                
                  <table class="table">

                    <thead>

                      <tr>

                        <th>Permission</th>

                        @foreach($roles as $role)

                        <th>{!! ucwords($role->name) !!}</th>

                        @endforeach

                      </tr>

                      </tr>

                    </thead>

                    <tbody>

                      @foreach($permissions as $permission)

                        @if($permission->category != $category)

                        <tr style="background-color:#3498DB;color:#ffffff;"><td colspan="{!! count($roles)+1 !!} "><strong>{!! \App\Classes\Helper::toWord($permission->category) !!} Module</strong></td></tr>

                        <?php $category = $permission->category; ?>

                        @endif

                        <tr>

                          <td>{!! ucwords($permission->display_name) !!}</td>

                          @foreach($roles as $role)

                          <th><input type="checkbox" name="permission[{!!$role->id!!}][{!!$permission->id!!}]" value = '1' {!! (in_array($role->id.'-'.$permission->id,$permission_role)) ? 'checked' : '' !!}></th>

                          @endforeach

                        </tr>

                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                          {!! Form::submit(isset($buttonText) ? $buttonText : 'Save Permission',['class' => 'btn btn-primary pull-right']) !!}
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                  

                {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
          
        </div>


                
                <div class="clear"></div>

                </div>

              </div>

              <div class="tab-pane animated fadeInRight" id="time">

                <div class="user-profile-content">

                <h2><strong>{!! trans('messages.Office') !!}</strong> {!! trans('messages.Timing') !!}</h2>

                {!! Form::open(['route' => 'configuration.time','role' => 'form', 'class'=>'time-form ']) !!}

                  @include('configuration.time')

                {!! Form::close() !!}

                </div>

              </div>

              <div class="tab-pane animated fadeInRight" id="award">

                <div class="user-profile-content">

                <div class="row">

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Add New') !!}</strong> {!! trans('messages.Award Type') !!}</h2>

                      {!! Form::open(['route' => 'award_type.store','role' => 'form', 'class'=>'award-type-form ']) !!}

                        @include('award_type._form')

                      {!! Form::close() !!}

                    </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Listing All') !!}</strong> {!! trans('messages.Award Types') !!}</h2>

                        <div class="table-responsive">

                          <table class="table table-hover table-striped">

                            <thead>

                              <tr>

                                <th>{!! trans('messages.Award Name') !!}</th>

                                <th>{!! trans('messages.Option') !!}</th>

                              </tr>

                            </thead>

                            <tbody>

                            
                            </tbody>

                          </table>

                        </div>

                    </div>

                  </div>

                </div>

                </div>

              </div>

              <div class="tab-pane animated fadeInRight" id="leave">

                <div class="user-profile-content">

                <div class="row">

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Add New') !!}</strong> {!! trans('messages.Leave Type') !!}</h2>

                      {!! Form::open(['route' => 'leave_type.store','role' => 'form', 'class'=>'leave-type-form ']) !!}

                        @include('leave_type._form')

                      {!! Form::close() !!}

                    </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Listing All') !!}</strong> {!! trans('messages.Leave Types') !!}</h2>

                        <div class="table-responsive">

                          <table class="table table-hover table-striped">

                            <thead>

                              <tr>

                                <th>{!! trans('messages.leave Name') !!}</th>

                                <th>{!! trans('messages.Option') !!}</th>

                              </tr>

                            </thead>

                            <tbody>

                            
                            </tbody>

                          </table>

                        </div>

                    </div>

                  </div>

                </div>

                </div>

              </div>

              <div class="tab-pane animated fadeInRight" id="document">

                <div class="user-profile-content">

                <div class="row">

                  <div class="col-sm-6">

                    <div class="box-info">

                    

                    </div>

                  </div>

                  <div class="col-sm-6">

                    

                  </div>

                </div>

                </div>

              </div>
                          
                          <div class="tab-pane animated fadeInRight" id="asset">
                <div class="user-profile-content">
                <div class="row">
                  
                  <div class="col-sm-6">
                    <div class="box-info">
                      
                    </div>
                  </div>
                </div>
                </div>
              </div>

              <div class="tab-pane animated fadeInRight" id="salary">

                <div class="user-profile-content">

                <div class="row">

                  <div class="col-sm-6">

                    <div class="box-info">

                      

                    </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Listing All') !!}</strong> {!! trans('messages.Salary Types') !!}</h2>

                        <div class="table-responsive">

                          <table class="table table-hover table-striped">

                            <thead>

                              <tr>

                                <th>{!! trans('messages.Salary Head') !!}</th>

                                <th>{!! trans('messages.Type') !!}</th>

                                <th>{!! trans('messages.Option') !!}</th>

                              </tr>

                            </thead>

                            <tbody>

                            

                            </tbody>

                          </table>

                        </div>

                    </div>

                  </div>

                </div>

                </div>

              </div>

              <div class="tab-pane animated fadeInRight" id="expense">

                <div class="user-profile-content">

                <div class="row">

                  <div class="col-sm-6">

                    <div class="box-info">

                      
                    </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Listing All') !!}</strong> {!! trans('messages.Expense Heads') !!}</h2>

                        <div class="table-responsive">

                          <table class="table table-hover table-striped">

                            <thead>

                              <tr>

                                <th>{!! trans('messages.Expense Head') !!}</th>

                                <th>{!! trans('messages.Option') !!}</th>

                              </tr>

                            </thead>

                            <tbody>

                            
                            </tbody>

                          </table>

                        </div>

                    </div>

                  </div>

                </div>

                </div>

              </div>
                          <div class="tab-pane animated fadeInRight" id="alias">

                <div class="user-profile-content">

                <div class="row">

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Add New') !!}</strong> {!! trans('messages.Alias') !!}</h2>

                      {!! Form::open(['route' => 'alias.store','role' => 'form', 'class'=>'alias-form ']) !!}

                        @include('alias._form')

                      {!! Form::close() !!}

                    </div>

                  </div>

                  <div class="col-sm-6">

                    <div class="box-info">

                      <h2><strong>{!! trans('messages.Listing All') !!}</strong> {!! trans('messages.Alias') !!}</h2>

                        <div class="table-responsive">

                          <table class="table table-hover table-striped">

                            <thead>

                              <tr>

                                <th>{!! trans('messages.Alias Name') !!}</th>

                                <th>{!! trans('messages.Option') !!}</th>

                              </tr>

                            </thead>

                            <tbody>

                              @foreach($alias_list as $aliasv)

                                <tr>

                                  <td>{!! $aliasv->alias_name !!}</td>

                                  <td>

                                    <a href="{!! URL::to('/alias/'.$aliasv->id.'/edit') !!}" class='btn btn-xs btn-default' data-toggle='modal' data-target='#myModal' > <i class='fa fa-edit'></i> Edit</a>

                                    {!! delete_form(['alias.destroy',$aliasv->id]) !!}

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

              </div>

            </div>
          </div>
        </div>
      </div>
      
      </div>
    </div><hr>
 
</div>

</div>

@include('erp.layout.footer')



<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('public/maruti/js/jquery.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.ui.custom.js')}}"></script> 
<script src="{{asset('public/maruti/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/bootstrap-colorpicker.js')}}"></script> 
<script src="{{asset('public/maruti/js/bootstrap-datepicker.js')}}"></script> 
<script src="{{asset('public/maruti/js/jquery.uniform.js')}}"></script> 
<script src="{{asset('public/maruti/js/select2.min.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.js')}}"></script> 
<script src="{{asset('public/maruti/js/maruti.form_common.js')}}"></script>

<script src="{{ asset('public/admin/plugins/bootstrap-confirm-delete.js') }}"></script>

<script>
   $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      alert($message);
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });
 $('#edit_modal').on('show.bs.modal', function (e) {
      
      $title = $(e.relatedTarget).attr('data-brandid');
      
      $(this).find('#brand_id').val($title);
      $title = $(e.relatedTarget).attr('data-adinfo');
      $(this).find('#adinfo').val($title);


       $title = $(e.relatedTarget).attr('data-location');
      $(this).find('#location').val($title);

       $title = $(e.relatedTarget).attr('data-category');
      $(this).find('#category').val($title);
  });
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
     
      $(this).data('form').submit();
  });
</script>
</body>
</html>
