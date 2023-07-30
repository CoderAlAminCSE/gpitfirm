<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'Refund - GP IT Firm'])
    @endcomponent
</head>

<body class="page-template page-template-template-inner page-template-template-inner-php page page-id-186 theme-gpit-firm woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <div class="main">
        <!-- hero-section -->
        @include('frontend/components/refund/hero')

        <!-- info-section -->
        @include('frontend/components.refund.info')
    </div>

    <!-- footer -->
    @include('frontend/layouts.footer')
</body>

</html>