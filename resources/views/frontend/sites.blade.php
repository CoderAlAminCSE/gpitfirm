<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'Guest Posting &amp; Link Building SEO services | GP IT Firm'])
	@endcomponent
</head>

<body class="page-template page-template-template-sites page-template-template-sites-php page page-id-17 theme-gpit-firm woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div class="main">
		<!-- hero-section -->
		@include('frontend/components.sites.hero')

		<!-- sites-section -->
		@include('frontend/components.sites.sites')
	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')
</body>

</html>