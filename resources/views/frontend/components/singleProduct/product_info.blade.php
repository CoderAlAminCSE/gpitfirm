<div class="container mt-4 pt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="woocommerce-notices-wrapper"></div>
            <div id="product-116"
                class="product type-product post-116 status-publish first instock product_cat-guest-posting has-post-thumbnail virtual sold-individually purchasable product-type-simple">
                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                    data-columns="4">
                    <figure class="woocommerce-product-gallery__wrapper">
                        <div data-thumb="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                            data-thumb-alt class="woocommerce-product-gallery__image"><a
                                href="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"><img
                                    width="600" height="600"
                                    src="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                                    class="wp-post-image" alt decoding="async" loading="lazy"
                                    title="Guest Posting DA 50+" data-caption
                                    data-src="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                                    data-large_image="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                                    data-large_image_width="800" data-large_image_height="800"
                                    srcset="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                                    sizes="(max-width: 600px) 100vw, 600px" /></a></div>
                    </figure>
                </div>
                <div class="summary entry-summary">
                    <h1 class="product_title entry-title">{{ $service->name }}</h1>
                    <p class="price"><span class="woocommerce-Price-amount amount"><bdi>{{ $service->price }}<span
                                    class="woocommerce-Price-currencySymbol">&#36;</span></bdi></span></p>
                    <div class="woocommerce-product-details__short-description">
                        {!! $service->description !!}
                    </div>
                    <form class="cart" action="https://gpitfirm.com/product/guest-posting-da-50/" method="post"
                        enctype="multipart/form-data">
                        <div class="quantity hidden">
                            <input type="hidden" id="quantity_64b8caa93696e" class="qty" name="quantity"
                                value="1" />
                        </div>
                        <button type="submit" name="add-to-cart" value="116"
                            class="single_add_to_cart_button button alt">Buy Now</button>
                    </form>
                    <div class="product_meta">
                        <span class="posted_in">Category: <a
                                href="{{ route('category.service.show', $service->category->slug) }}"
                                rel="tag">{{ $service->category->name }}</a></span>
                    </div>
                </div>
                <div class="woocommerce-tabs wc-tabs-wrapper">
                    <ul class="tabs wc-tabs" role="tablist">
                        <li class="description_tab" id="tab-title-description" role="tab"
                            aria-controls="tab-description">
                            <a>
                                Description </a>
                        </li>
                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                        role="tabpanel" aria-labelledby="tab-title-description">
                        {!! $service->description !!}
                    </div>
                </div>
                <section class="related products">
                    <h2>Related products</h2>
                    <ul class="products columns-4">
                        @foreach (categoryWiseServices($service->category->id) as $service)
                            <li
                                class="product type-product post-119 status-publish instock product_cat-guest-posting has-post-thumbnail virtual sold-individually purchasable product-type-simple">
                                <a href="{{ route('single.service.show', $service->slug) }}"
                                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img
                                        width="300" height="300"
                                        src="../../wp-content/uploads/2022/07/Guest-Posting-DA-60-300x300.png"
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt
                                        decoding="async" loading="lazy"
                                        srcset="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                                        sizes="(max-width: 300px) 100vw, 300px" />
                                    <h2 class="woocommerce-loop-product__title">{{ $service->name }}</h2>
                                    <span class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi>{{ $service->price }}<span
                                                    class="woocommerce-Price-currencySymbol">&#36;</span></bdi></span></span>
                                </a>
                                <a href="indexa21d.html?add-to-cart=119" data-quantity="1"
                                    class="button wp-element-button product_type_simple add_to_cart_button ajax_add_to_cart"
                                    data-product_id="119" data-product_sku
                                    aria-label="Add &ldquo;Guest Posting DA 60+&rdquo; to your cart" rel="nofollow">Buy
                                    Now</a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        </div>
    </div>
</div>
