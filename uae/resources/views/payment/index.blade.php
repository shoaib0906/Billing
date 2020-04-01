@extends('layouts.default')

	@section('content')
		<div class="row">
			<div class="col-sm-8">
				<div class="box-info">
					<h2><strong></strong> {!! trans('messages.Payment') !!}
					<div class="additional-btn">
						  <a class="additional-icon" id="dropdownMenu4" data-toggle="dropdown">
							<i class="fa fa-cog"></i>
						  </a>
						  <ul class="dropdown-menu pull-right animated half fadeInDown" role="menu" aria-labelledby="dropdownMenu4">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="/notice">{!! trans('messages.List All Notice') !!}</a></li>
						  </ul>
					</div>
					</h2>
					
														<!DOCTYPE html>
									<?php
											$APILoginID  = 'YourAPILoginID';
											$SecureTransactionKey = 'YourSecureTransKey';
											$totalamount = "{1375.23,1573.66,56.99,0|Total outstanding,Last statement balance,Minimum balance,Specify different amount};500.00";
											$method = 'sale';
											$version = '1.0';
											$ordernumber = 'A1234';
											date_default_timezone_set("America/Chicago");
											$unixtime = strtotime(gmdate('Y-m-d H:i:s'));
											$millitime = microtime(true) * 1000;
											$utc = number_format(($millitime * 10000) + 621355968000000000 , 0, '.', '');
											$data = "$APILoginID|$method|$version|$totalamount|$utc|$ordernumber||";
											$hash = hash_hmac('md5',$data,$SecureTransactionKey);
									?>
									<head>   
									<script>
									function oncallback(e) {
									        $('#message').html(e.data);
									    }
									</script>
									<script type="text/javascript" src="https://sandbox.forte.net/checkout/v1/js"></script>
									<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
									</head>
									<body>
									<div id="message" style="background-color:#e5e5e5"></div>	
									<button api_login_id=<?php echo $APILoginID;?>		
											version_number=<?php echo $version;?>		
											callback="oncallback" 		
											method=<?php echo $method;?>
											total_amount="<?php echo $totalamount;?>"
											utc_time=<?php echo $utc;?>
											signature=<?php echo $hash;?>		
											order_number=<?php echo $ordernumber;?>		
											>Pay now</button>
									</body>
									</html>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="the-notes info"><h4>{!! trans('messages.Help') !!}</h4> </div>
			</div>
		</div>

	@stop