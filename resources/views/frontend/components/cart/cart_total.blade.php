<form class="login-signup-form" action="{{ route('cart.order.place') }}" method="POST">
    @csrf

    <div class="mt-5">
        @if (Auth::check())
            <div class="col-md-7">
                <div class="woocommerce-billing-fields">
                    <h3>Billing details (Logged in)</h3>
                    <div class="woocommerce-billing-fields__field-wrapper">
                        <p class="form-row form-group validate-required" id="account_username_field" data-priority><label
                                for="account_username" class="control-label">
                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                class="woocommerce-input-wrapper"><input type="text"
                                    class="input-text form-control input" name="name" id="account_username"
                                    placeholder="name" value="{{ loggedInUser()->name }}" readonly /></span></p>

                        <p class="form-row form-row-wide form-group validate-required validate-email"
                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                class="control-label">Email address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input
                                    type="email" class="input-text form-control input" name="email"
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
                        <p class="form-row form-group validate-required" id="account_username_field" data-priority>
                            <label for="account_username" class="control-label">
                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                class="woocommerce-input-wrapper"><input type="text"
                                    class="input-text form-control input" name="name" id="account_username"
                                    placeholder="name" /></span>
                        </p>

                        <p class="form-row form-row-wide form-group validate-required validate-email"
                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                class="control-label">Email address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input
                                    type="email" class="input-text form-control input" name="email"
                                    id="billing_email" placeholder="email" required /></span>
                        </p>

                        <p class="form-row form-group validate-required" id="account_password_field" data-priority>
                            <label for="account_password" class="control-label">Create
                                account password&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                class="woocommerce-input-wrapper"><input type="text"
                                    class="input-text form-control input" name="password" id="account_password"
                                    placeholder="Password" required /></span>
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="cart-collaterals mt-5">
        <div class="cart_totals ">
            <h2>Cart totals</h2>
            <table cellspacing="0" class="shop_table shop_table_responsive">
                <tbody>
                    <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td data-title="Subtotal"><span>{{ number_format(session('subtotal'), 2) }}$</span>
                        </td>
                    </tr>
                    <tr class="order-total">
                        <th>Total</th>
                        <td data-title="Total"><strong>{{ number_format(session('total'), 2) }}<span>$</span></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="wc-proceed-to-checkout">
                <button type="submit" class="checkout-button button alt wc-forward">Proceed
                    to checkout
                </button>
            </div>
        </div>
    </div>
</form>
