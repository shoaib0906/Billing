	
@include('erp.layout.head')

    
<body>
@include('erp.layout.sidebar')
<!--Header-part-->



<div id="content">
  <div id="content-header">
   <div id="content-header">
        <div id="breadcrumb">
        <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#"> <i class="icon-cog"></i>Set-up</a>
        <a href="{{'/group'}}" class="current"> Product Group</a>
        <button  class="pull-right" href="#myModal" data-toggle="modal" class="btn btn-success">Create Product Group</button>
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
            <h5><strong>{!! trans('messages.Change') !!} </strong> {!! trans('messages.Password') !!}</h5>
          </div>
          <div class="widget-content nopadding">
            	<div class="row-fluid">
            <div class="">
                <div class="">
                  
                  <div class="widget-content nopadding">
                   {!! Form::open(['route' => 'change_password','role' => 'form', 'class' => 'form-horizontal change-password-form']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <div class="control-group">
                        <label class="control-label">{!! Form::label('old_password',trans('messages.Current Password'),['class' => ''])!!}</label>
                        <div class="controls">
                          {!! Form::input('password','old_password','',['class'=>'form-control','placeholder'=>'Enter Current Password'])!!}
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label"> {!! Form::label('new_password',trans('messages.New Password'),['class' => ''])!!}</label>
                        <div class="controls">
                          {!! Form::input('password','new_password','',['class'=>'form-control','placeholder'=>'Enter New Password'])!!}
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label"> {!! Form::label('new_password_confirmation',trans('messages.New Confirm Password'),['class' => ''])!!}</label>
                        <div class="controls">
                         {!! Form::input('password','new_password_confirmation','',['class'=>'form-control','placeholder'=>'Enter New Confirm Password'])!!}

                        </div>
                      </div>
                     
                      <div class="form-actions">
                      {!! Form::submit(isset($buttonText) ? $buttonText : trans('messages.Save'),['class' => 'btn btn-primary']) !!}
                        
                        
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button data-dismiss="modal" class="close" type="button">Cancel</button>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
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
<div class="row-fluid">
  <div id="footer" class="span12"> 2012 &copy; Marutii Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

