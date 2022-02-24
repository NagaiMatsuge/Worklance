<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="{{ asset('data/img/favicon.png') }}" type="image/png">
		
		<title>Admin Page</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/material-design/css/materialdesignicons.css') }}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/sweet-alert/sweetalert.css') }}">
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/percircle/css/percircle.css') }}">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/chart/chartist/chartist.min.css') }}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.print.css') }}" media='print'>

	<!-- Dark Themes -->
	<link rel="stylesheet" href="{{ asset('assets/styles/style-dark.min.css') }}">
</head>
<body>
    
	
@include('layouts.adminLayouts.mainMenu')
@include('layouts.adminLayouts.navbar')
	@yield('content')
	
	
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	
	<script src="{{asset('assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/plugin/waves/waves.min.js')}}"></script>
	<!-- Full Screen Plugin -->
	<script src="{{asset('assets/plugin/fullscreen/jquery.fullscreen-min.js')}}"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- chart.js Chart -->
	<script src="{{asset('assets/plugin/chart/chartjs/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('assets/scripts/chart.chartjs.init.min.js')}}"></script>

	<!-- FullCalendar -->
	<script src="{{asset('assets/plugin/moment/moment.js')}}"></script>
	<script src="{{asset('assets/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{asset('assets/scripts/fullcalendar.init.js')}}"></script>

	<!-- Sparkline Chart -->
	<script src="{{asset('assets/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('assets/scripts/chart.sparkline.init.min.js')}}"></script>
	<script src="{{asset('assets/scripts/main.min.js')}}"></script>
	<script>
		$(function(){
			$('.main-a').each(function(){
				if ($(this).prop('href') == window.location.href) {
					$(this).addClass('current'); $(this).parents('li').addClass('current');
				}
			});
		});
	</script>
</body>
</html>

