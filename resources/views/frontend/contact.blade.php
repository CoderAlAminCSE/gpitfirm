<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'Contact - GP IT Firm'])
	@endcomponent
</head>

<body class="page-template page-template-template-contact page-template-template-contact-php page page-id-9 theme-gpit-firm woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div class="main">
		<!-- hero-section -->
		@include('frontend/components.contact.hero')

		<!-- contact-us-promo -->
		@include('frontend/components.contact.contact_us_promo')

	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')

</body>

</html>