@extends('layouts.default')



	@section('content')

		<div class="row">

			<div class="col-sm-12">

				<div class="panel panel-default col-sm-12"  style="background-color:#95a5a6;padding-bottom:20px;">
					<div class="panel-heading" style="background-color:#34495e;color:white;">
						<center><h4><strong> Edit User  </strong></h4></center>
					</div>
					<br/>
					

					{!! Form::model($employee,['method' => 'PATCH','route' => ['employee.update',$employee->id] ,'class' => 'employee-form form-horizontal']) !!}

						  <div class="form-group">

						    {!! Form::label('first_name',trans('messages.First Name'),['class' => 'col-sm-2 control-label'])!!}

						    <div class="col-sm-10">

								{!! Form::input('text','first_name',isset($employee->first_name) ? $employee->first_name : '',['class'=>'form-control','placeholder'=>'Enter First Name'])!!}

							</div>

						  </div>

						  <div class="form-group">

						    {!! Form::label('last_name',trans('messages.Last Name'),['class' => 'col-sm-2 control-label'])!!}

						    <div class="col-sm-10">

								{!! Form::input('text','last_name',isset($employee->last_name) ? $employee->last_name : '',['class'=>'form-control','placeholder'=>'Enter Last Name'])!!}

							</div>

						  </div>
                          
                          <div class="form-group">

						    {!! Form::label('alias_id','Branch',['class' => 'col-sm-2 control-label'])!!}

						    <div class="col-sm-10">

							{!! Form::select('alias_id', [null=>'Please Select'] + $alias_list,isset($employee->property_id) ? $employee->property_id : '',['class'=>'form-control input-xlarge select2me','placeholder'=>'Select Alias'])!!}

							</div>

						  </div>	

						  
                          
						  <div class="form-group">

						    {!! Form::label('cell_no',trans('messages.cell_no'),['class' => 'col-sm-2 control-label'])!!}

						    <div class="col-sm-10">

								{!! Form::input('text','cell_no',isset($employee->cell_no) ? $employee->cell_no : '',['class'=>'form-control','placeholder'=>'Enter Cell No'])!!}
								
								<div class="help-box" style="color:#c0392b;"><strong>SMS will be Send to this Number.</strong></div>
							</div>

						  </div>
                        

						  <div class="col-sm-offset-2 col-sm-10">

						  	{!! Form::submit(isset($buttonText) ? $buttonText : trans('messages.Save'),['class' => 'btn btn-primary']) !!}

						  </div>

					{!! Form::close() !!}

				</div>

			</div>

		</div>



	@stop