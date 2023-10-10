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
    <div class="container m-5 text-center">
        <h3>Payment Successful!</h3>
        <p>Thank you for your payment. Your invoice has been successfully processed, and your payment has been received.
        </p>
    </div>

    <!-- footer -->
    @include('frontend/layouts.footer')

</body>

</html>
