@extends('layouts.default')



	@section('content')

		

		<style>

			ul.tree, ul.tree ul {

			 list-style-type: none;

			 background: url('/assets/images/vline.png') repeat-y;

			 margin: 0;

			 padding: 0;

			}



			ul.tree ul {

			 margin-left: 10px;

			}



			ul.tree li {

			 margin: 0;

			 padding: 0 12px;

			 line-height: 20px;

			 background: url('/assets/images/node.png') no-repeat;

			 color: #3F3E48;

			 font-weight: bold;

			}



			ul.tree li.last {

			 background: #fff url('/assets/images/lastnode.png') no-repeat;

			}

			ul.tree li:last-child {

			 background: #fff url('/assets/images/lastnode.png') no-repeat;

			}

		</style>

		@if(Entrust::hasRole('manager'))

		<div class="row" >

			<div class="col-sm-3 col-xs-6" >

				<div class="box-info" style="background-color:#2ecc71;">

					<div class="icon-box">

						<span class="fa-stack">

						  <i class="fa fa-circle fa-stack-2x info"></i>

						  <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>

						</span>

					</div>

					<div class="text-box">

						<h3>{!! $dept_count !!}</h3>

						<p>{!! trans('messages.Total Property') !!}</p>

					</div>

					<div class="clear"></div>

				</div>

			</div>

			<div class="col-sm-3 col-xs-6">

				<div class="box-info" style="background-color:#f39c12;">

					<div class="icon-box">

						<span class="fa-stack">

						  <i class="fa fa-circle fa-stack-2x warning"></i>

						  <i class="fa fa-users fa-stack-1x fa-inverse"></i>

						</span>

					</div>

					<div class="text-box">

						<h3>{!! $user_count !!}</h3>

						<p>{!! trans('messages.Present Tenants') !!}</p>

					</div>

					<div class="clear"></div>

				</div>

			</div>

			<div class="col-sm-3 col-xs-6">

				<div class="box-info" style="background-color:#f1c40f;">

					<div class="icon-box">

						<span class="fa-stack">

						  <i class="fa fa-circle fa-stack-2x success"></i>

						  <i class="fa fa-user fa-stack-1x fa-inverse"></i>

						</span>

					</div>

					<div class="text-box">

						<h3>{!! $present_count !!}</h3>

						<p>{!! trans('messages.Due Tenants') !!}</p>

					</div>

					<div class="clear"></div>

				</div>

			</div>

			
            <div class="col-sm-3 col-xs-6">
				<div class="box-info" style="background-color:#c53b2d;">
					<div class="icon-box">
						<span class="fa-stack">
						  <i class="fa fa-circle fa-stack-2x danger"></i>
						  <i class="fa fa-tasks fa-stack-1x fa-inverse"></i>
						</span>
					</div>
					<div class="text-box">
						<h3>{!! $expire_count !!}</h3>
                        @if($expire_count)
                        <p><a href="{!! URL::to('/expirelist') !!}">{!! trans('messages.Expire Tenants') !!}</a></p>
                        @else
                        <p>{!! trans('messages.Expire List') !!}</p>
                        @endif						
					</div>
					<div class="clear"></div>
				</div>
			</div>

		</div>
<div class="row" >

			

			<div class="col-sm-12">

				<div class="box-info" >

					<h2><strong>{!! trans('messages.Quick') !!}</strong> {!! trans('messages.Message') !!}</h2>

					<div class="additional-btn">

						  <a class="additional-icon" id="dropdownMenu5" data-toggle="dropdown">

							<i class="fa fa-cog"></i>

						  </a>

						  <ul class="dropdown-menu pull-right flip animated half fadeInDown" role="menu" aria-labelledby="dropdownMenu5">

							<li role="presentation"><a role="menuitem" tabindex="-1" href="/message/compose">{!! trans('messages.Compose') !!}</a></li>

							<li role="presentation"><a role="menuitem" tabindex="-1" href="/message">{!! trans('messages.Go to Inbox') !!}</a></li>

							<li role="presentation"><a role="menuitem" tabindex="-1" href="/message/sent">{!! trans('messages.Go to Sent Folder') !!}</a></li>

						  </ul>

						  <a class="additional-icon" href="#" data-toggle="collapse" data-target="#quick-post"><i class="fa fa-chevron-down"></i></a>

					</div>

					

					<div id="quick-post" class="collapse in">

						{!! Form::open(['route' => 'message.store','role' => 'form', 'class'=>'compose-form']) !!}

							<div class="form-group">

								{!! Form::select('to_user_id', [null=>'Please select'] + $compose_users, '',['class'=>'form-control input-xlarge select2me','placeholder'=>'Select Staff'])!!}

							</div>

							<div class="form-group">

								{!! Form::input('text','subject','',['class'=>'form-control input-lg','placeholder'=>'Message subject'])!!}

							</div>

							<div class="form-group">

								{!! Form::textarea('content','',['class' => 'form-control summernote', 'placeholder' => 'Enter Description'])!!}

							</div>

							<div class="row">

								<div class="col-md-6">

									<button type="submit" class="btn btn-sm btn-success">{!! trans('messages.Send') !!}</button>

								</div>

							</div>

						{!! Form::close() !!}

					</div>

				</div>

			</div>

			

		</div>

		@endif











		
		

	@stop