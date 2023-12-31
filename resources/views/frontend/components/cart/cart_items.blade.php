<section class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">



                @if (session('cart'))
                    <div class="imjol">
                        <div class="imjol-notices-wrapper"></div>
                        <table class="shop_table shop_table_responsive cart imjol-cart-form__contents"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (session('cart') as $service)
                                    <tr class="imjol-cart-form__cart-item cart_item">
                                        <td class="product-remove">
                                            <a href="" class="remove" data-service-id="{{ $service['id'] }}"
                                                aria-label="Remove this item">×</a href="">
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#">{{ $service['name'] }}</a>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="imjol-Price-amount amount"><bdi>${{ $service['price'] }}</bdi></span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            {{ $service['quantity'] }} <input type="hidden" value=""> </td>
                                        <td class="product-subtotal" data-title="Subtotal">
                                            <span class="imjol-Price-amount amount">
                                                <bdi>${{ $service['price'] }}</bdi></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        @include('frontend.components.cart.cart_total')
                    </div>
                @else
                    <div class="imjol">
                        <div class="imjol-notices-wrapper"></div>
                        <p class="cart-empty imjol-info">Your cart is currently empty.</p>
                        <p class="return-to-shop">
                            <a class="button wc-backward" href="/services">
                                Return to shop </a>
                        </p>
                    </div>
                @endif


            </div>
        </div>
    </div>
</section>
