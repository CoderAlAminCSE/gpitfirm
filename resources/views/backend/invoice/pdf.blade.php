<!DOCTYPE html>
<html>

<head>
    <title>Invoice #{{ $invoice->invoice_number }}</title>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px;">
    <div style="text-align: start; display: flex; justify-content: space-between;">
        <div style="text-align: start;">
            <h1 style="margin-top: 0;">GPITFIRM</h1>
        </div>
    </div>
    <hr style="border: none; border-top: 2px solid #ccc; margin-top: 20px; margin-bottom: 20px;">
    <div style="text-align: start; margin-top: 30px;">
        <div style="width: 45%; display: inline-block; vertical-align: top;">
            <p style="margin-top: 0; margin-bottom: 5px;"> Invoice #{{ $invoice->invoice_number }}</p>
            <p style="margin-top: 0; margin-bottom: 5px;"> Order #{{ $invoice->order->order_number }}</p>
            <p style="margin-top: 0; margin-bottom: 5px;"> Invoice Date:
                {{ \Carbon\Carbon::parse($invoice->created_at)->format('d-m-Y h:i:s A') }}</p>
        </div>
        <div style="text-align: end; width: 45%; display: inline-block; vertical-align: top;">
            <p style="margin-top: 0; margin-bottom: 5px;">
                @if (orderInfo($invoice->order_id)->canceled_at != null)
                    <strong>Canceled</strong>
                @elseif (orderInfo($invoice->order_id)->payment_status == 1)
                    <strong>Paid</strong>
                @else
                    <strong>Unpaid</strong>
                @endif
            </p>
        </div>
    </div>
    <div style="text-align: start; margin-top: 40px;">
        <div style="width: 45%; display: inline-block; vertical-align: top;">
            <h3 style="margin-top: 0;">Invoice To</h3>
            <p style="margin-top: 0; margin-bottom: 5px;"> {{ $invoice->user->name }}</p>
            <p style="margin-top: 0; margin-bottom: 5px;"> {{ $invoice->user->email }} </p>
            <p style="margin-top: 0; margin-bottom: 5px;"> {{ $invoice->user->address }}</p>
        </div>
        <div style="width: 45%; display: inline-block; vertical-align: top;">
            <h3 style="margin-top: 0;">Pay To </h3>
            <p style="margin-top: 0; margin-bottom: 5px;">GPITFIRM</p>
            <p style="margin-top: 0; margin-bottom: 5px;">{{ $company_phone }} </p>
            <p style="margin-top: 0; margin-bottom: 5px;">{{ $company_email }} </p>
            <p style="margin-top: 0; margin-bottom: 5px;">{{ $company_website }} </p>
        </div>
    </div>
    <table style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ccc; padding: 5px; text-align: left;">Description</th>
                <th style="border: 1px solid #ccc; padding: 5px; padding-right: 5px; text-align: right;">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->order->items as $item)
                @if ($item->service_id == null)
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 5px;">{{ $item->custom_service_name }}</td>
                        <td style="border: 1px solid #ccc; padding: 5px;padding-right: 5px; text-align: right;">
                            ${{ $item->custom_service_price }}</td>
                    </tr>
                @else
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 5px;">{{ serviceInfo($item->service_id)->name }}
                        </td>
                        <td style="border: 1px solid #ccc; padding: 5px;padding-right: 5px; text-align: right;">
                            ${{ serviceInfo($item->service_id)->price }}</td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>

    <div style="background-color: #E5E7EB; margin-top:15px; padding: 12px 40px; border-radius: 8px; text-align: right;">
        <span style="margin-right: 10px; color: #777777; font-weight: 500;">Total</span>
        <strong style="font-size: 1rem;">${{ $invoice->order->total_amount }}</strong>
    </div>
    @php
        $appUrl = env('APP_URL');
        $invoiceLink = $invoice->link;
        $fullUrl = $appUrl . '/invoice/' . $invoiceLink;
    @endphp
    <div class="summary" style="padding-top: 25px;">
        <div class="rs_container" style="display: flex; justify-content: flex-end; align-items: center;">
            <div>
                @if ($invoice->order->payment_status == 0 && $invoice->order->canceled_at == null)
                    <div style="margin-top: 16px;">
                        @if (env('STRIPE_PAYMENT_ACTIVE') == 'YES')
                            <div>
                                <a style="text-decoration: none" href="{{ $fullUrl }}">
                                    <button
                                        style="color: white; background-color: #44c464; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; border: 1px solid #44c464; width: 250px; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500;">Pay
                                        With Stripe</button>
                                </a>
                            </div>
                        @endif
                        @if (env('PAYPAL_PAYMENT_ACTIVE') == 'YES')
                            <div>
                                <a style="text-decoration: none" href="{{ $fullUrl }}">
                                    <button
                                        style=" color: white; background-color: #0369a1; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; border: 1px solid #0369a1; width: 250px; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500;">Pay
                                        With Paypal</button>
                                </a>

                            </div>
                        @endif
                        @if (env('PADDLE_PAYMENT_ACTIVE') == 'YES')
                            <div>
                                <a style="text-decoration: none" href="{{ $fullUrl }}">
                                    <button
                                        style="color: white; background-color: #C39E08; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; border: 1px solid #C39E08; width: 250px; font-family: 'Poppins', sans-serif; font-size: 16px; font-weight: 500;">Pay
                                        With Paddle</button>
                                </a>

                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer style="margin-bottom: 30px; padding-top: 50px;">
        @if ($invoice->notes)
            <div class="rs_container">
                <p style="font-weight: 500; margin-bottom: 1rem;">Notes</p>
                <p>{{ $invoice->notes }}</p>
            </div>
        @endif
    </footer>
    <div style="margin-top: 10px;">
        <p> PDF Generated Date: {{ \Carbon\Carbon::now()->format('d-m-Y h:i:s A') }}</p>
    </div>
</body>

</html
