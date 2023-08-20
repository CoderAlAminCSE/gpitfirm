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
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders is-active nav-item">
                                        <a href="{{ route('customer.account.order.list') }}" class="nav-link">Orders</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads nav-item">
                                        <a href="{{ route('customer.account.download.list') }}"
                                            class="nav-link">Downloads</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account nav-item">
                                        <a href="{{ route('customer.account.details') }}" class="nav-link">Account
                                            details</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout nav-item">
                                        <a onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                            class="nav-link">Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </nav>

                            <div class="woocommerce-MyAccount-content bottom-gap">
                                <div class="woocommerce-notices-wrapper"></div>
                                <table
                                    class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                    <thead>
                                        <tr>
                                            <th
                                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                                                <span class="nobr">Order Number</span>
                                            </th>
                                            <th
                                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date">
                                                <span class="nobr">Date</span>
                                            </th>
                                            <th
                                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                                                <span class="nobr">Status</span>
                                            </th>
                                            <th
                                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total">
                                                <span class="nobr">Total</span>
                                            </th>
                                            <th
                                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">
                                                <span class="nobr">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr
                                                class="woocommerce-orders-table__row woocommerce-orders-table__row--status-pending order">
                                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                                                    data-title="Order">
                                                    <a href="#">
                                                        {{ $order->order_number }} </a>
                                                </td>
                                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                                                    data-title="Date">
                                                    <time
                                                        datetime="2023-08-20T05:37:15+00:00">{{ $order->created_at->format('F d, Y') }}</time>
                                                </td>
                                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                                                    data-title="Status">
                                                    Pending payment
                                                </td>
                                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                                                    data-title="Total">
                                                    <span
                                                        class="woocommerce-Price-amount amount">${{ $order->total_amount }}</span>
                                                    for {{ $order->items->count() }}
                                                    items
                                                </td>
                                                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                                                    data-title="Actions">
                                                    <a href="https://gpitfirm.com/checkout/order-pay/356/?pay_for_order=true&#038;key=wc_order_DGdXwHbIjzIql"
                                                        class="woocommerce-button button pay">Pay</a><a
                                                        href="https://gpitfirm.com/my-account/view-order/356/"
                                                        class="woocommerce-button button view">View</a><a
                                                        href="https://gpitfirm.com/cart/?cancel_order=true&#038;order=wc_order_DGdXwHbIjzIql&#038;order_id=356&#038;redirect=https%3A%2F%2Fgpitfirm.com%2Fmy-account%2F&#038;_wpnonce=3b2f6a74cd"
                                                        class="woocommerce-button button cancel">Cancel</a>
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
