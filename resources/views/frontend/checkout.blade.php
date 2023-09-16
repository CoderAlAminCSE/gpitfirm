<!doctype html>
<html lang="en">

<head>
    @component('frontend/layouts.head', ['title' => 'Checkout - GP IT Firm'])
    @endcomponent

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .paypal-button {
            color: white;
            background-color: #0369a1 !important;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            /* Adding the following line to ensure the background color is visible */
            border: 1px solid blue;
            width: 250px !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: 16px !important;
            font-weight: 500 !important;
        }

        .stripe-button-el {
            border: none !important;
            margin-bottom: 15px !important;
            background-image: none !important;
            padding: 8px 16px !important;
            background: #38bdf8 !important;
            width: 250px !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: 16px !important;
            font-weight: 500 !important;
        }

        .stripe-button-el span {
            background: none !important;
            text-shadow: none !important;
            box-shadow: none !important;
            font-size: 16px !important;
            font-weight: 600 !important;
        }

        .paddle-button {
            color: white;
            background-color: #C39E08 !important;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            /* Adding the following line to ensure the background color is visible */
            border: 1px solid#C39E08 !important;
            width: 250px !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: 16px !important;
            font-weight: 500 !important;
        }
    </style>
    @paddleJS
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

    {{-- <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#paddle-pay-button").on("click", function(e) {
                e.preventDefault();

                // Define email and post_id here
                let email = "example@email.com";
                let post_id = 123;

                Paddle.Environment.set("sandbox");

                Paddle.Setup({
                    vendor: 13919,
                });

                Paddle.Checkout.open({
                    product: 12345,
                    email: email,
                    passthrough: 1939284,
                    successCallback: function(data) {
                        console.log(data);
                        alert("Thanks for the payment");

                        if (data.checkout.completed) {
                            let url = `${invoicelocal.apiurl}/sujan/v1/invoice`;

                            $.ajax({
                                url: url,
                                dataType: "json",
                                type: "Post",
                                async: true,
                                data: {
                                    post_id: post_id,
                                },
                                success: function(data) {
                                    location.reload(true);
                                },
                                error: function(xhr, exception) {
                                    var msg = "";
                                    if (xhr.status === 0) {
                                        msg =
                                            "could not connect.\n Verify Network." +
                                            xhr.responseText;
                                    } else if (xhr.status == 404) {
                                        msg = "Requested page not found. [404]" +
                                            xhr
                                            .responseText;
                                    } else if (xhr.status == 500) {
                                        msg = "Internal Server Error [500]." + xhr
                                            .responseText;
                                    } else if (exception === "parsererror") {
                                        msg = "Requested JSON parse failed.";
                                    } else if (exception === "timeout") {
                                        msg = "Time out error." + xhr.responseText;
                                    } else if (exception === "abort") {
                                        msg = "Ajax request aborted.";
                                    } else {
                                        msg = "Error:" + xhr.status + " " + xhr
                                            .responseText;
                                    }
                                },
                            });
                        }
                    },
                    closeCallback: function(data) {
                        console.log(data);
                    },
                });
            });
        });
    </script> --}}
</body>

</html>
