@extends('layouts.default')

	@section('content')
		<div class="box-info box-messages">
			<div class="row">
				<div class="col-md-2">
					<a href="{{url('message/compose')}}" class="btn btn-warning btn-block md-trigger"><i class="fa fa-edit"></i> Compose</a>
					<div class="list-group menu-message">
					  <a href="{{url('message')}}" class="list-group-item">
						Inbox <strong>({!! $count_inbox !!})</strong>
					  </a>
					  <a href="{{url('message/sent')}}" class="list-group-item active">Sent <strong>({!! $count_sent !!})</strong></a>
					</div>
				</div>
				
				
				<div class="col-md-10">
					
					@include('common.datatable',['col_heads' => $col_heads])
					
				</div><!-- End div .col-md-10 -->
			</div><!-- End div .row -->
		</div><!-- End div .box-info -->
		<!-- End inbox -->




	@stop