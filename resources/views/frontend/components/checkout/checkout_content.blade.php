<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="imjol">
                <div class="imjol-notices-wrapper"></div>
                <form name="checkout" method="post" class="checkout imjol-checkout"
                    action="{{ route('frontend.checkout.confirm') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4" id="customer_details">
                        @if (Auth::check())
                            <div class="col-md-6">
                                <div class="imjol-billing-fields">
                                    <h3>Account Info</h3>
                                    <div class="imjol-billing-fields__field-wrapper">
                                        <p class="form-row form-group validate-required" id="account_username_field"
                                            data-priority><label for="account_username" class="control-label">
                                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                                class="imjol-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="name"
                                                    id="account_username" placeholder="name"
                                                    value="{{ loggedInUser()->name }}" readonly /></span></p>

                                        <p class="form-row form-row-wide form-group validate-required validate-email"
                                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                                class="control-label">Email address&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="imjol-input-wrapper"><input type="email"
                                                    class="input-text form-control input" name="email"
                                                    id="billing_email" placeholder value="{{ loggedInUser()->email }}"
                                                    readonly /></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6">
                                <div class="imjol-billing-fields">
                                    <h3>Account Info</h3>
                                    <div class="imjol-billing-fields__field-wrapper">
                                        <p class="form-row form-group validate-required" id="account_username_field"
                                            data-priority>
                                            <label for="account_username" class="control-label">
                                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                                class="imjol-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="name"
                                                    id="account_username" placeholder="name"
                                                    value="{{ $userInfo['name'] }}" readonly />
                                            </span>
                                        </p>

                                        <p class="form-row form-row-wide form-group validate-required validate-email"
                                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                                class="control-label">Email&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="imjol-input-wrapper"><input type="email"
                                                    class="input-text form-control input" name="email"
                                                    id="billing_email" placeholder="email"
                                                    value="{{ $userInfo['email'] }}" readonly />
                                            </span>
                                        </p>

                                        <p class="form-row form-row-wide form-group validate-required validate-email"
                                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                                class="control-label">Address&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="imjol-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="address"
                                                    id="billing_email" placeholder="address"
                                                    value="{{ $userInfo['address'] }}" readonly />
                                            </span>
                                        </p>

                                        <p class="form-row form-group validate-required" id="account_password_field"
                                            data-priority>
                                            <label for="account_password" class="control-label">
                                                Account password&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label><span
                                                class="imjol-input-wrapper"><input type="text"
                                                    class="input-text form-control input" name="password"
                                                    id="account_password" value="{{ $userInfo['password'] }}"
                                                    placeholder="Password" readonly />
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6">
                            <h3 id="order_review_heading">Your order</h3>
                            <div id="order_review" class="imjol-checkout-review-order">
                                <table class="shop_table imjol-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (session('cart') as $service)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $service['name'] }}
                                                </td>
                                                <td class="product-total">
                                                    <span
                                                        class="imjol-Price-amount amount"><bdi>${{ $service['price'] }}</bdi></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span
                                                    class="imjol-Price-amount amount"><bdi>${{ number_format(session('subtotal'), 2) }}</bdi></span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span
                                                        class="imjol-Price-amount amount"><bdi>${{ number_format(session('total'), 2) }}</bdi></span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="amount" value="{{ session('total') }}">
                                <div class="wc-proceed-to-checkout">
                                    <div class="wc-proceed-to-checkout">
                                        @if (env('STRIPE_PAYMENT_ACTIVE') == 'YES')
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="{{ config('services.stripe.key') }}" data-amount={{ (int) session('total') * 100 }} data-name="Stripe"
                                                data-locale="auto" data-label="Pay With Stripe" data-zip-code="true" data-currency="{{ 'USD' }}"
                                                data-gateway="stripe"></script>
                                        @endif

                                        @if (env('PAYPAL_PAYMENT_ACTIVE') == 'YES')
                                            <button class="paypal-button capitalize" id="triggerButton">Pay With
                                                Paypal</button>
                                        @endif

                                        @if (env('PADDLE_PAYMENT_ACTIVE') == 'YES')
                                            <button class="paddle-button capitalize mt-2" id="paddle-pay-button">Pay
                                                With
                                                Paddle</button>
                                        @endif

                                    </div>
                                    {{-- <div>
                                        <x-paddle-button :url="$paylink" class="px-8 py-4">
                                            Buy
                                        </x-paddle-button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div>
                    <form action="{{ route('processPaypal') }}" method="get" class="d-none">
                        @csrf
                        <div>
                            @if (Auth::check())
                                <div class="col-md-6">
                                    <div class="imjol-billing-fields">
                                        <h3>Account Info</h3>
                                        <div class="imjol-billing-fields__field-wrapper">
                                            <p class="form-row form-group validate-required"
                                                id="account_username_field" data-priority><label
                                                    for="account_username" class="control-label">
                                                    Name&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label><span
                                                    class="imjol-input-wrapper"><input type="text"
                                                        class="input-text form-control input" name="name"
                                                        id="account_username" placeholder="name"
                                                        value="{{ loggedInUser()->name }}" readonly /></span></p>

                                            <p class="form-row form-row-wide form-group validate-required validate-email"
                                                id="billing_email_field" data-priority="110"><label
                                                    for="billing_email" class="control-label">Email&nbsp;<abbr
                                                        class="required" title="required">*</abbr></label><span
                                                    class="imjol-input-wrapper"><input type="email"
                                                        class="input-text form-control input" name="email"
                                                        id="billing_email" placeholder
                                                        value="{{ loggedInUser()->email }}" readonly /></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="imjol-billing-fields">
                                        <h3>Account Info</h3>
                                        <div class="imjol-billing-fields__field-wrapper">
                                            <p class="form-row form-group validate-required"
                                                id="account_username_field" data-priority>
                                                <label for="account_username" class="control-label">
                                                    Name&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label><span
                                                    class="imjol-input-wrapper"><input type="text"
                                                        class="input-text form-control input" name="name"
                                                        id="account_username" placeholder="name"
                                                        value="{{ $userInfo['name'] }}" readonly />
                                                </span>
                                            </p>

                                            <p class="form-row form-row-wide form-group validate-required validate-email"
                                                id="billing_email_field" data-priority="110"><label
                                                    for="billing_email" class="control-label">Email&nbsp;<abbr
                                                        class="required" title="required">*</abbr></label><span
                                                    class="imjol-input-wrapper"><input type="email"
                                                        class="input-text form-control input" name="email"
                                                        id="billing_email" placeholder="email"
                                                        value="{{ $userInfo['email'] }}" readonly />
                                                </span>
                                            </p>

                                            <p class="form-row form-row-wide form-group validate-required validate-email"
                                                id="billing_email_field" data-priority="110"><label
                                                    for="billing_email" class="control-label">Email&nbsp;<abbr
                                                        class="required" title="required">*</abbr></label><span
                                                    class="imjol-input-wrapper"><input type="text"
                                                        class="input-text form-control input" name="address"
                                                        id="billing_email" placeholder="address"
                                                        value="{{ $userInfo['address'] }}" readonly />
                                                </span>
                                            </p>

                                            <p class="form-row form-group validate-required"
                                                id="account_password_field" data-priority>
                                                <label for="account_password" class="control-label">
                                                    Account password&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label><span
                                                    class="imjol-input-wrapper"><input type="text"
                                                        class="input-text form-control input" name="password"
                                                        id="account_password" value="{{ $userInfo['password'] }}"
                                                        placeholder="Password" readonly />
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <input type="hidden" name="amount" value="{{ session('total') }}">
                        <input type="hidden" name="gateway" value="paypal">
                        <script src="https://www.paypal.com/sdk/js? client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
                        <button id="hiddenSubmitButton" class="btn btn-primary" type="submit">pay with
                            paypal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
