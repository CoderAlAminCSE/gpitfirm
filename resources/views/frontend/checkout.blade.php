<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'Checkout - GP IT Firm'])
    @endcomponent
</head>

<body
    class="page-template page-template-template-contact page-template-template-contact-php page page-id-9 theme-gpit-firm woocommerce-no-js">

    <!-- header-area -->
    @include('frontend/layouts.header')

    @include('frontend.components.checkout.hero')


    @include('frontend.components.checkout.checkout_content')




    <!-- footer -->
    @include('frontend/layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var triggerButton = document.getElementById('triggerButton');
            var hiddenSubmitButton = document.getElementById('hiddenSubmitButton');

            triggerButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default link behavior
                hiddenSubmitButton.click(); // Trigger the hidden submit button
            });
        });
    </script>
</body>

</html>
