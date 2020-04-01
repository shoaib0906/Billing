			<div class="col-sm-6">
			  <div class="form-group">
			    {!! Form::label('driver','Driver',[])!!}
				{!! Form::select('driver', [
					null=>'Please Select',
					'mail' => 'mail',
					'smtp' => 'smtp',
					'sendmail' => 'sendmail',
					'mailgun' => 'mailgun',
					'mandrill' => 'mandrill',
					'log' => 'log'
					],(config('mail.driver')) ? : 'mail',['id' => 'mail_driver', 'class'=>'form-control input-xlarge select2me','placeholder'=>'Select Mail Driver'])!!}
			  </div>
			  <div class="form-group">
			    {!! Form::label('from_address','From Address',[])!!}
				{!! Form::input('email','from_address',config('mail.from.address'),['class'=>'form-control','placeholder'=>'Enter From Address'])!!}
			  </div>
			  <div class="form-group">
			    {!! Form::label('from_name','From Name',[])!!}
				{!! Form::input('text','from_name',config('mail.from.name'),['class'=>'form-control','placeholder'=>'Enter From Name'])!!}
			  </div>
			  {!! Form::hidden('config_type','mail')!!}
			{!! Form::submit(isset($buttonText) ? $buttonText : trans('messages.Save'),['class' => 'btn btn-primary']) !!}
			</div>
			<div class="col-sm-6">
				
				<div id="smtp_configuration" class="mail_config">
				  <div class="form-group">
				    {!! Form::label('host','SMTP Host',[])!!}
					{!! Form::input('text','host',config('mail.host'),['class'=>'form-control','placeholder'=>'Enter SMTP Host'])!!}
				  </div>
				  <div class="form-group">
				    {!! Form::label('port','SMTP Port',[])!!}
					{!! Form::input('text','port',config('mail.port'),['class'=>'form-control','placeholder'=>'Enter SMTP Port'])!!}
				  </div>
				  <div class="form-group">
				    {!! Form::label('username','SMTP Username',[])!!}
					{!! Form::input('text','username',config('mail.username'),['class'=>'form-control','placeholder'=>'Enter SMTP Username'])!!}
				  </div>
				  <div class="form-group">
				    {!! Form::label('password','SMTP Password',[])!!}
					{!! Form::input('text','password',config('mail.password'),['class'=>'form-control','placeholder'=>'Enter SMTP Password'])!!}
				  </div>
					
				</div>
				<div id="mandrill_configuration" class="mail_config">
				  <div class="form-group">
				    {!! Form::label('mandrill_secret','Secret Key',[])!!}
					{!! Form::input('text','mandrill_secret',config('services.mandrill.secret'),['class'=>'form-control','placeholder'=>'Enter Mandrill Secret Key'])!!}
				  </div>
					
				</div>
				
			</div>
			<div class="clear"></div>
