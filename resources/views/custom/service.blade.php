@extends('custom.master')

@section('content')

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="page-header__bg"
         style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');"></div>

    <div class="container">
        <h2 class="page-header__title">Our Services</h2>
        <ul class="floens-breadcrumb list-unstyled">
            <li><i class="icon-home"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><span>Our Services</span></li>
        </ul>
    </div>
</section>

<!-- SERVICES -->
<section class="services-page section-space">
    <div class="container">
        <div class="row gutter-y-30">

            @foreach($services as $service)
                <div class="col-xl-4 col-md-6">
                    <div class="service-card-two wow fadeInUp">

                        <div class="service-card-two__bg"
                             style="background-image: url('{{ asset('assets/images/services/service-bg-2-1.png') }}');">
                        </div>

                        <div class="service-card-two__image">
                            @if($service->image)
                                <img src="{{ $service->image->url }}" alt="{{ $service->title }}">
                            @endif
                        </div>

                        <div class="service-card-two__content">
                            <h3 class="service-card-two__title">
                                <a href="{{ route('services.show', $service->id) }}">
                                    {{ $service->title }}
                                </a>
                            </h3>

                            <div class="service-card-two__bottom">
                                <a href="{{ route('services.show', $service->id) }}"
                                   class="service-card-two__link floens-btn">
                                    <span>Service Details</span>
                                    <i class="icon-right-arrow"></i>
                                </a>
                                <span class="service-card-two__icon icon-tile"></span>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

        <section class="evaluation-schedule floens-jarallax" data-jarallax data-speed="0.3" style="background-image: url('assets/images/backgrounds/evaluation-schedule-bg-1.jpg');">
            <div class="container-fluid">
                <div class="evaluation-schedule__content">
                    <h5 class="evaluation-schedule__tagline">Let us change your home look</h5><!-- /.evaluation-schedule__tagline -->
                    <h2 class="evaluation-schedule__title">A Complete Solution for
                        Your Flooring Vision</h2><!-- /.evaluation-schedule__title -->
                    <a href="about.html" class="evaluation-schedule__btn floens-btn">
                        <span>Schedule a Free Evaluation</span>
                        <i class="icon-right-arrow"></i>
                    </a><!-- /.evaluation-schedule__btn floens-btn -->
                </div><!-- /.evaluation-schedule__content -->
            </div><!-- /.container -->
        </section><!-- /.evaluation-schedule -->

        <section class="gallery-instagram gallery-instagram--two section-space-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="gallery-instagram__image">
                            <img src="assets/images/gallery/gallery-instagram-1-1.jpg" alt="gallery-instagram">
                            <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                                <span class="icon-instagram"></span>
                            </a><!-- /.gallery-instagram__image__link -->
                        </div><!-- /.gallery-instagram__image -->
                    </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="gallery-instagram__image">
                            <img src="assets/images/gallery/gallery-instagram-1-2.jpg" alt="gallery-instagram">
                            <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                                <span class="icon-instagram"></span>
                            </a><!-- /.gallery-instagram__image__link -->
                        </div><!-- /.gallery-instagram__image -->
                    </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                        <div class="gallery-instagram__image">
                            <img src="assets/images/gallery/gallery-instagram-1-3.jpg" alt="gallery-instagram">
                            <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                                <span class="icon-instagram"></span>
                            </a><!-- /.gallery-instagram__image__link -->
                        </div><!-- /.gallery-instagram__image -->
                    </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                        <div class="gallery-instagram__image">
                            <img src="assets/images/gallery/gallery-instagram-1-4.jpg" alt="gallery-instagram">
                            <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                                <span class="icon-instagram"></span>
                            </a><!-- /.gallery-instagram__image__link -->
                        </div><!-- /.gallery-instagram__image -->
                    </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="800ms">
                        <div class="gallery-instagram__image">
                            <img src="assets/images/gallery/gallery-instagram-1-5.jpg" alt="gallery-instagram">
                            <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                                <span class="icon-instagram"></span>
                            </a><!-- /.gallery-instagram__image__link -->
                        </div><!-- /.gallery-instagram__image -->
                    </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="1000ms">
                        <div class="gallery-instagram__image">
                            <img src="assets/images/gallery/gallery-instagram-1-6.jpg" alt="gallery-instagram">
                            <a href="https://www.instagram.com/" class="gallery-instagram__image__link">
                                <span class="icon-instagram"></span>
                            </a><!-- /.gallery-instagram__image__link -->
                        </div><!-- /.gallery-instagram__image -->
                    </div><!-- /.col-xl-2 col-lg-3 col-md-4 col-sm-6 -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.gallery-instagram section-space-bottom -->



        @endsection