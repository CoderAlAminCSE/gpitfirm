<form class="login-signup-form" action="{{ route('cart.order.place') }}" method="POST">
    @csrf
    <div class="mt-5">
        @if (Auth::check())
            <div class="col-md-7">
                <div class="imjol-billing-fields">
                    <h3>Account Info</h3>
                    <div class="imjol-billing-fields__field-wrapper">
                        <p class="form-row form-group validate-required" id="account_username_field" data-priority><label
                                for="account_username" class="control-label">
                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                class="imjol-input-wrapper"><input type="text"
                                    class="input-text form-control input" name="name" id="account_username"
                                    placeholder="name" value="{{ loggedInUser()->name }}" readonly /></span></p>

                        <p class="form-row form-row-wide form-group validate-required validate-email"
                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                class="control-label">Email address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label><span class="imjol-input-wrapper"><input
                                    type="email" class="input-text form-control input" name="email"
                                    id="billing_email" placeholder value="{{ loggedInUser()->email }}"
                                    readonly /></span>
                        </p>
                    </div>
                    <button type="submit" class="button alt" id="place_order" value="Place order"
                        data-value="Place order">Place order</button>
                </div>
            </div>
        @else
            <div class="col-md-7">

                <div class="imjol-billing-fields">

                    <div class="">
                        <div class="imjol-info">
                            Already have an account? <a href="{{ route('login') }}" class="showlogin">Click here to
                                login</a> </div>
                    </div>

                    <h3>Don't have account? Fill up to proceed</h3>
                    <div class="imjol-billing-fields__field-wrapper">
                        <p class="form-row form-group validate-required" id="account_username_field" data-priority>
                            <label for="account_username" class="control-label">
                                Name&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                class="imjol-input-wrapper"><input type="text"
                                    class="input-text form-control input" name="name" id="account_username"
                                    placeholder="name" value="{{ old('name') }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </span>
                        </p>

                        <p class="form-row form-row-wide form-group validate-required validate-email"
                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                class="control-label">Email address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label><span class="imjol-input-wrapper"><input
                                    type="email" class="input-text form-control input" name="email"
                                    id="billing_email" placeholder="email" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </span>
                        </p>

                        <p class="form-row form-row-wide form-group validate-required validate-email"
                            id="billing_email_field" data-priority="110"><label for="billing_email"
                                class="control-label">Address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label><span class="imjol-input-wrapper"><input
                                    type="text" class="input-text form-control input" name="address"
                                    id="billing_email" placeholder="ex: 3455 Geraldine Lane, New York 10013 United States" value="{{ old('address') }}" />
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </span>
                        </p>

                        <p class="form-row form-group validate-required" id="account_password_field" data-priority>
                            <label for="account_password" class="control-label">Create
                                account password&nbsp;<abbr class="required" title="required">*</abbr></label><span
                                class="imjol-input-wrapper"><input type="text"
                                    class="input-text form-control input" name="password" id="account_password"
                                    placeholder="Password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </span>
                        </p>
                    </div>
                    <button type="submit" class="button alt" id="place_order" value="Place order"
                        data-value="Place order">Place order</button>
                </div>
            </div>
        @endif
    </div>
</form>
