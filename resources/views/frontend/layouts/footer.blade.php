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
                                        <li class="list-inline-item tooltip-hover"><a href="{{ siteSetting('twitter') ?? null }}" class="rounded"
                                                target="_blank"><span class="ti-twitter"></span></a>
                                            <div class="tooltip-item">Twitter</div>
                                        </li>
                                        <li class="list-inline-item tooltip-hover"><a href="{{ siteSetting('linkedin') ?? null }}" class="rounded"
                                                target="_blank"><span class="ti-linkedin"></span></a>
                                            <div class="tooltip-item">Linkedin</div>
                                        </li>
                                        <li class="list-inline-item tooltip-hover"><a href="{{ siteSetting('google') ?? null }}" class="rounded"
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
                                        <li id="menu-item-132"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-132">
                                            <a href="/link-building">Link Building</a>
                                        </li>
                                        <li id="menu-item-133"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-133">
                                            <a href="/guest-post">Guest Post</a>
                                        </li>
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
                                        <p>USA Location: {{ siteSetting('usa_location') ?? null }}</p>
                                    </li>    
                                    <li class="d-flex align-items-center py-2"><span
                                            class="fas fa-map-marker-alt mr-2"></span>
                                        <p>BD office: {{ siteSetting('company_address') ?? null }}</p>
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
                    <p class="copyright-text pb-0 mb-0">Copyright © 2022 <a href="/">GP IT FIRM LTD</a></p>
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
<script data-cfasync="false" src="assets/frontend/js/vendor/email-decode.min.js"></script>

<!-- contact-form-7 -->
<script type="text/javascript" src="assets/frontend/js/vendor/contact-form-7.js" id="swv-js"></script>

<!-- jquery-blockui-js -->
<script type="text/javascript" src="assets/frontend/js/vendor/jquery.blockUI.min.js" id="jquery-blockui-js"></script>

<!-- js-cookie-js -->
<script type="text/javascript" src="assets/frontend/js/vendor/woocommerce/js.cookie.min.js" id="js-cookie-js"></script>

<!-- woocommerce.min.js -->
<script type="text/javascript" src="assets/frontend/js/vendor/woocommerce/woocommerce.min.js" id="woocommerce-js">
</script>

<!-- wc-cart-fragments-js -->
<script type="text/javascript" src="assets/frontend/js/vendor/woocommerce/cart-fragments.min.js"></script>
<script type="text/javascript" src="assets/frontend/js/typed.min.js" id="typed-js-js"></script>
<script type="text/javascript" src="assets/frontend/js/popper.min.js" id="popper-js-js"></script>
<script type="text/javascript" src="assets/frontend/js/bootstrap.min.js" id="bootstrap-js"></script>
<script type="text/javascript" src="assets/frontend/js/wow.min.html" id="wow-js-js"></script>
<script type="text/javascript" src="assets/frontend/js/owl.carousel.min.js" id="owl-carousel-js"></script>
<script type="text/javascript" src="assets/frontend/js/datatables.js" id="data-table-js-js"></script>
<script type="text/javascript" src="assets/frontend/js/dataTables.responsive.min.js" id="data-table-responsive-js-js">
</script>
<script type="text/javascript" src="assets/frontend/js/responsive.bootstrap.min.js"
    id="data-table-responsive-bootstrap-js-js"></script>
<script type="text/javascript" src="assets/frontend/js/scripts.js" id="scripts-js"></script>
