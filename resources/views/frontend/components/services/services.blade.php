<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <header class="imjol-products-header">
                    </header>
                    <div class="imjol-notices-wrapper"></div>
                    <p class="imjol-result-count">
                        Showing all 6 results</p>
                    <form class="imjol-ordering" method="get">
                        <select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                        <input type="hidden" name="paged" value="1" />
                    </form>
                    <ul class="products columns-3">
                        @foreach (activeServices() as $service)
                            <li
                                class="gpitfrim_product product type-product post-130 status-publish last instock product_cat-link-building has-post-thumbnail virtual sold-individually purchasable product-type-simple">
                                <a href="{{ route('single.service.show', $service->slug) }}"
                                    class="imjol-LoopProduct-link imjol-loop-product__link"><img
                                        width="300" height="300"
                                        src="../wp-content/uploads/2022/07/Link-Building-DA-70-300x300.png"
                                        class="attachment-imjol_thumbnail size-imjol_thumbnail" alt
                                        decoding="async" loading="lazy"
                                        srcset="{{ !empty($service->image) ? asset('storage/' . $service->image) : ' ' }}"
                                        sizes="(max-width: 300px) 100vw, 300px" />
                                    <h2 class="imjol-loop-product__title">{{ $service->name }}</h2>
                                    <span class="price"><span
                                            class="imjol-Price-amount amount"><bdi>{{ $service->price }}<span
                                                    class="imjol-Price-currencySymbol">&#36;</span></bdi></span></span>
                                </a><a class="button wp-element-button product_type_simple add-to-cart"
                                    data-service-id="{{ $service->id }}" data-service-name="{{ $service->name }}"
                                    data-service-price="{{ $service->price }}">Buy
                                    Now</a>
                            </li>
                        @endforeach
                    </ul>
                </main>
            </div>
        </div>
    </div>
</div>
