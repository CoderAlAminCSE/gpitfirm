<section class="contact-us-promo pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card single-promo-card single-promo-hover text-center shadow-sm">
                    <div class="card-body py-5">
                        <div class="pb-2">
                            <span class="ti-mobile icon-sm color-secondary"></span>
                        </div>
                        <div>
                            <h5 class="mb-0">Call Us</h5>
                            <p>{{ siteSetting('company_phone') ?? null }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card single-promo-card single-promo-hover text-center shadow-sm">
                    <div class="card-body py-5">
                        <div class="pb-2">
                            <span class="ti-location-pin icon-sm color-secondary"></span>
                        </div>
                        <div>
                            <h5 class="mb-0">USA Location</h5>
                            <p class="text-muted mb-0">
                            <p>{{ siteSetting('usa_location') ?? null }}</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card single-promo-card single-promo-hover text-center shadow-sm">
                    <div class="card-body py-5">
                        <div class="pb-2">
                            <span class="ti-email icon-sm color-secondary"></span>
                        </div>
                        <div>
                            <h5 class="mb-0">Mail Us</h5>
                            <a >{{ siteSetting('company_email') ?? null }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>