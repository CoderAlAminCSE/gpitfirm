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
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--downloads is-active nav-item">
                                        <a href="{{ route('customer.account.download.list') }}"
                                            class="nav-link">Downloads</a>
                                    </li>
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--edit-account nav-item">
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
                                <div class="imjol-Message imjol-Message--info imjol-info">
                                    <a class="imjol-Button button" href="/services">
                                        Browse products </a>
                                    No downloads available yet.
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
