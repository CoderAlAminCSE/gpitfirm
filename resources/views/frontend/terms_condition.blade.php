<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'uest Posting &amp; Link Building SEO services | GP IT Firm'])
	@endcomponent
</head>

<body class="page-template page-template-template-inner page-template-template-inner-php page page-id-180 theme-gpit-firm woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div class="main">
		<!-- hero-section -->
		@include('frontend/components/termsCondition/hero')

		<!-- info -->
		@include('frontend/components/termsCondition/info')
	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')

</body>

</html>