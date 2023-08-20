<div class="main">
    <section class="ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="woocommerce">
                        <nav class="woocommerce-MyAccount-navigation bottom-gap">
                            <ul class="nav nav-pills flex-column mb-auto">
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active nav-item">
                                    <a href="{{ route('customer.account') }}" class="nav-link">Dashboard</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders nav-item">
                                    <a href="#" class="nav-link">Orders</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads nav-item">
                                    <a href="#" class="nav-link">Downloads</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account nav-item">
                                    <a href="#" class="nav-link">Account details</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout nav-item">
                                    <a href="#" class="nav-link">Logout</a>
                                </li>
                            </ul>
                        </nav>


                        <div class="woocommerce-MyAccount-content bottom-gap">
                            <div class="woocommerce-notices-wrapper"></div>
                            <p>
                                Hello <strong>stit</strong> (not <strong>stit</strong>? <a href="#">Log
                                    out</a>)</p>
                            <p>
                                From your account dashboard you can view your <a href="#">recent orders</a>,
                                manage your <a href="#">shipping
                                    and
                                    billing addresses</a>, and <a href="#">edit your password
                                    and account details</a>.</p>
                        </div>

                        <div class="woocommerce-MyAccount-content bottom-gap">
                            <div class="woocommerce-notices-wrapper"></div>
                            <table
                                class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                <thead>
                                    <tr>
                                        <th
                                            class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                                            <span class="nobr">Order</span>
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
                                    <tr
                                        class="woocommerce-orders-table__row woocommerce-orders-table__row--status-pending order">
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                                            data-title="Order">
                                            <a href="https://gpitfirm.com/my-account/view-order/356/">
                                                #356 </a>
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                                            data-title="Date">
                                            <time datetime="2023-08-20T05:37:15+00:00">August 20, 2023</time>
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                                            data-title="Status">
                                            Pending payment
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                                            data-title="Total">
                                            <span class="woocommerce-Price-amount amount">1,400.00<span
                                                    class="woocommerce-Price-currencySymbol">&#036;</span></span> for 2
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
                                    <tr
                                        class="woocommerce-orders-table__row woocommerce-orders-table__row--status-cancelled order">
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                                            data-title="Order">
                                            <a href="https://gpitfirm.com/my-account/view-order/352/">
                                                #352 </a>
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                                            data-title="Date">
                                            <time datetime="2023-08-13T09:04:27+00:00">August 13, 2023</time>
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                                            data-title="Status">
                                            Cancelled
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                                            data-title="Total">
                                            <span class="woocommerce-Price-amount amount">700.00<span
                                                    class="woocommerce-Price-currencySymbol">&#036;</span></span> for 1
                                            item
                                        </td>
                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                                            data-title="Actions">
                                            <a href="https://gpitfirm.com/my-account/view-order/352/"
                                                class="woocommerce-button button view">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="woocommerce-MyAccount-content bottom-gap">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
                                <a class="woocommerce-Button button" href="https://gpitfirm.com/services/">
                                    Browse products </a>
                                No downloads available yet.
                            </div>
                        </div>

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
