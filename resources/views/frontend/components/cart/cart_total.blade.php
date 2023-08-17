<div class="cart-collaterals mt-5">
    <div class="cart_totals ">
        <h2>Cart totals</h2>
        <table cellspacing="0" class="shop_table shop_table_responsive">
            <tbody>
                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td data-title="Subtotal"><span>{{ number_format(session('subtotal'), 2) }}$</span>
                    </td>
                </tr>
                <tr class="order-total">
                    <th>Total</th>
                    <td data-title="Total"><strong>{{ number_format(session('total'), 2) }}<span>$</span></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="wc-proceed-to-checkout">
            <a href="{{ route('frontend.service.checkout') }}"class="checkout-button button alt wc-forward">Proceed
                to checkout
            </a>
        </div>
    </div>
</div>
