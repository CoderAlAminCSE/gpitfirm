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
                            <a>{{ siteSetting('company_email') ?? null }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <div class="contact-us-form gray-light-bg rounded p-5">
                    <h4>Ready to get started?</h4>
                    <form class="contact-us-form mt-3">
                        @csrf
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <span class="error text-danger text-sm" id="nameError"></span>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter name" required>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <span class="error text-danger text-sm" id="emailError"></span>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter email" required>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <span class="error text-danger text-sm" id="messageError"></span>
                                    <textarea name="message" id="message" class="form-control" rows="7" cols="25" placeholder="Message"
                                        required></textarea>
                                </div>

                            </div>
                            <div class="col-sm-12 mt-3">
                                <button class="btn primary-solid-btn" id="contactFormSubmitBtn">
                                    Send Message
                                    <span class="spinner-border spinner-border-sm d-none mb-0" id="send_btn_spinner">
                                    </span>
                                </button>
                                <p class="text-success d-none" id="contactMessageSuccessMessage">Message sent
                                    successfully</p>

                            </div>
                        </div>
                    </form>
                    <input type="hidden" id="contact_form_url" value="{{ route('contact.form.submit') }}">
                </div>
            </div>
        </div>
    </div>
</section>
