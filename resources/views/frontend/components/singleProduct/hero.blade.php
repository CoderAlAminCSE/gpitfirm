	<section class="hero-section ptb-100 gradient-overlay" style="background: url('img/header-bg-5.html')no-repeat center center / cover">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-7">
					<div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
						<h1 class="text-white mb-0">{{ $service->name }}</h1>
						<div class="custom-breadcrumb">
							<ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
								<li class="list-inline-item breadcrumb-item"><a href="/">Home</a>
								</li>
								<li class="list-inline-item breadcrumb-item"><a href="/services">Product</a></li>
								<li class="list-inline-item breadcrumb-item active">{{ $service->name }}</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>