<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $faqTitle = 'Reseller | ' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $faqTitle])
    @endcomponent
</head>

<body
    class="page-template page-template-template-inner page-template-template-inner-php page page-id-290 theme-gpit-firm woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <div class="main">
        <!-- hero-section -->
        @include('frontend/components/resellerRules/hero')

        <!-- info-section -->
        @include('frontend/components.resellerRules.info')
    </div>

    <!-- footer -->
    @include('frontend/layouts.footer')
</body>

</html>
