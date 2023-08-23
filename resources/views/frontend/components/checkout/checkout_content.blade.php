<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <form name="checkout" method="post" class="checkout woocommerce-checkout"
                    action="{{ route('frontend.checkout.confirm', $order->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4" id="customer_details">
                        <div class="col-md-5">
                            <h3 id="order_review_heading">Your order</h3>
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ serviceInfo($item->service_id)->name }}
                                                </td>
                                                <td class="product-total">
                                                    <span
                                                        class="woocommerce-Price-amount amount"><bdi>${{ serviceInfo($item->service_id)->price }}</bdi></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="woocommerce-Price-amount amount"><bdi>${{ number_format($order->total_amount, 2) }}</bdi></span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span
                                                        class="woocommerce-Price-amount amount"><bdi>${{ number_format($order->total_amount, 2) }}</bdi></span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_smartpay_paddle">
                                            <input id="payment_method_smartpay_paddle" type="radio"
                                                class="input-radio" name="payment_method" value="smartpay_paddle"
                                                checked="checked" data-order_button_text />
                                            <label for="payment_method_smartpay_paddle">
                                                Paddle <img
                                                    src="https://gpitfirm.com/wp-content/plugins/wp-smartpay-woo/assets/images/paddle_logo.png"
                                                    alt="Paddle" /> </label>
                                            <div class="payment_box payment_method_smartpay_paddle">
                                                <p>Pay with Paddle.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order">
                                        <noscript>
                                            Since your browser does not support JavaScript, or it is disabled,
                                            please ensure you click the <em>Update Totals</em> button before placing
                                            your order. You may be charged more than the amount stated above if you
                                            fail to do so. <br /><button type="submit" class="button alt"
                                                name="woocommerce_checkout_update_totals" value="Update totals">Update
                                                totals</button>
                                        </noscript>
                                        <div class="woocommerce-terms-and-conditions-wrapper">
                                            <div class="woocommerce-privacy-policy-text">
                                                <p>Your personal data will be used to process your order, support
                                                    your experience throughout this website, and for other purposes
                                                    described in our <a href class="woocommerce-privacy-policy-link"
                                                        target="_blank">privacy policy</a>.</p>
                                            </div>
                                        </div>
                                        <button type="submit" class="button alt"
                                            name="woocommerce_checkout_place_order" id="place_order" value="Place order"
                                            data-value="Place order">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
