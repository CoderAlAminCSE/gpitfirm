<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'My account - GP IT Firm'])
    @endcomponent
</head>

<body
    class="page-template page-template-template-inner page-template-template-inner-php page page-id-82 theme-gpit-firm woocommerce-account woocommerce-page woocommerce-no-js">

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
