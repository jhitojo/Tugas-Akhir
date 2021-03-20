<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.header')	
</head>
<body class="js">
	
	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
	<!-- End Preloader -->

	<!--/ End Header -->
	@yield('content')
	
	@include('frontend.layouts.footer')

</body>
</html>