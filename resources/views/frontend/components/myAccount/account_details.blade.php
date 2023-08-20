@extends('frontend.my_account')
@section('account_content')
    <div class="main">
        <section class="ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="woocommerce">
                            <nav class="woocommerce-MyAccount-navigation bottom-gap">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard nav-item">
                                        <a href="{{ route('customer.account') }}" class="nav-link">Dashboard</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders nav-item">
                                        <a href="{{ route('customer.account.order.list') }}" class="nav-link">Orders</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads nav-item">
                                        <a href="{{ route('customer.account.download.list') }}" class="nav-link">Downloads</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active nav-item">
                                        <a href="{{ route('customer.account.details') }}" class="nav-link">Account details</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout nav-item">
                                        <a href="#" class="nav-link">Logout</a>
                                    </li>
                                </ul>
                            </nav>


                            <div class="woocommerce-MyAccount-content bottom-gap">
                                <div class="woocommerce-notices-wrapper"></div>
                                <form class="woocommerce-EditAccountForm edit-account" action method="post">
                                    <div class="form-group">
                                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                            <label for="account_first_name">First name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="woocommerce-Input woocommerce-Input--text input-text form-control"
                                                name="account_first_name" id="account_first_name" autocomplete="given-name"
                                                value="test" />
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                            <label for="account_last_name">Last name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="woocommerce-Input woocommerce-Input--text input-text form-control"
                                                name="account_last_name" id="account_last_name"
                                                autocomplete="family-name" value="test" />
                                        </p>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="form-group">
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="account_display_name">Display name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="woocommerce-Input woocommerce-Input--text input-text form-control"
                                                name="account_display_name" id="account_display_name" value="stit" />
                                            <span><em>This will be how your name will be displayed in the account section
                                                    and in reviews</em></span>
                                        </p>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="form-group">
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="account_email">Email address&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="email"
                                                class="woocommerce-Input woocommerce-Input--email input-text form-control"
                                                name="account_email" id="account_email" autocomplete="email"
                                                value="softtechitcommon@gmail.com" />
                                        </p>
                                    </div>
                                    <fieldset>
                                        <legend>Password change</legend>
                                        <div class="form-group">
                                            <p
                                                class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password_current">Current password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password"
                                                    class="woocommerce-Input woocommerce-Input--password input-text form-control"
                                                    name="password_current" id="password_current" autocomplete="off" />
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p
                                                class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password_1">New password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password"
                                                    class="woocommerce-Input woocommerce-Input--password input-text form-control"
                                                    name="password_1" id="password_1" autocomplete="off" />
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p
                                                class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="password_2">Confirm new password</label>
                                                <input type="password"
                                                    class="woocommerce-Input woocommerce-Input--password input-text form-control"
                                                    name="password_2" id="password_2" autocomplete="off" />
                                            </p>
                                        </div>
                                    </fieldset>
                                    <div class="clear"></div>
                                    <p>
                                        <input type="hidden" id="save-account-details-nonce"
                                            name="save-account-details-nonce" value="67085a1977" /><input type="hidden"
                                            name="_wp_http_referer" value="/my-account/edit-account/" /> <button
                                            type="submit" class="woocommerce-Button button" name="save_account_details"
                                            value="Save changes">Save changes</button>
                                        <input type="hidden" name="action" value="save_account_details" />
                                    </p>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
