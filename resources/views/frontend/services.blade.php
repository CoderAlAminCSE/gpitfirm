<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $faqTitle = 'SERVICES | ' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $faqTitle])
    @endcomponent
</head>

<body
    class="archive post-type-archive post-type-archive-product theme-gpit-firm woocommerce-shop woocommerce woocommerce-page woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <!-- hero-section -->
    @include('frontend/components/services/hero')

    <!-- services -->
    @include('frontend/components/services/services')

    <!-- footer -->
    @include('frontend/layouts.footer')
</body>

</html>
