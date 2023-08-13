<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="#"
                    enctype="multipart/form-data">
                    <div class="row mb-4" id="customer_details">

                        @if (Auth::check())
                            <div class="col-md-7">
                                <div class="woocommerce-billing-fields">
                                    <h3>Billing details (Logged in)</h3>
                                    <div class="woocommerce-billing-fields__field-wrapper">
                                        <p class="form-row form-group validate-required" id="account_username_field"
                                            data-priority><label for="account_username" class="control-label">
                                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="name"
                                                    id="account_username" placeholder="name"
                                                    value="{{ loggedInUser()->name }}" readonly /></span></p>

                                        <p class="form-row form-row-wide form-group validate-required validate-email"
                                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                                class="control-label">Email address&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="email"
                                                    class="input-text form-control input" name="email"
                                                    id="billing_email" placeholder value="{{ loggedInUser()->email }}"
                                                    readonly /></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-7">
                                <div class="woocommerce-billing-fields">
                                    <h3>Billing details (Not logged in)</h3>
                                    <div class="woocommerce-billing-fields__field-wrapper">
                                        <p class="form-row form-group validate-required" id="account_username_field"
                                            data-priority><label for="account_username" class="control-label">
                                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="name"
                                                    id="account_username" placeholder="name" /></span></p>

                                        <p class="form-row form-row-wide form-group validate-required validate-email"
                                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                                class="control-label">Email address&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="email"
                                                    class="input-text form-control input" name="email"
                                                    id="billing_email" placeholder="email" required /></span>
                                        </p>

                                        <p class="form-row form-group validate-required" id="account_password_field"
                                            data-priority><label for="account_password" class="control-label">Create
                                                account password&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="woocommerce-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="password"
                                                    id="account_password" placeholder="Password" required /></span></p>
                                    </div>
                                </div>
                            </div>
                        @endif





                        <div class="col-md-5">
                            <h3 id="order_review_heading">Your order</h3>
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Subtotal</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (session('cart'))
                                            @foreach (session('cart') as $service)
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        {{ $service['name'] }} <strong
                                                            class="product-quantity">&times;&nbsp;{{ $service['quantity'] }}</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($service['price'] * $service['quantity'], 2) }}<span
                                                                    class="woocommerce-Price-currencySymbol">&#36;</span></bdi></span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="woocommerce-Price-amount amount"><bdi>{{ number_format(session('subtotal'), 2) }}<span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span></bdi></span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span
                                                        class="woocommerce-Price-amount amount"><bdi>{{ number_format(session('total'), 2) }}<span
                                                                class="woocommerce-Price-currencySymbol">&#36;</span></bdi></span></strong>
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
                                            name="woocommerce_checkout_place_order" id="place_order"
                                            value="Place order" data-value="Place order">Place order</button>
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
