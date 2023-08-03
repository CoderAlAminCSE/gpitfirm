<section class="ptb-70 gradient-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <div class="hero-slider-content text-white pt-5">
                    <strong></strong>
                    <h2 class="text-white"><span id="auto-type"></span></h2>
                    <p class="lead">
                    <p><span style="font-weight: 400">{{ homePageHeroSection('description') ?? null }}</span></p>
                    </p>
                    <div class="action-btns mt-3">
                        <a href="/my-account" class="btn secondary-solid-btn">{{ homePageHeroSection('button') ?? null }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="image-wrap pt-5">
                    <img src="{{ !empty(homePageHeroSection('image')) ? asset('storage/' . homePageHeroSection('image')) : "assets/frontend/images/6.jpg" }}" class="img-fluid custom-width" alt="hero" />
                </div>
            </div>
        </div>
    </div>
</section>