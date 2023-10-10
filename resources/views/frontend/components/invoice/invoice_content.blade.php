<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="imjol">
                <div class="imjol-notices-wrapper"></div>
                <form name="checkout" method="post" class="checkout imjol-checkout"
                    action="{{ route('invoice.payment.confirm') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-6" id="customer_details">
                        <div class="col-md-8">
                            @if ($invoice->order->payment_status == 0)
                                <h3 id="order_review_heading">Pay to complete the order</h3>
                            @else
                                <h3>Already paid</h3>
                            @endif

                            <div id="order_review" class="imjol-checkout-review-order">
                                <table class="shop_table imjol-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($invoice->order->items as $service)
                                            @if ($service->service_id == null)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $service->custom_service_name }}
                                                    </td>
                                                    <td class="product-total">
                                                        <span
                                                            class="imjol-Price-amount amount"><bdi>${{ $service->custom_service_price }}</bdi></span>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ serviceInfo($service->service_id)->name }}
                                                    </td>
                                                    <td class="product-total">
                                                        <span
                                                            class="imjol-Price-amount amount"><bdi>${{ serviceInfo($service->service_id)->price }}</bdi></span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span
                                                        class="imjol-Price-amount amount"><bdi>${{ $invoice->order->total_amount }}</bdi></span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="amount" value="{{ $invoice->order->total_amount }}">
                                <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                @if ($invoice->order->payment_status == 0)
                                    <div class="wc-proceed-to-checkout">
                                        <div class="wc-proceed-to-checkout">
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="{{ config('services.stripe.key') }}" data-amount={{ $invoice->order->total_amount * 100 }}
                                                data-name="Stripe" data-locale="auto" data-label="Pay With Stripe" data-zip-code="true"
                                                data-currency="{{ 'USD' }}" data-gateway="stripe"></script>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
