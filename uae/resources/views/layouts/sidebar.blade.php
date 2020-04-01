

		<!-- BEGIN SIDEBAR -->

		<div class="left side-menu" style="background-color:#34495e;">

			

			

            <div class="body rows scroll-y">

				

				<!-- Scrolling sidebar -->

                <div class="sidebar-inner slimscroller">

				

					<!-- User Session -->

					<!--<div class="media">

						<a class="pull-left" href="#">

							{!! \App\Classes\Helper::getAvatar(Auth::user()->id) !!}

						</a>

						<div class="media-body">

							{!! trans('messages.Welcome back') !!},

							<h4 class="media-heading"><strong>{!! Auth::user()->first_name!!} {!! Auth::user()->last_name !!}</strong></h4>

							
						</div>

					</div>-->

				@if(config('constants.MODE') == 0)

					

				@endif

					<!-- Sidebar menu -->				

					<div id="sidebar-menu">

						<ul>

							
                            @if(Entrust::can('create_department'))



							<li><a href=""><i class="fa fa-sitemap icon"></i><i class="fa fa-angle-double-down i-right"></i> Branch</a>

								<ul>

									@if(Entrust::can('create_department'))

									<li><a href="{!! URL::to('/department/create') !!}"><i class="fa fa-plus"></i> {!! trans('messages.Add New') !!} </a></li>

									@endif

									<li><a href="{!! URL::to('/department') !!}"><i class="fa fa-list"></i> List Branch </a></li>

								</ul>

							</li>

							@endif
                           
							@if(Entrust::can('manage_employee'))

							<li><a href=""><i class="fa fa-users icon"></i><i class="fa fa-angle-double-down i-right"></i> {!! trans('messages.Tenants') !!}</a>

								<ul>

									@if(Entrust::can('create_employee'))

									<li><a href="{!! URL::to('/employee/create') !!}"><i class="fa fa-plus"></i> {!! trans('messages.Add New') !!} </a></li>

									@endif

									<li><a href="{!! URL::to('/employee') !!}"><i class="fa fa-list"></i> {!! trans('messages.List Tenants') !!}</a></li>

								</ul>

							</li>

							@endif
							

							
						</ul>

						<div class="clear"></div>

					</div><!-- End div #sidebar-menu -->

				</div><!-- End div .sidebar-inner .slimscroller -->

            </div><!-- End div .body .rows .scroll-y -->

			

			<!-- Sidebar footer -->

            

        </div>

		<!-- END SIDEBAR -->