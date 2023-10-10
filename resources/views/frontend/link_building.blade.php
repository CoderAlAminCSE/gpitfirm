<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'Link Building - GP IT Firm'])
    @endcomponent
</head>

<body
    class="page-template page-template-template-linkbuilding page-template-template-linkbuilding-php page page-id-15 theme-gpit-firm imjol-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    <div class="main">
        <!-- hero-section -->
        @include('frontend/components.linkBuilding.hero')

        <!-- pricing-section -->
        @include('frontend/components.linkBuilding.pricing')
    </div>

    <!-- footer -->
    @include('frontend/layouts.footer')
</body>

</html>
