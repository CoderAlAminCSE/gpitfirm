<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $faqTitle = 'My Account | ' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $faqTitle])
    @endcomponent
</head>

<body
    class="page-template page-template-template-inner page-template-template-inner-php page page-id-82 theme-gpit-firm imjol-account imjol-page imjol-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <div class="main">
        <!-- hero-section -->
        @include('frontend/components.myAccount.hero')

        @yield('account_content')

        <!-- footer -->
        @include('frontend/layouts.footer')
</body>

</html>
