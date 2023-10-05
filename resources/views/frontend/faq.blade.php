<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $faqTitle = 'FAQ | ' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $faqTitle])
    @endcomponent
</head>

<body
    class="page-template page-template-template-faq page-template-template-faq-php page page-id-11 theme-gpit-firm woocommerce-no-js">

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
