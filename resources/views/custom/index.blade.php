@extends('custom.master')

@section('content')


     <!-- main slider start -->
        <section class="main-slider-two hero-slider">
            <div class="main-slider-two__carousel floens-slick__carousel--with-counter" data-slick-options='{
		"slidesToShow": 1,
		"slidesToScroll": 1,
		"autoplay": true,
		"autoplaySpeed": 3000,
		"fade": true,
		"speed": 2000,
		"infinite": true,
		"arrows": true,
		"dots": false,
		"prevArrow": "<button class=\"hero-slider__slick-button hero-slider__slick-button--prev\">Prev <i class=\"icon-right-arrow\"><i></button>",
		"nextArrow": "<button class=\"hero-slider__slick-button hero-slider__slick-button--next\">Next <i class=\"icon-right-arrow\"><i></button>"

	}'>
                <div class="main-slider-two__item">
                    <div class="main-slider-two__bg" style="background-image: url(assets/images/backgrounds/slider-3-4.jpeg);"></div>
                    <!-- /.main-slider-two__bg -->
                    <div class="main-slider-two__wrapper container">
                        <div class="main-slider-two__left">
                            <div class="main-slider-two__content">
                                <p class="main-slider-two__tagline">Welcome to floens tiles & flooring</p>
                                <!-- /.main-slider-two__tagline -->
                                <h4 class="main-slider-two__title">Precision Tiles <br> & best Flooring Solutions</h4>
                                <!-- /.main-slider-two__title -->
                               <!-- /.main-slider-two__btn floens-btn -->
                            </div><!-- /.main-slider-two__content -->
                        </div><!-- /.main-slider-two__left -->
                     
                    </div><!-- /.main-slider-two__wrapper .container -->
                </div><!-- /.main-slider-two__item -->
                <div class="main-slider-two__item">
                    <div class="main-slider-two__bg" style="background-image: url(assets/images/backgrounds/slider-3-4.jpeg);"></div>
                    <!-- /.main-slider-two__bg -->
                    <div class="main-slider-two__wrapper container">
                        <div class="main-slider-two__left">
                            <div class="main-slider-two__content">
                               <p class="main-slider-two__tagline">10+ Years of Excellence</p>
<h4 class="main-slider-two__title">
Quality Tiles <br> for Modern Living
</h4>

                                <!-- /.main-slider-two__title -->
                               <!-- /.main-slider-two__btn floens-btn -->
                            </div><!-- /.main-slider-two__content -->
                        </div><!-- /.main-slider-two__left -->
                      
                    </div><!-- /.main-slider-two__wrapper .container -->
                </div><!-- /.main-slider-two__item -->
                <div class="main-slider-two__item">
                    <div class="main-slider-two__bg" style="background-image: url(assets/images/backgrounds/slider-3-4.jpeg);"></div>
                    <!-- /.main-slider-two__bg -->
                    <div class="main-slider-two__wrapper container">
                        <div class="main-slider-two__left">
                            <div class="main-slider-two__content">
                                <p class="main-slider-two__tagline">Style That Lasts</p>
<h4 class="main-slider-two__title">
Elegant Designs <br> Durable Flooring
</h4>

                                <!-- /.main-slider-two__title -->
                               <!-- /.main-slider-two__btn floens-btn -->
                            </div><!-- /.main-slider-two__content -->
                        </div><!-- /.main-slider-two__left -->
                      
                    </div><!-- /.main-slider-two__wrapper .container -->
                </div><!-- /.main-slider-two__item -->
                <div class="main-slider-two__item">
                    <div class="main-slider-two__bg" style="background-image: url(assets/images/backgrounds/slider-2-4.jpg);"></div>
                    <!-- /.main-slider-two__bg -->
                    <div class="main-slider-two__wrapper container">
                        <div class="main-slider-two__left">
                            <div class="main-slider-two__content">
                              <p class="main-slider-two__tagline">Build with Confidence</p>
