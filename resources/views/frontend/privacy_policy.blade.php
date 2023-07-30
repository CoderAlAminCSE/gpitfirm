<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'Privacy Policy - GP IT Firm'])
	@endcomponent
</head>

<body class="page-template page-template-template-inner page-template-template-inner-php page page-id-182 theme-gpit-firm woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div class="main">
		<!-- hero-section -->
		@include('frontend/components.privacyPolicy.hero')

		<!-- info-section -->
		@include('frontend/components.privacyPolicy.info')

	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')
</body>

</html>