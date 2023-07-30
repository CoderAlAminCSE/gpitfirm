<!doctype html>
<html lang="en">

<head>
	@component('frontend/layouts.head', ['title' => 'Guest Posting DA 50+ - GP IT Firm'])
	@endcomponent
</head>

<body class="product-template-default single single-product postid-116 theme-gpit-firm woocommerce woocommerce-page woocommerce-no-js">

	<!-- header-area -->
	@include('frontend/layouts.header')

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<!-- hero-section -->
			@include('frontend/components.singleProduct.hero')

			<!-- product-info -->
			@include('frontend/components.singleProduct.product_info')
		</main>
	</div>

	<!-- footer -->
	@include('frontend/layouts.footer')
</body>

</html>