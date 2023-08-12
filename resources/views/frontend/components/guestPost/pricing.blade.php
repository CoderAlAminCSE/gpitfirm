<section class="pricing-section ptb-100 gray-light-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="section-heading text-center mb-5">
                    <strong class="color-secondary">Our Pricing</strong>
                    <h2>{{ $category->name }} Packages</h2>
                    <span class="animate-border mr-auto ml-auto mb-4"></span>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">

            @foreach ($services as $service)
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card text-center single-pricing-pack">
                        <div class="price-img pt-5">
                            <h4>{{ $service->title }}</h4>
                        </div>
                        <div class="card-header py-4 border-0 pricing-header">
                            <div class="price text-center mb-0 monthly-price">${{ $service->price }}</div>
                        </div>
                        <div class="card-body">
                            {!! $service->description !!}
                            <a class="btn outline-btn mb-3 add-to-cart mt-5" data-service-id="{{ $service->id }}"
                                data-service-name="{{ $service->name }}"
                                data-service-price="{{ $service->price }}">Purchase now</a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
</section>
