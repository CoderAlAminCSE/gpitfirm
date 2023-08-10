<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'Guest Post - GP IT Firm'])
    @endcomponent
</head>

<body
    class="page-template page-template-template-guestpost page-template-template-guestpost-php page page-id-13 theme-gpit-firm woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <div class="main">
        <!-- hero-section -->
        @include('frontend/components.guestPost.hero')

        <!-- pricing-section -->
        @include('frontend/components.guestPost.pricing')

    </div>


    <!-- footer -->
    @include('frontend/layouts.footer')


</body>

</html>
