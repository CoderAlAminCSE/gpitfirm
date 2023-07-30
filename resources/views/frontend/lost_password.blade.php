<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'Lost password - GP IT Firm'])
	@endcomponent
</head>

<body class="page-template page-template-template-inner page-template-template-inner-php page page-id-82 theme-gpit-firm woocommerce-account woocommerce-page woocommerce-lost-password woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div class="main">
		@include('frontend/components.lostPassword.hero')

		<!-- info -->
		@include('frontend/components.lostPassword.info')
	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')
</body>

</html>