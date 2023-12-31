<!doctype html>
<html lang="en">

<head>
    @php
        $applicationName = siteSetting('company_name') ?? null;
        $title = $category->name . ' | ' . 'SERVICES | ' . $applicationName;
    @endphp
    @component('frontend/layouts.head', ['title' => $title])
    @endcomponent
</head>

<body
    class="page-template page-template-template-guestpost page-template-template-guestpost-php page page-id-13 theme-gpit-firm imjol-no-js">

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
