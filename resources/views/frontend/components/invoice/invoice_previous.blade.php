<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'Checkout - GP IT Firm'])
    @endcomponent
</head>

<body
    class="page-template page-template-template-contact page-template-template-contact-php page page-id-9 theme-gpit-firm imjol-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    @include('frontend.components.checkout.hero')
    @include('frontend.components.invoice.invoice_content')

    <!-- footer -->
    @include('frontend/layouts.footer')

</body>

</html>
