<section class="ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">



                @if (session('cart'))
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>
                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (session('cart') as $service)
                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                        <td class="product-remove">
                                            <a href="" class="remove" data-service-id="{{ $service['id'] }}"
                                                aria-label="Remove this item">×</a href="">
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img width="300" height="300"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt="product image" loading="lazy" srcset=""
                                                    sizes="(max-width: 300px) 100vw,300px">
                                            </a>
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#">{{ $service['name'] }}</a>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>{{ number_format($service['price'], 2) }}
                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                </bdi>
                                            </span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            {{ $service['quantity'] }}
                                            <input type="hidden" value="">
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>{{ number_format($service['price'] * $service['quantity'], 2) }}
                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                </bdi>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        @include('frontend.components.cart.cart_total')
                    </div>
                @else
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>
                        <p class="cart-empty woocommerce-info">Your cart is currently empty.</p>
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