<h4 class="main-slider-two__title">
Trusted Tiles <br> for Every Space
</h4>

                                <!-- /.main-slider-two__title -->
                               <!-- /.main-slider-two__btn floens-btn -->
                            </div><!-- /.main-slider-two__content -->
                        </div><!-- /.main-slider-two__left -->
                       
                    </div><!-- /.main-slider-two__wrapper .container -->
                </div><!-- /.main-slider-two__item -->
                <div class="main-slider-two__item">
                    <div class="main-slider-two__bg" style="background-image: url(assets/images/backgrounds/slider-3-4.jpeg);"></div>
                    <!-- /.main-slider-two__bg -->
                    <div class="main-slider-two__wrapper container">
                        <div class="main-slider-two__left">
                            <div class="main-slider-two__content">
                               <p class="main-slider-two__tagline">Complete Tile Solutions</p>
<h4 class="main-slider-two__title">
Floor • Wall <br> Sanitary Collection
</h4>

                                <!-- /.main-slider-two__title -->
                               <!-- /.main-slider-two__btn floens-btn -->
                            </div><!-- /.main-slider-two__content -->
                        </div><!-- /.main-slider-two__left -->
                        
                    </div><!-- /.main-slider-two__wrapper .container -->
                </div><!-- /.main-slider-two__item -->
            </div><!-- /.my-slider -->
        </section><!-- /.main-slider-two -->
        <!-- main slider end -->

      

         <section class="work-page work-page--carousel section-space-bottom">
    <div class="container">
@php
    use App\Models\Product;
@endphp
        <div class="sec-title sec-title--center mb-60">
            <h6 class="sec-title__tagline">Product Size Category</h6>
            <h3 class="sec-title__title">
                {{ request('size') ? Product::SIZE_SELECT[request('size')] : 'Our Recent Products' }}
            </h3>
        </div>

        <div class="work-page__carousel floens-owl__carousel floens-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
                "items": 1,
                "margin": 0,
                "loop": true,
                "smartSpeed": 700,
                "nav": true,
                "navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
                "dots": true,
                "autoplay": 600,
                "responsive": {
                    "0": {
                        "items": 1,
                        "margin": 10
                    },
                    "576": {
                        "items": 1,
                        "margin": 30
                    },
                    "768": {
                        "items": 2,
                        "margin": 30
                    },
                    "992": {
                        "items": 3,
                        "margin": 30
                    }
                }
            }'>


            @forelse($products as $product)
                <div class="item">
                    <div class="work-card">

                        <div class="work-card__image">
                            <img src="{{ $product->image?->url ?? asset('assets/images/works/default.jpg') }}"
                                 alt="{{ $product->title }}">
                        </div>

                        <div class="work-card__content-show">
                            <div class="work-card__content-inner">
                                <h3 class="work-card__tagline">
                                    {{ Product::SIZE_SELECT[$product->size] ?? $product->size }}
                                </h3>
                                <h3 class="work-card__title">
                                    <a href="{{ route('products.index', ['size' => $product->size]) }}">
                                        {{ $product->title }}
                                    </a>
                                </h3>
                            </div>
                        </div>

                        <div class="work-card__content-hover">
                            <div class="work-card__content-inner">
                                <h3 class="work-card__tagline">
                                    {{ Product::SIZE_SELECT[$product->size] ?? $product->size }}
                                </h3>
                                <h3 class="work-card__title">
                                    <a href="{{ route('products.index', ['size' => $product->size]) }}">
                                        {{ $product->title }}
                                    </a>
                                </h3>
                            </div>

                            <a href="{{ route('products.index', ['size' => $product->size]) }}"
                               class="work-card__link floens-btn">
                                <span class="icon-right-arrow"></span>
                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <p class="text-center">No products found for this size.</p>
            @endforelse

        </div>
    </div>
