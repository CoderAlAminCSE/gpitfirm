@extends('frontend.my_account')
@section('account_content')
    @if (Session::has('success'))
        <div class="alert alert-success m-3 text-center">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="main">
        <section class="ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="imjol">
                            <nav class="imjol-MyAccount-navigation bottom-gap">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--dashboard is-active nav-item">
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
                                <p>
                                    Hello <strong>{{ loggedInUser()->name }}</strong> (not
                                    <strong>{{ loggedInUser()->name }}</strong>? <a href="javascript:;"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                        out</a>)
                                </p>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <p>
                                    From your account dashboard you can view your <a
                                        href="{{ route('customer.account.order.list') }}">recent orders</a>,
                                    manage your and <a href="{{ route('customer.account.details') }}">edit your password
                                        and account details</a>.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
