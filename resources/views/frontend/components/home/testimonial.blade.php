<section class="testimonial-section ptb-100" id="reviews"
    style="background: url('assets/frontend/images/testimonial-bg.png')no-repeat center center / cover">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-5">
                <div class="testimonial-heading text-white">
                    <h2 class="text-white">Client's Feedback</h2>
                    <span class="animate-border mb-4"></span>
                </div>
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="testimonial-content-wrap">
                    <img src="assets/frontend/images/testimonial-arrow-top.png"
                        class="img-fluid testimonial-tb-shape shape-top" alt="testimonial shape">
                    <div class="owl-carousel owl-theme client-testimonial-1 custom-dot testimonial-shape">
                        @foreach (homePageTestimonialSection() as $testimonial)
                            <div class="item">
                                <div class="testimonial-quote-wrap">
                                    <div class="media author-info mb-3">
                                        <div class="author-img mr-3">
                                            <img src="{{ !empty($testimonial->image) ? asset('storage/' . $testimonial->image) : ' ' }}"
                                                alt="image" class="img-fluid">
                                        </div>
                                        <div class="media-body text-white">
                                            <h5 class="mb-0 text-white">{{ $testimonial->name }}</h5>
                                            <span>CEO</span>
                                        </div>
                                        <span class="fas fa-quote-right icon-md text-white"></span>
                                    </div>
                                    <div class="client-say text-white">
                                        <p>{{ $testimonial->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <img src="assets/frontend/images/testimonial-arrow-bottom.png"
                        class="img-fluid testimonial-tb-shape shape-bottom" alt="testimonial shape">
                </div>
            </div>

        </div>
    </div>
</section>
