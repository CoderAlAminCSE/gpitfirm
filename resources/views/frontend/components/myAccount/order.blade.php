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
                                <table
                                    class="imjol-orders-table imjol-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="imjol-orders-table__header imjol-orders-table__header-order-number">
                                                <span class="nobr">Order Number</span>
                                            </th>
                                            <th
                                                class="imjol-orders-table__header imjol-orders-table__header-order-date">
                                                <span class="nobr">Date</span>
                                            </th>
                                            <th
                                                class="imjol-orders-table__header imjol-orders-table__header-order-status">
                                                <span class="nobr">Status</span>
                                            </th>
                                            <th
                                                class="imjol-orders-table__header imjol-orders-table__header-order-total">
                                                <span class="nobr">Total</span>
                                            </th>
                                            <th
                                                class="imjol-orders-table__header imjol-orders-table__header-order-actions">
                                                <span class="nobr">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr
                                                class="imjol-orders-table__row imjol-orders-table__row--status-pending order">
                                                <td class="imjol-orders-table__cell imjol-orders-table__cell-order-number"
                                                    data-title="Order">
                                                    <a href="#">
                                                        {{ $order->order_number }} </a>
                                                </td>
                                                <td class="imjol-orders-table__cell imjol-orders-table__cell-order-date"
                                                    data-title="Date">
                                                    <time
                                                        datetime="2023-08-20T05:37:15+00:00">{{ $order->created_at->format('F d, Y') }}</time>
                                                </td>
                                                <td class="imjol-orders-table__cell imjol-orders-table__cell-order-status"
                                                    data-title="Status">
                                                    @if ($order->canceled_at != null)
                                                        Canceled
                                                    @elseif($order->payment_status == 1)
                                                        Confirmed
                                                    @else
                                                        Pending payment
                                                    @endif
                                                </td>
                                                <td class="imjol-orders-table__cell imjol-orders-table__cell-order-total"
                                                    data-title="Total">
                                                    <span
                                                        class="imjol-Price-amount amount">${{ $order->total_amount }}</span>
                                                    for {{ $order->items->count() }}
                                                    items
                                                </td>
                                                <td class="imjol-orders-table__cell imjol-orders-table__cell-order-actions"
                                                    data-title="Actions">
                                                    @if ($order->payment_status != 1 && $order->canceled_at == null)
                                                        <a href="#" class="imjol-button button pay">Pay</a>
                                                    @endif

                                                    <a href="{{ route('customer.account.order.details', $order->order_number) }}"
                                                        class="imjol-button button view">View</a>
                                                    @if ($order->canceled_at == null && $order->payment_status != 1)
                                                        <a href="{{ route('customer.account.order.cancel', $order->id) }}"
                                                            class="imjol-button button cancel">Cancel</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center">No data found.</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
