<section class="services-section ptb-100 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-heading text-center mb-5">
                    <strong class="color-secondary"></strong>
                    <h2>Our All Services</h2>
                    <span class="animate-border mr-auto ml-auto mb-4"></span>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach (homePageServiceSection() as $service)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <span class="{{ $service->icon_name }} icon-lg color-secondary d-block mb-4"></span>
                        <h5>{{ $service->heading }}</h5>
                        <p class="mb-0">{{ $service->description }} </p>
                        <a href="/services" class="detail-link mt-4">Get Start<span class="ti-arrow-right"></span></a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
