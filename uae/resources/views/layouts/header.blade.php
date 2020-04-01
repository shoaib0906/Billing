
			<!-- BEGIN CONTENT HEADER -->
            <div class="header content rows-content-header">
			
				<!-- Button mobile view to collapse sidebar menu -->
				<button class="button-menu-mobile show-sidebar">
					<i class="fa fa-bars"></i>
				</button>
				
				<!-- BEGIN NAVBAR CONTENT-->				
				<div class="navbar navbar-default flip" role="navigation">
					<div class="container">
						<!-- Navbar header -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<i class="fa fa-angle-double-down"></i>
							</button>
						</div><!-- End div .navbar-header -->
						
						<!-- Navbar collapse -->	
						<div class="navbar-collapse collapse">
						
							
							<!-- Right navbar -->
							<ul class="nav navbar-nav navbar-right top-navbar">

							
								

								

								<li class="dropdown"><a href="#">{!! App\Classes\Helper::showDateTime(date('d M Y,h:i a')) !!}</a></li>
								
								<!-- Dropdown User session -->
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">{!! trans('messages.Hello') !!}, <strong>{!! Auth::user()->first_name." ".Auth::user()->last_name !!}</strong> <i class="fa fa-chevron-down i-xs"></i></a>
									<ul class="dropdown-menu animated half flipInX">
										<li><a href="{!! URL::to('/change_password') !!}">Change Password</a></li>
										<li><a href="{!! URL::to('/logout') !!}">Logout</a></li>
									</ul>
								</li>
								<!-- End Dropdown User session -->
							</ul>
						</div><!-- End div .navbar-collapse -->
					</div><!-- End div .container -->
				</div>
				<!-- END NAVBAR CONTENT-->
            </div>
			<!-- END CONTENT HEADER -->
				