</section>


        <!-- services start -->
        <section class="services-three">
            <div class="services-three__bg" style="background-image: url(assets/images/backgrounds/services-bg-3.png);"></div><!-- /.services-three__bg -->
            <div class="container">
                <div class="services-three__top">
                    <div class="row gutter-y-50 align-items-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="sec-title @@extraClassName">

                                <h6 class="sec-title__tagline">services</h6><!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title">We Provides Best florring Services for you</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->


                        </div><!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="services-three__top__button">
                                <a href="/services" class="floens-btn floens-btn--border">
                                    <span>View All</span>
                                    <i class="icon-right-arrow"></i>
                                </a><!-- /.floens-btn floens-btn--border -->
                            </div><!-- /.services-three__top__button -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.services-three__top -->
                <div class="services-three__inner" style="background: url(assets/images/backgrounds/services-bg-inner-1.jpg);">
                   
            </div><!-- /.container -->
            <div class="container-fluid">
                <div class="services-three__carousel floens-owl__carousel floens-owl__carousel--with-shadow floens-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": false,
			"smartSpeed": 700,
			"nav": true,
			"navText": ["<span class=\"icon-slide-left-arrow\"></span>","<span class=\"icon-slide-right-arrow\"></span>"],
			"dots": false,
			"autoplay": false,
			"responsive":{
                "0":{
                    "items": 1,
					"loop": true,
					"autoplay": true,
                    "margin": 15
                },
				"576":{
                    "items": 1,
					"loop": true,
					"autoplay": true,
                    "margin": 15
                },
                "768":{
                    "items": 2,
					"loop": true,
					"autoplay": true,
                    "margin": 30
                },
                "992":{
                    "items": 2,
					"loop": true,
					"autoplay": true,
                    "margin": 30
                },
                "1200":{
                    "items": 3,
					"loop": true,
					"autoplay": true,
                    "margin": 30
                },
                "1400":{
                    "items": 3,
					"loop": false,
					"autoplay": true,
                    "margin": 30
                },
                "1600":{
                    "items": 4,
					"loop": false,
					"autoplay": false,
                    "margin": 30
                }
			}
		}'>
                     @forelse($services as $service)
                <div class="item">
                    <div class="service-card-two">

                        <div class="service-card-two__bg"
                             style="background-image: url('{{ asset('assets/images/services/service-bg-2-1.png') }}');">
                        </div>

                        <div class="service-card-two__image">
                            <img
                                src="{{ $service->image ? $service->image->url : asset('assets/images/services/default.jpg') }}"
                                alt="{{ $service->title }}">
                        </div>

                        <div class="service-card-two__content">
                            <h3 class="service-card-two__title">
                                <a href="{{ route('services.show', $service->id) }}">
                                    {{ $service->title }}
                                </a>
                            </h3>

                            <p>
                                {{ \Illuminate\Support\Str::limit($service->short_description, 80) }}
                            </p>

                            <div class="service-card-two__bottom">
                                <a href="{{ route('services.show', $service->id) }}"
                                   class="service-card-two__link floens-btn">
                                    <span>service details</span>
                                    <i class="icon-right-arrow"></i>
                                </a>

                                <span class="service-card-two__icon icon-tiles"></span>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <p class="text-center">No services found.</p>
            @endforelse                </div><!-- /.services-three__carousel -->
            </div><!-- /.container-fluid -->
        </section><!-- /.services-three section-space-two -->
        <!-- services end -->

      

        <!-- projects start -->
        <!-- shop start -->
       <section class="projects-three" id="projects">
    <div class="projects-three__bg floens-jarallax" data-jarallax data-speed="0.3" style="background-image: url(assets/images/backgrounds/projects-bg-3.jpg);">
    </div>

    <div class="container mb-50 ">
        <div class="sec-title sec-title--center mb-60">
            <h6 class="sec-title__tagline">our categories</h6>
            <h3 class="sec-title__title">
                Let’s Explore Our <br> Tile Categories
            </h3>
        </div>

        <div class="row gutter-y-30">
            @foreach($categories as $category)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product__item wow fadeInUp" data-wow-duration="1500ms">
                        
                        <div class="product__item__image">
                            <img 
                                src="{{ $category->photo ? $category->photo->url : asset('assets/images/products/default.jpg') }}"
                                alt="{{ $category->name }}">
                        </div>

                        <div class="product__item__content">
                            <h4 class="product__item__title">
                                <a href="{{ route('products.index', ['category' => $category->id]) }}">
                                    {{ $category->name }}
                                </a>
                            </h4>

                            <a href="{{ route('products.index', ['category' => $category->id]) }}"
                                class="floens-btn product__item__link">
                                <span>View Products</span>
                                <i class="icon-right-arrow"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>



        <!-- gallery slider start -->
        <section class="gallery-slide">
    <div class="container">
        <div class="gallery-slide__inner">
           <div class="gallery-slide__carousel floens-owl__carousel owl-theme owl-carousel" data-owl-options='{
                "items": 1,
                "margin": 30,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "stagePadding": 186,
                "nav":false,
                "dots":false,
                "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                "responsive":{
                    "0":{
                        "items": 1,
                        "margin": 15,
                        "stagePadding": 210
                    },
                    "500":{
                        "items": 1,
                        "stagePadding": 240
                    },
                    "768":{
                        "items": 1,
                        "stagePadding": 280
                    },
                    "992":{
                        "items": 1,
                        "stagePadding": 370
                    },
                    "1200":{
                        "items": 2,
                        "stagePadding": 280
                    },
                    "1400":{
                        "items": 2,
                        "stagePadding": 270
                    },
                    "1600":{
                        "items": 2,
                        "stagePadding": 250
                    },
                    "1800":{
                        "items": 2,
                        "stagePadding": 192.5
                    }
                }
                }'>

                @foreach($galleries as $gallery)
                    @if($gallery->upload_file)
                        <div class="item">
                            <div class="gallery-one__card">
                                <img src="{{ $gallery->upload_file->getUrl() }}"
                                     alt="{{ $gallery->title ?? 'Gallery Image' }}">

                                <div class="gallery-one__card__hover">
                                    <a href="{{ $gallery->upload_file->getUrl() }}" class="img-popup">
                                        <span class="gallery-one__card__icon"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</section>

        <!-- gallery slider end -->

       

        <!-- contact end -->
        <section class="contact-one section-space">
            <div class="contact-one__bg" style="background-image: url('assets/images/backgrounds/contact-bg-1.png');"></div><!-- /.contact-one__bg -->
            <div class="container">
                <div class="row gutter-y-40">
                    <div class="col-lg-6">
                        <div class="contact-one__content">
                            <div class="sec-title sec-title--border">

                                <h6 class="sec-title__tagline">contact</h6><!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title">Reach out & <br> Connect with Us</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->


                            <p class="contact-one__text">Our vision is to provide innovative, independent flooring solutions that solve problems for homes, industries, and workspaces, as well as flooring we would like in our own residences, work spaces,</p><!-- /.contact-one__text -->
                            <div class="contact-one__info wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                <div class="contact-one__info__bg" style="background-image: url('assets/images/shapes/contact-info-bg.png');"></div><!-- /.contact-one__info__bg -->
                                <div class="contact-one__info__content">
                                    <div class="contact-one__info__item">
                                        <div class="contact-one__info__item__inner">
                                            <div class="contact-one__info__icon">
                                                <span class="icon-phone-call"></span>
                                            </div><!-- /.contact-one__info__icon -->
                                            <p class="contact-one__info__text"><a href="tel:{{ $contactInfo->number }}">{{ $contactInfo->number }}</a></p><!-- /.contact-one__info__text -->
                                        </div><!-- /.contact-one__info__item__inner -->
                                    </div><!-- /.contact-one__info__item -->
                                    <div class="contact-one__info__item">
                                        <div class="contact-one__info__item__inner">
                                            <div class="contact-one__info__icon">
                                                <span class="icon-paper-plane"></span>
                                            </div><!-- /.contact-one__info__icon -->
                                            <p class="contact-one__info__text"><a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></p><!-- /.contact-one__info__text -->
                                        </div><!-- /.contact-one__info__item__inner -->
                                    </div><!-- /.contact-one__info__item -->
                                    <div class="contact-one__info__item">
                                        <div class="contact-one__info__item__inner">
                                            <div class="contact-one__info__icon">
                                                <span class="icon-location"></span>
                                            </div><!-- /.contact-one__info__icon -->
                                            <address class="contact-one__info__text"><a href="{{ $contactInfo->url }}">{{ $contactInfo->address }}</a></address><!-- /.contact-one__info__text -->
                                        </div><!-- /.contact-one__info__item__inner -->
                                    </div><!-- /.contact-one__info__item -->
                                </div><!-- /.contact-one__info__content -->
                                <img src="{{ asset('assets/images/shapes/contact-shape-1-1.png') }}" alt="contact image" class="contact-one__info__image">
                            </div><!-- /.contact-one__info -->
                        </div><!-- /.contact-one__content -->
                    </div><!-- /.col-xl-6 -->
                    <div class="col-lg-6">
                       @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form class="contact-one__form contact-form-validated form-one wow fadeInUp" 
      data-wow-duration="1500ms" data-wow-delay="200ms" 
      method="POST" action="{{ route('contact.submit') }}">
    @csrf

    <div class="contact-one__form__bg" style="background-image: url('{{ asset('assets/images/shapes/contact-info-form-bg.png') }}');"></div>

    <div class="contact-one__form__top">
        <h2 class="contact-one__form__title">Get In Touch With Us And Enjoy <br>Top-Notch Support</h2>
    </div>

    <div class="form-one__group form-one__group--grid">

        <!-- Name -->
        <div class="form-one__control form-one__control--input form-one__control--full">
            <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}">
            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <!-- Email -->
        <div class="form-one__control form-one__control--full">
            <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <!-- Phone / Number -->
        <div class="form-one__control form-one__control--full">
            <input type="text" name="number" placeholder="Your Phone Number" value="{{ old('number') }}">
            @error('number')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <!-- Full Address -->
        <div class="form-one__control form-one__control--full">
            <input type="text" name="full_address" placeholder="Your Full Address" value="{{ old('full_address') }}">
            @error('full_address')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <!-- Product Dropdown -->
        <div class="form-one__control form-one__control--full">
            <select class="selectpicker" name="product_id" aria-label="Choose Product">
                <option value="">Choose Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->title }}
                    </option>
                @endforeach
            </select>
            @error('product_id')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <!-- Message -->
        <div class="form-one__control form-one__control--mesgae form-one__control--full">
            <textarea name="message" placeholder="Write your message">{{ old('message') }}</textarea>
            @error('message')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <!-- Submit Button -->
        <div class="form-one__control form-one__control--full">
            <button type="submit" class="floens-btn">
                <span>Send Message</span>
                <i class="icon-right-arrow"></i>
            </button>
        </div>

    </div>
