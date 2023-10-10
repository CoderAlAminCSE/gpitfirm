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
    class="archive post-type-archive post-type-archive-product theme-gpit-firm imjol-shop imjol imjol-page imjol-no-js">

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
