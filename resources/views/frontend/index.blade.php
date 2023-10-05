<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $faqTitle = '' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $faqTitle])
    @endcomponent
</head>

<body
    class="home page-template page-template-template-home page-template-template-home-php page page-id-7 theme-gpit-firm woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <!-- main -->
    <div class="main">
        <!-- hero-section -->
        @include('frontend/components.home.hero')

        <!-- promo-section -->
        @include('frontend/components.home.promo')

        <!-- about-us -->
        @include('frontend/components.home.about')

        <!-- services -->
        @include('frontend/components.home.services')

        <!-- testimonial -->
        @include('frontend/components.home.testimonial')

        <!-- cta1 -->
        @include('frontend/components.home.cta1')

        <!-- cta2 -->
        @include('frontend/components.home.cta2')
    </div>

    <!-- footer -->
    @include('frontend/layouts.footer')
</body>

</html>
