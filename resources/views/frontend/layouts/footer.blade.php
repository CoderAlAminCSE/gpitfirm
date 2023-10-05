<footer class="footer-section">
    <div class="footer-top gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="row footer-top-wrap">
                        <div class="col-md-6 col-sm-6">
                            <div class="footer-nav-wrap text-white">
                                <a href="/"><img src="{{ asset('storage/' . siteSetting('header_logo')) }}"
                                        alt="logo" class="mb-2"></a>
                                <p>{{ siteSetting('about_description') ?? null }}</p>
                                <div class="social-nav mt-4">
                                    <ul class="list-unstyled social-list mb-0">
                                        <li class="list-inline-item tooltip-hover">
                                            <a href="{{ siteSetting('facebook') ?? null }}" class="rounded"
                                                target="_blank"><span class="ti-facebook"></span></a>
                                            <div class="tooltip-item">Facebook</div>
                                        </li>
                                        <li class="list-inline-item tooltip-hover"><a
                                                href="{{ siteSetting('twitter') ?? null }}" class="rounded"
                                                target="_blank"><span class="ti-twitter"></span></a>
                                            <div class="tooltip-item">Twitter</div>
                                        </li>
                                        <li class="list-inline-item tooltip-hover"><a
                                                href="{{ siteSetting('linkedin') ?? null }}" class="rounded"
                                                target="_blank"><span class="ti-linkedin"></span></a>
                                            <div class="tooltip-item">Linkedin</div>
                                        </li>
                                        <li class="list-inline-item tooltip-hover"><a
                                                href="{{ siteSetting('google') ?? null }}" class="rounded"
                                                target="_blank"><span class="ti-google"></span></a>
                                            <div class="tooltip-item">Google+</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">Quick Links</h4>
                                <div class="menu-footer-menu-1-container">
                                    <ul id="menu-footer-menu-1" class="nav flex-column">
                                        <li id="menu-item-131"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-131">
                                            <a href="/services">Services</a>
                                        </li>
                                        <li id="menu-item-107"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-107">
                                            <a href="/my-account">My account</a>
                                        </li>
                                        <li id="menu-item-124"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-124">
                                            <a href="/cart">Cart</a>
                                        </li>
                                        <li id="menu-item-110"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-110">
                                            <a href="/faq">FAQ</a>
                                        </li>
                                        <li id="menu-item-109"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-109">
                                            <a href="/contact">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">Important Links</h4>
                                <div class="menu-footer-menu-2-container">
                                    <ul id="menu-footer-menu-2" class="nav flex-column">
                                        <li id="menu-item-192"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-192">
                                            <a href="/refund">Refund</a>
                                        </li>
                                        <li id="menu-item-184"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184">
                                            <a href="/privacy-policy">Privacy Policy</a>
                                        </li>
                                        <li id="menu-item-297"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-297">
                                            <a href="/reseller-rules">Reseller Rules</a>
                                        </li>
                                        <li id="menu-item-185"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-185">
                                            <a href="/terms-condition">Terms &#038; Condition</a>
                                        </li>
                                        @foreach (activeCategory() as $category)
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                <a
                                                    href="{{ route('category.service.show', $category->slug) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="row footer-top-wrap mt-md-4 mt-sm-0 mt-lg-0">
                        <div class="col-12">
                            <div class="footer-nav-wrap text-white">
                                <h4 class="text-white">GP IT FIRM</h4>
                                <ul class="get-in-touch-list">
                                    <li class="d-flex align-items-center py-2"><span
                                            class="fas fa-map-marker-alt mr-2"></span>
                                        <p><b>USA Location:</b> {{ siteSetting('usa_location') ?? null }}</p>
                                    </li>
                                    <li class="d-flex align-items-center py-2"><span
                                            class="fas fa-map-marker-alt mr-2"></span>
                                        <p><b>BD office:</b> {{ siteSetting('company_address') ?? null }}</p>
                                    </li>
                                    <li class="d-flex align-items-center py-2"><span
                                            class="fas fa-envelope mr-2"></span>
                                        <a href="{{ siteSetting('company_email') ?? null }}">
                                            <p>{{ siteSetting('company_email') ?? null }}</p>
                                        </a>
                                    </li>
                                    <li class="d-flex align-items-center py-2"><span
                                            class="fas fa-phone-alt mr-2"></span>
                                        <p>{{ siteSetting('company_phone') ?? null }}</p>
                                    </li>
                                    <li class="d-flex align-items-center py-2"><span class="ti-skype mr-2"></span><a
                                            href="{{ siteSetting('skype') ?? null }}">Join with us by SKYPE</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom gray-light-bg py-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-12 col-lg-12 text-center">
                    <p class="copyright-text pb-0 mb-0">Copyright © 2023 <a href="/">GP IT FIRM LTD</a></p>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <!-- <span class="ti-angle-up"></span> -->
    <i class="fa-solid fa-chevron-up"></i>
</button>

<!-- footer-scripts -->
<script data-cfasync="false" src="{{ asset('assets/frontend/js/vendor/email-decode.min.js
') }}"></script>

<!-- contact-form-7 -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/vendor/contact-form-7.js
') }}" id="swv-js"></script>

<!-- jquery-blockui-js -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/vendor/jquery.blockUI.min.js
') }}"
    id="jquery-blockui-js"></script>

<!-- js-cookie-js -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/vendor/woocommerce/js.cookie.min.js
') }}"
    id="js-cookie-js"></script>

<!-- woocommerce.min.js -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/vendor/woocommerce/woocommerce.min.js
') }} "
    id="woocommerce-js"></script>

<!-- wc-cart-fragments-js -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/vendor/woocommerce/cart-fragments.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/typed.min.js') }}" id="typed-js-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/popper.min.js') }}" id="popper-js-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}" id="bootstrap-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/wow.min.html') }}" id="wow-js-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}" id="owl-carousel-js">
</script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/datatables.js') }} " id="data-table-js-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/dataTables.responsive.min.js') }}"
    id="data-table-responsive-js-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/responsive.bootstrap.min.js') }}"
    id="data-table-responsive-bootstrap-js-js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/scripts.js') }}" id="scripts-js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".add-to-cart").on("click", function() {
            const serviceId = $(this).data("service-id");
            const serviceName = $(this).data("service-name");
            const servicePrice = $(this).data("service-price");

            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                data: {
                    service_id: serviceId,
                    service_name: serviceName,
                    service_price: servicePrice,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.exist == 'yes') {
                        alert('Service already exists in the cart');
                    } else {
                        // console.log(response);
                        $('.cart_totals').html(response.cartTotalsHtml);
                        window.location.href = response.redirect_url;
                    }

                },
                error: function(error) {
                    alert("Error adding to cart. Please try again.");
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.remove').click(function() {
            const serviceId = $(this).data('service-id');

            $.ajax({
                url: '{{ route('removeFromCart') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    service_id: serviceId
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(error) {
                    console.error('Error removing item from cart:', error);
                }
            });
        });
    });
</script>
