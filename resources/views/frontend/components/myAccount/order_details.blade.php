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
                                        class="imjol-MyAccount-navigation-link imjol-MyAccount-navigation-link--orders is-active nav-item">
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
                                    Order Number: <mark class="order-number">{{ $order->order_number }}</mark> was placed on
                                    <mark class="order-date">{{ $order->created_at->format('F d, Y') }}</mark> and is
                                    currently <mark class="order-status">
                                        @if ($order->canceled_at != null)
                                            Canceled
                                        @elseif($order->payment_status == 1)
                                            Confirmed
                                        @else
                                            Pending payment
                                        @endif
                                    </mark>.
                                </p>
                                <section class="imjol-order-details">
                                    <h2 class="imjol-order-details__title">Order details</h2>
                                    <table
                                        class="imjol-table imjol-table--order-details shop_table order_details">
                                        <thead>
                                            <tr>
                                                <th class="imjol-table__product-name product-name">Product</th>
                                                <th class="imjol-table__product-table product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items as $item)
                                                <tr class="imjol-table__line-item order_item">
                                                    <td class="imjol-table__product-name product-name">
                                                        <a
                                                            href="{{ route('single.service.show', serviceInfo($item->service_id)->slug) }}">{{ serviceInfo($item->service_id)->name }}</a>
                                                    </td>
                                                    <td class="imjol-table__product-total product-total">
                                                        <span
                                                            class="imjol-Price-amount amount"><bdi>${{ serviceInfo($item->service_id)->price }}</bdi></span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="row">Subtotal:</th>
                                                <td><span
                                                        class="imjol-Price-amount amount">${{ $order->total_amount }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Total:</th>
                                                <td><span
                                                        class="imjol-Price-amount amount">${{ $order->total_amount }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </section>
                                <section class="imjol-customer-details">
                                    <h2 class="imjol-column__title">Billing address</h2>
                                    <address> Name: {{ loggedInUser()->name }}
                                        <p class=""> Email: {{ loggedInUser()->email }}
                                        </p>
                                    </address>
                                </section>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
