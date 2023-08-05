<section class="about-us-section ptb-100 gray-light-bg" id="whyus">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="about-us-img">
                    <img src="{{ !empty(homePageAboutSection('image')) ? asset('storage/' . homePageAboutSection('image')) : 'assets/frontend/images/why-choose-us.png' }} "
                        alt="about us" class="img-fluid about-single-img">
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="about-us-content-wrap">
                    <strong class="color-secondary"></strong>
                    <h2>{{ homePageAboutSection('heading') }}</h2>
                    <span class="animate-border mb-4"></span>
                    <p>
                    <div class="elementor-element elementor-element-9b4d6c9 elementor-widget elementor-widget-text-editor"
                        data-id="9b4d6c9" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <p>{{ homePageAboutSection('description') }}</p>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
