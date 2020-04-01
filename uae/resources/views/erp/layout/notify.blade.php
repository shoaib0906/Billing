<div id="notifications">
@if (Session::has('success'))


        <div class="alert alert-success"  style="padding:10px;margin:0px;text-align:right;">
              <button class="close" data-dismiss="alert">×</button>
              <strong>{!! strtoupper(Session::get('success')) !!}</strong> 
      </div>
      

@endif
@if (Session::has('error'))
        <div class="alert alert-error"  style="padding:10px;margin:0px;text-align:right;">
              <button class="close" data-dismiss="alert">×</button>
             <strong>{!! strtoupper(Session::get('error')) !!}</strong> 
      </div>
@endif
@if (Session::has('info'))
        <div class="alert alert-info"  style="padding:10px;margin:0px;text-align:right;">
              <button class="close" data-dismiss="alert">×</button>
   <strong>{!! strtoupper(Session::get('info')) !!}</strong> 
      </div>
@endif
@if (Session::has('errors'))
 <div class="alert alert-error"  style="padding:10px;margin:0px;text-align:right;">
              <button class="close" data-dismiss="alert">×</button>
       <strong>{!! strtoupper(Session::get('errors')->First()) !!}</strong> 
      </div>
  
@endif
</div> 