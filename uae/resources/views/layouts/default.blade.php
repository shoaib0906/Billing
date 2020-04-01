@include('layouts.head')





	<!-- BODY -->

	<body class="tooltips k-rtl">

	

	<!-- BEGIN PAGE -->

	<div class="container">

		<!-- Your logo goes here -->

		<div class="logo-brand header sidebar rows">

			<div class="logo">

				<h1><a href="{!! URL::to('/dashboard') !!}">
				
				<strong>{!! config('config.application_title') ? : config('constants.ITEM_NAME') !!}</strong>
				</a>
				</h1>

				

			</div>

		</div><!-- End div .header .sidebar .rows -->



		@include('layouts.sidebar')

		

		<!-- BEGIN CONTENT -->

        <div class="right content-page">



			@include('layouts.header')	

			

			<!-- ============================================================== -->

			<!-- START YOUR CONTENT HERE -->

			<!-- ============================================================== -->

            <div class="body content rows scroll-y" >

				
            <div style="min-height:450px;">
				@yield('content')
			</div>	
			

				@include('layouts.footer')	

            </div>

			<!-- ============================================================== -->

			<!-- END YOUR CONTENT HERE -->

			<!-- ============================================================== -->

			

			

        </div>

		<!-- END CONTENT -->

		

	</div><!-- End div .container -->

	<!-- END PAGE -->



	<div class="modal fade" id="myTodoModal" role="basic" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">

			</div>

		</div>

	</div>

	

	@include('layouts.foot')	



		

	

	

	