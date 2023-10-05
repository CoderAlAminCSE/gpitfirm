<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $faqTitle = 'CART | ' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $faqTitle])
    @endcomponent
    @paddleJS
</head>

<body
    class="page-template page-template-template-inner page-template-template-inner-php page page-id-80 theme-gpit-firm woocommerce-cart woocommerce-page woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <div class="main">
        <!-- hero-section -->
        @include('frontend/components.cart.hero')

        <!-- cart-items -->
        @include('frontend/components.cart.cart_items')
    </div>

    <!-- footer -->
    @include('frontend/layouts.footer')

</body>

</html>
