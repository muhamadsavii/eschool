<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('assets/frontend/styles/default.css') !!}
	{!! Html::style('assets/frontend/styles/component.css') !!}
	{!! Html::style('assets/frontend/styles/reset.css') !!}
	{!! Html::style('assets/frontend/styles/style.css') !!}

	<!--  untuk poto slider -->
	{!! Html::style('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/css/SimpleSlider.css') !!}
	

	
	{!! Html::script('assets/frontend/scripts/jquery.min.js') !!}
	{!! Html::script('assets/frontend/scripts/modernizr.js') !!}
	{!! Html::script('assets/frontend/scripts/bootstrap.min.js') !!}

	<!--  untuk poto slider -->
	{!! Html::script('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/js/Am2_SimpleSlider.js') !!}
  	
	<title>Responsive Vertical Timeline</title>
	<style type="text/css">
	.avatar{
		margin-top: 10px;
		border-style: solid;
	    border-color: white;
	    border-width: 10px;	
	}
	@font-face {
		    font-family: myFirstFont;
		    src: url('assets/Magra-Regular.ttf');
		}

	* {
		font-family: myFirstFont !important;
	}
	.mybacground{
		background: #191919 !important;
	}
	.mycolor{
		color: #191919 !important;
	}
	</style>
</head>
<body>
	<!-- HEADER -->
    @include('layout.frontend.partial.header')
	<!-- CONTENT -->
    @yield('content')


{!! Html::script('assets/frontend/scripts/main.js') !!}
{!! Html::script('assets/frontend/scripts/jquery.dlmenu.js') !!}

<script>
$(document).ready(function () {
	$(function() {
		$( '#dl-menu' ).dlmenu({
			animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
		});
	});
});
</script>
</body>
</html>