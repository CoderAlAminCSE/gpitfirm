@extends('frontend.my_account')
@section('account_content')
    <div class="main">
        <section class="ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="imjol">
                            <nav class="imjol-MyAccount-navigation bottom-gap">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--dashboard nav-item">
                                        <a href="{{ route('customer.account') }}" class="nav-link">Dashboard</a>
                                    </li>
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--orders nav-item">
                                        <a href="{{ route('customer.account.order.list') }}" class="nav-link">Orders</a>
                                    </li>
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--downloads nav-item">
                                        <a href="{{ route('customer.account.download.list') }}"
                                            class="nav-link">Downloads</a>
                                    </li>
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--edit-account is-active nav-item">
                                        <a href="{{ route('customer.account.details') }}" class="nav-link">Account
                                            details</a>
                                    </li>
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--customer-logout nav-item">
                                        <a onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                            class="nav-link">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </nav>


                            <div class="imjol-MyAccount-content bottom-gap">
                                <div class="imjol-notices-wrapper"></div>
                                <form class="imjol-EditAccountForm edit-account"
                                    action="{{ route('customer.account.update', Auth::user()->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <p class="imjol-form-row imjol-form-row--first form-row form-row-first">
                                            <label for="account_first_name">First name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="imjol-Input imjol-Input--text input-text form-control"
                                                name="fname" id="account_first_name" autocomplete="given-name"
                                                value="{{ loggedInUser()->fname }}" />
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <p class="imjol-form-row imjol-form-row--last form-row form-row-last">
                                            <label for="lname">Last name&nbsp;<span class="required">*</span></label>
                                            <input type="text"
                                                class="imjol-Input imjol-Input--text input-text form-control"
                                                name="lname" id="account_last_name" autocomplete="family-name"
                                                value="{{ loggedInUser()->lname }}" />
                                        </p>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="form-group">
                                        <p class="imjol-form-row imjol-form-row--wide form-row form-row-wide">
                                            <label for="account_display_name">Display name&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text"
                                                class="imjol-Input imjol-Input--text input-text form-control"
                                                name="name" id="account_display_name"
                                                value="{{ loggedInUser()->name }}" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <span><em>This will be how your name will be displayed in the account section
                                                    and in reviews</em></span>
                                        </p>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="form-group">
                                        <p class="imjol-form-row imjol-form-row--wide form-row form-row-wide">
                                            <label for="account_email">Email address&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="email"
                                                class="imjol-Input imjol-Input--email input-text form-control"
                                                name="email" id="account_email" autocomplete="email"
                                                value="{{ loggedInUser()->email }}" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </p>
                                    </div>
                                    <fieldset>
                                        <legend>Password change</legend>
                                        <div class="form-group">
                                            <p
                                                class="imjol-form-row imjol-form-row--wide form-row form-row-wide">
                                                <label for="password_current">Current password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password"
                                                    class="imjol-Input imjol-Input--password input-text form-control"
                                                    name="password_current" id="password_current" autocomplete="off" />
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p
                                                class="imjol-form-row imjol-form-row--wide form-row form-row-wide">
                                                <label for="password_1">New password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password"
                                                    class="imjol-Input imjol-Input--password input-text form-control"
                                                    name="password_1" id="password_1" autocomplete="off" />
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <p
                                                class="imjol-form-row imjol-form-row--wide form-row form-row-wide">
                                                <label for="password_2">Confirm new password</label>
                                                <input type="password"
                                                    class="imjol-Input imjol-Input--password input-text form-control"
                                                    name="password_2" id="password_2" autocomplete="off" />
                                            </p>
                                        </div>
                                    </fieldset>
                                    <div class="clear"></div>
                                    <p>
                                        <button type="submit" class="imjol-Button button"
                                            name="save_account_details" value="Save changes">Save changes</button>
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
