<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'Faq - GP IT Firm'])
	@endcomponent
</head>

<body class="page-template page-template-template-faq page-template-template-faq-php page page-id-11 theme-gpit-firm woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div class="main">

		<!-- hero-section -->
		@include('frontend/components.faq.hero')

		<!-- promo-section -->
		@include('frontend/components.faq.promo')

	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')
</body>

</html>