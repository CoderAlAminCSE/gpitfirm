<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/7cad351999.js" crossorigin="anonymous"></script>

    {{-- sujan sir's given code --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
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
    </script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .rs_container {
            max-width: 1024px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        /* responsive */

        @media (min-width: 768px) {
            .rs_container {
                padding-left: 50px;
                padding-right: 50px;
            }
        }

        @media (min-width: 576px) and (max-width: 767.99px) {
            p {
                font-size: 14px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            .rs_container {
                padding-left: 50px;
                padding-right: 50px;
            }

            .bill_area_wrapper {
                display: block !important;
            }

            .billed_to {
                margin-bottom: 30px;
                width: 220px;
                float: left;
            }

            .invoice_num {
                margin-bottom: 30px;
                margin-top: 0;
                width: 220px;
                float: right;
            }

            .invoice_of {
                text-align: start !important;
                overflow: hidden;
                width: 100%;
            }

            .invoice_of>p {
                margin-bottom: 10px;
            }

            .invoice_status {
                max-width: 182px;
            }

            .order_details_wrapper {
                display: block !important;
            }


            .order_details_title {
                margin-bottom: 30px;
            }

            .order_details_time {
                width: 48%;
                display: inline-block;
            }

            .order_details_time p {
                margin-bottom: 10px;
            }

            .item_details_header {
                display: block !important;
            }

            .item_details_header p:nth-child(1) {
                width: 69%;
                display: inline-block;
            }

            .item_details_header p:nth-child(2) {
                width: 30%;
                display: inline-block;
            }

            /* .item_details_body {
                display: block !important;
            } */

            .item_details_body div:nth-child(1) {
                grid-column: span 4 / span 4;
            }

            .item_details_body div:nth-child(2) {
                grid-column: span 2 / span 2;
            }
        }

        @media (max-width: 575.99px) {
            p {
                font-size: 14px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            .rs_container {
                padding-left: 50px;
                padding-right: 50px;
            }

            .bill_area_wrapper {
                display: block !important;
            }

            .billed_to {
                margin-bottom: 30px;
            }

            .invoice_num {
                margin-bottom: 30px;
            }

            .invoice_num p {
                margin-bottom: 10px;
            }

            .invoice_of {
                text-align: start !important;
                overflow: hidden;
                width: 100%;
            }

            .invoice_of>p {
                margin-bottom: 10px;
            }

            .invoice_status {
                max-width: 182px;
            }

            .order_details_wrapper {
                display: block !important;
            }


            .order_details_title {
                margin-bottom: 30px;
            }

            .order_details_time {
                width: 48%;
                display: inline-block;
            }

            .order_details_time p {
                margin-bottom: 10px;
            }

            .item_details_header {
                display: block !important;
            }

            .item_details_header p:nth-child(1) {
                width: 49%;
                display: inline-block;
            }

            .item_details_header p:nth-child(2) {
                width: 49%;
                display: inline-block;
            }

            .item_details_body {
                display: block !important;
            }

            .item_details_body p,
            h2,
            .item_details_price {
                padding: 10px !important;
            }

            .item_details_body div:nth-child(2) {
                border-left: 1px solid rgb(229 231 235 / var(--tw-border-opacity));
            }

            .summary_wrapper {
                display: block !important;
            }

            .summary_wrapper button {
                margin-bottom: 20px;
            }


        }

        .company_info {
            display: flex;
            align-items: center;
            margin-top: 40px;
        }

        .logo {
            width: 20%;
            /* Adjust the width as needed */
        }

        .spacer {
            width: 50%;
            /* Adjust the width as needed to create a blank space */
        }

        .address-container {
            width: 20%;
            /* Adjust the width as needed */
            display: flex;
            flex-direction: column;
        }

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

        .stripe-button-el {
            border: none !important;
            margin-bottom: 5px !important;
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
    </style>
    @paddleJS
</head>

<body>

    <!-- header-area -->
    <header class="bg-[#EDDFF9] pb-[20px]">
        <div class="rs_container">
            <strong
                class="w-[135px] block mx-auto bg-[#6600cc] text-white py-[13px] px-[40px] rounded-bl-[15px] rounded-br-[15px]">Invoice</strong>

            <div class="company_info flex justify-between mt-[20px]">
                <div class="logo">
                    <a href="">
                        <img src="{{ asset('storage/' . siteSetting('header_logo')) }}" alt="logo">
                    </a>
                </div>

                <div class="spacer"></div>

                <div class="address-container">
                    <p>{{ siteSetting('company_name') ?? null }}</p>
                    <p>{{ siteSetting('company_phone') ?? null }}</p>
                    <p>{{ siteSetting('company_email') ?? null }}</p>
                    <p>{{ siteSetting('company_website') ?? null }}</p>
                </div>
            </div>

        </div>
    </header>
    @if (Session::has('success'))
        <div class="alert alert-success m-3 text-center">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger m-3 text-center">
            {{ Session::get('error') }}
        </div>
    @endif
    <!-- bill-area -->
    <div class="bill_area py-[25px]">
        <div class="rs_container bill_area_wrapper flex justify-between">
            <div class="billed_to">
                <p class="bg-gray-200 text-[#6600cc] py-[4px] px-[8px] font-bold inline-block rounded-md mb-3">Billed
                    to</p>
                <p class="font-bold">{{ $invoice->user->name }}</p>
                <p class="font-bold">{{ $invoice->user->business_name }}</p>
                <p class="font-bold">{{ $invoice->user->email }}</p>
                <p class="font-bold">{{ $invoice->user->address }}</p>
            </div>
            <div style="margin-left: 18px;">
                <div class="invoice_num mt-5">
                    <p class="font-bold">Invoice Number</p>
                    <p class="mb-1">{{ $invoice->invoice_number }}</p>
                    @if ($invoice->custom_order_number)
                        <p class="font-bold">Order Number</p>
                        <p class="">{{ $invoice->custom_order_number }}</p>
                    @endif
                </div>
            </div>

            <div class="invoice_of text-end">
                <p class="bg-gray-200 text-[#6600cc] py-[4px] px-[8px] font-bold inline-block rounded-md mb-3">Invoice
                    of <span>(USD)</span></p>
                <h2 class="font-bold mb-4">${{ $invoice->order->total_amount }}</h2>
                <div class="invoice_status border-[1px] border-gray-500 rounded-md px-4 py-2 flex items-center gap-2">
                    <p class="font-bold leading-4">Status</p>
                    <div>
                        @if (orderInfo($invoice->order_id)->canceled_at != null)
                            <p class="unpaid  bg-red-500 py-1 px-4 text-white rounded-md">Cancaled</p>
                        @elseif (orderInfo($invoice->order_id)->payment_status == 1)
                            <p class="paid bg-lime-600 py-1 px-4 text-white rounded-md">Paid</p>
                        @else
                            <p class="unpaid  bg-orange-500 py-1 px-4 text-white rounded-md">Unpaid</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- order-details -->
    <div class="order_details pt-[15px]">
        <div class="rs_container order_details_wrapper flex justify-between">
            <p class="order_details_title font-bold">Order Details</p>
            <div class="order_details_time">
                <p class="font-bold">Invoice Date</p>
                <p class="">{{ $invoice->created_at->format('d F Y') }}</p>
            </div>
            @if ($invoice->order->payment_status == 0 && $invoice->order->canceled_at == null)
                <div class="order_details_time">
                    <p class="font-bold mb-1">Due Date</p>
                    <h2 class="">{{ $invoice->created_at->format('d F Y') }}</h2>
                </div>
            @endif
        </div>
    </div>

    <!-- item-details -->
    <div class="item_details py-[10px]">
        <div class="rs_container">
            <div class="item_details_header bg-gray-200 grid grid-cols-6">
                <p class="col-span-5 p-3 font-bold">Item Details</p>
                <p class="p-3 ml-4 font-bold">Amount</p>
            </div>
            @foreach ($invoice->order->items as $item)
                @if ($item->service_id == null)
                    <div
                        class="item_details_body grid grid-cols-6 border-l-[2px] border-r-[2px] border-b-[2px] border-gray-200 col-span-5">
                        <div class="border-l-[1px] border-r-[2px] border-b-[1px] border-gray-200 col-span-5">
                            <div>
                                <h2 class="border-b-[1px] border-gray-200 p-3">{{ $item->custom_service_name }}</h2>
                                <p class="p-3 font-[400]">{{ $item->custom_service_description }}</p>
                            </div>
                        </div>
                        <div
                            class="item_details_price border-r-[1px] border-b-[1px] border-gray-200 p-3 text-center flex items-center justify-center">
                            <p class="font-[400]">${{ $item->custom_service_price }}</p>
                        </div>
                    </div>
                @else
                    <div
                        class="item_details_body grid grid-cols-6 border-l-[2px] border-r-[2px] border-b-[2px] border-gray-200 col-span-5">
                        <div class="border-l-[1px] border-r-[2px] border-b-[1px] border-gray-200 col-span-5">
                            <div>
                                <h2 class="p-3">
                                    {{ serviceInfo($item->service_id)->name }}
                                </h2>
                            </div>

                        </div>
                        <div class="item_details_price border-r-[1px] border-b-[1px] border-gray-200 p-3 text-center">
                            <p class="font-[400]">${{ serviceInfo($item->service_id)->price }}</p>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    <!-- summary -->
    <div class="summary py-[10px]">
        <div class="rs_container summary_wrapper flex justify-between items-start">
            <a href="{{ route('customer.invoice.download', $invoice->id) }}">
                <button class="bg-fuchsia-200 py-2 px-4 rounded-md font-bold"> <i class="fa-solid fa-print"></i>
                    Download</button>
            </a>

            <div>
                <div class="py-3 px-10 bg-gray-200 rounded-md">
                    <span class="inline-block mr-10 pl-4 text-gray-700 font-[600]">Total</span>
                    <strong class="text-gray-700 font-[600] pl-1">${{ $invoice->order->total_amount }}</strong>

                </div>
                @if ($invoice->order->payment_status == 0 && $invoice->order->canceled_at == null)
                    <div class="mt-3">
                        @if (env('STRIPE_PAYMENT_ACTIVE') == 'YES')
                            <div>
                                <form action="{{ route('invoice.payment.confirm') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ config('services.stripe.key') }}" data-amount={{ $invoice->order->total_amount * 100 }}
                                        data-name="Stripe" data-locale="auto" data-label="Pay With Stripe" data-zip-code="true"
                                        data-currency="{{ 'USD' }}" data-gateway="stripe"></script>
                                </form>
                            </div>
                        @endif

                        @if (env('PAYPAL_PAYMENT_ACTIVE') == 'YES')
                            <div>
                                <form action="{{ route('invoice.processPaypal') }}" method="get">
                                    @csrf
                                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                    <input type="hidden" name="encryptedInvoice" value="{{ $encryptedInvoice }}">
                                    <script src="https://www.paypal.com/sdk/js? client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
                                    <button class="paypal-button capitalize" type="submit">pay with paypal</button>
                                </form>
                            </div>
                        @endif

                        @if (env('PADDLE_PAYMENT_ACTIVE') == 'YES')
                            <div>
                                <button class="paddle-button capitalize mt-2" id="paddle-pay-button">Pay With
                                    Paddle</button>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="mb-[60px] pt-[10px]">
        @if ($invoice->notes)
            <div class="rs_container">
                <p class="font-bold">Notes</p>
                <p>{{ $invoice->notes }}</p>
            </div>
        @endif
        <br>
        <div class="rs_container">
            <p class="font-bold">Terms & Conditions</p>
            <p>By using our e-commerce platform, you agree to our user responsibilities, product accuracy, payment,
                shipping, privacy,
                and liability terms. Thank you for shopping with us.
            </p>
        </div>
    </footer>


</body>

</html>
