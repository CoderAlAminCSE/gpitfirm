<section class="promo-section ptb-100">
    <div class="container">
        <div class="row">
            @foreach (homePagePromoSection() as $promo)
                <div class="col-md-4 col-lg-4">
                    <a href="#">
                        <div class="single-promo-2 single-promo-hover rounded text-center white-bg p-5 h-100">
                            <div class="circle-icon">
                                <span class="{{ $promo->icon_name }} text-white"></span>
                            </div>
                            <h5>{{ $promo->title }}</h5>
                            <p>
                            <p>{{ $promo->description }}</p>
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