</form>


                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <img src="assets/images/contact/contact-1-2.jpg" alt="contact image" class="contact-one__image-two wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="00ms">
        </section><!-- /.contact-one section-space -->
        <!-- contact end -->

        <section class="testimonials-two section-space-two" id="testimonials">
    <div class="container">
        <div class="sec-title sec-title--center">
            <h6 class="sec-title__tagline">testimonial</h6>
            <h3 class="sec-title__title">What People are Talking <br> About Floens</h3>
        </div>

        <div class="testimonials-two__carousel floens-owl__carousel owl-carousel owl-theme" data-owl-options='{
            "items": 2,
            "margin": 30,
            "loop": true,
            "smartSpeed": 700,
            "nav": false,
            "dots": true,
            "responsive": {
                "0": {"items":1,"margin":10},
                "576": {"items":1,"margin":10},
                "768": {"items":1,"margin":10},
                "992": {"items":2,"margin":30}
            }
        }'>

            @foreach($testimonials as $testimonial)
            <div class="item">
                <div class="testimonials-card">
                    <div class="testimonials-card__bg" style="background-image: url(assets/images/testimonials/testimonials-card-bg.png);"></div>
                    <div class="testimonials-card__top">
                        <div class="floens-ratings">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rate)
                                    <span class="icon-star" style="color: #FFD700;"></span>
                                @else
                                    <span class="icon-star" style="color: #ddd;"></span>
                                @endif
                            @endfor
                        </div>
                        @if($testimonial->video_link ?? false)
                            <a href="{{ $testimonial->video_link }}" class="testimonials-card__video video-button video-popup">
                                <span class="icon-play"></span>
                                <i class="video-button__ripple"></i>
                            </a>
                        @endif
                    </div>

                    <div class="testimonials-card__content">
                        <div class="testimonials-card__content__inner">
                            <p class="testimonials-card__text">{!! $testimonial->description !!}</p>
                        </div>
                        <div class="testimonials-card__person">
                            <div class="testimonials-card__person__inner">
                               <img src="{{ $testimonial->image->url }}" 
     alt="{{ $testimonial->title }}" 
     class="testimonials-card__person__image">

                                <div class="testimonials-card__person__info">
                                    <h3 class="testimonials-card__person__name">{{ $testimonial->title }}</h3>
                                    <span class="testimonials-card__person__designation">{{ $testimonial->degination }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="testimonials-card__quotes" style="background-image: url(assets/images/testimonials/testimonials-quote-bg-1-1.jpg);">
                        <svg class="testimonials-card__quotes__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 38" fill="none">
                            <path d="M0 23.7248H10.3849L3.46157 37.5713H13.8465L20.7698 23.7248V2.95508H0V23.7248Z" />
                            <path d="M27.6929 2.95508V23.7248H38.0778L31.1544 37.5713H41.5393L48.4626 23.7248V2.95508H27.6929Z" />
                        </svg>
                    </div> -->
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

      

       <!-- blog start -->
<section class="blog-three section-space-two">
    <div class="container">
        <div class="sec-title sec-title--center">
            <h6 class="sec-title__tagline">news room</h6>
            <h3 class="sec-title__title">
                See Latest News <br> from the Blog Posts
            </h3>
        </div>

        <div class="row gutter-y-30">
            @foreach($blogs as $index => $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card blog-card--three wow fadeInUp"
                         data-wow-duration="1500ms"
                         data-wow-delay="{{ $index * 200 }}ms">

                        <div class="blog-card__image">
                            <img
                                src="{{ $blog->image ? $blog->image->url : asset('assets/images/blog/default.jpg') }}"
                                alt="{{ $blog->name }}">

                            <a href="{{ route('blogs.show', $blog->id) }}"
                               class="blog-card__image__link">
                                <span class="sr-only">{{ $blog->name }}</span>
                            </a>
                        </div>

                        <div class="blog-card__date">
                            <span class="blog-card__date__day">
                                {{ $blog->created_at->format('d') }}
                            </span>
                            <span class="blog-card__date__month">
                                {{ $blog->created_at->format('M') }}
                            </span>
                        </div>

                        <div class="blog-card__content">
                            <h3 class="blog-card__title">
                                <a href="{{ route('blogs.show', $blog->id) }}">
                                    {{ $blog->name }}
                                </a>
                            </h3>

                            <ul class="list-unstyled blog-card__meta">
                                <li>
                                    <a href="#">
                                        <i class="icon-user"></i> by Admin
                                    </a>
                                </li>
                               
                                
                            </ul>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- blog end -->


        <!-- client carousel start -->
        <div class="client-carousel client-carousel--dark">
            <div class="container">
                <div class="client-carousel__one floens-owl__carousel owl-theme owl-carousel" data-owl-options='{
            "items": 5,
            "margin": 25,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": 6000,
            "nav":false,
            "dots":false,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive":{
                "0":{
                    "items": 2,
                    "margin": 30
                },
                "500":{
                    "items": 3,
                    "margin": 40
                },
                "768":{
                    "items": 4,
                    "margin": 50
                },
                "992":{
                    "items": 5,
                    "margin": 40
                },
                "1200":{
                    "items": 6,
                    "margin": 60
                }
            }
            }'>
                     @foreach($brands as $brand)
                @if($brand->logo)
                    <div class="client-carousel__one__item">
                        <img src="{{ $brand->logo->url }}" alt="{{ $brand->title }}" >
                        <img src="{{ $brand->logo->url }}" alt="{{ $brand->title }}">
                    </div>
                @endif
            @endforeach
                   
                </div><!-- /.thm-owl__slider -->
            </div><!-- /.container -->
        </div><!-- /.client-carousel -->
        <!-- client carousel end -->
@endsection