<section class="promo-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="section-heading mb-5">
                    <h2>Frequently Asked Questions</h2>
                    <span class="animate-border mb-4"></span>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach (faqContents() as $faq)
                    <div id="accordion-1" class="accordion accordion-faq">
                        <div class="card">
                            <div class="card-header py-4" id="heading-1-1" data-toggle="collapse" role="button"
                                data-target="#collapse-1-1" aria-expanded="false" aria-controls="collapse-1-1">
                                <h6 class="mb-0"><span class="{{ $faq->icon_name }} mr-3"></span>{{ $faq->question }}
                                </h6>
                            </div>
                            <div id="collapse-1-1" class="collapse" aria-labelledby="heading-1-1"
                                data-parent="#accordion-1">
                                <div class="card-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
