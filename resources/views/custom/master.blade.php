@php 
use App\Models\Logo;
use App\Models\ContactDetail;
use App\Models\ProductCategory;


$logo = Logo::first();
$contactdetail = ContactDetail::first();



@endphp


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bracketweb.com/floens-html/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Dec 2025 13:12:05 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Shop Right Sidebar | Floens')</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}">

    <meta name="description" content="Floens is a modern template for Tiling & Flooring websites.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700;9..40,900;9..40,1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/floens-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/floens.css') }}">

    @stack('styles')
</head>



<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image" style="background-image: url(assets/images/loader.png);"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <header class="main-header main-header--three sticky-header sticky-header--normal">
            <div class="container-fluid">
                <div class="main-header__inner">
                    <div class="main-header__logo">
                       <a href="{{ url('/') }}" class="main-header__logo">
    {{-- Light Logo --}}
    @if($logo && $logo->image_1)
        <img 
            src="{{ $logo->image_1->url }}" 
            alt="{{ $logo->name ?? config('app.name') }}"
            width="125"
            height="90"
            class="main-header__logo__one"
        >
    @endif

    {{-- Dark Logo (optional: same image or another collection later) --}}
    @if($logo && $logo->image_1)
        <img 
            src="{{ $logo->image_1->url }}" 
            alt="{{ $logo->name ?? config('app.name') }}"
            width="125"
            height="90"
            class="main-header__logo__two"
        >
    @endif
</a>
                    </div><!-- /.main-header__logo -->
                    <div class="main-header__right">
                        <nav class="main-header__nav main-menu">
                            <ul class="main-menu__list">

                                <li class="dropdown megamenu">
                                    <a href="{{ url('/') }}">Home</a>
                                    
                                </li>



                                <li>
                                    <a href="/about">About</a>
                                </li>

                                <li class="dropdown">
                                    <a href="/services">Services</a>
                                    <ul>
                                        @foreach(App\Models\Service::all() as $service)
                                        <li><a href="{{ route('services.show', $service->id) }}"> {{ \Illuminate\Support\Str::limit($service->title, 28) }}</a></li>
                                        @endforeach
                                       
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="/gallery">Gallery</a>
                                    
                                </li>

                            <li class="px-3 nav-item dropdown position-static">
    <a class="nav-link dropdown-toggle"
       href="{{ url('/products') }}"
       id="productsDropdown"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false">
        Products
    </a>

    <div class="dropdown-menu border-0 shadow mega-menu mt-3">
        <div class="container-fluid py-4">

            @php
                use App\Models\Product;

                $sizes = Product::SIZE_SELECT;

                $sizeProducts = Product::select('id','title','size')
                    ->orderBy('title')
                    ->get()
                    ->groupBy('size');
            @endphp

            <div class="row">

                @foreach($sizes as $sizeKey => $sizeLabel)
                    @php
                        $productsBySize = $sizeProducts[$sizeKey] ?? collect();
                    @endphp

                    @if($productsBySize->count() > 0)
                        <div class="col-md-3 col-sm-6 mb-4">

                            <div class="p-3 h-100 bg-white rounded">

                                <!-- SIZE TITLE -->
                                <h6 class="fw-bold border-bottom pb-2 mb-2">
                                    {{ $sizeLabel }}
                                </h6>

                                <!-- PRODUCT LIST -->
                                @foreach($productsBySize as $product)
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="d-block text-muted text-decoration-none mb-1 product-link">
                                        {{ $product->title }}
                                    </a>
                                @endforeach

                            </div>

                        </div>
                    @endif
                @endforeach

            </div>

        </div>
    </div>
</li>
<style>
    /* Full width mega dropdown */
.mega-menu {
    width: 100vw;
    /* left: 50% !important;
    transform: translateX(-50%) translateY(20px); */
    opacity: 0;
    display: block;
    pointer-events: none;
    transition: all 0.35s ease;
}

/* Show dropdown with animation */
.dropdown.show .mega-menu {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
    pointer-events: auto;
}

/* Product link style */
.product-link {
    font-size: 14px;
    line-height: 1.4;
}

.product-link:hover {
    color: #000;
    text-decoration: underline;
}

/* Fix overflow issue */
.navbar,
.dropdown-menu {
    overflow: visible !important;
}

</style>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('show.bs.dropdown', function () {
            this.classList.add('show');
        });

        dropdown.addEventListener('hide.bs.dropdown', function () {
            this.classList.remove('show');
        });
    });
});
</script>

                                <li class="dropdown">
                                    <a href="/blogs">Blog</a>
                                    <ul>
                                        @foreach(App\Models\Blog::all() as $blog)
                                        <li><a href="{{ route('blogs.show', $blog->id) }}">{{ \Illuminate\Support\Str::limit($blog->name, 28) }}</a></li>
                                        @endforeach
                                       

                                    </ul>
                                </li>
                                <li>
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>
                        </nav><!-- /.main-header__nav -->
                        <div class="mobile-nav__btn mobile-nav__toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- /.mobile-nav__toggler -->
                       
                        
                        <a href="/contact" class="floens-btn main-header__btn">
                            <span>get a quote</span>
                            <i class="icon-right-arrow"></i>
                        </a><!-- /.thm-btn main-header__btn -->
                    </div><!-- /.main-header__right -->
                </div><!-- /.main-header__inner -->
            </div><!-- /.container-fluid -->
        </header><!-- /.main-header -->

        @yield('content')


         <footer class="main-footer">
            <div class="main-footer__bg" style="background-image: url(assets/images/shapes/footer-bg-1-1.png);"></div>
            <!-- /.main-footer__bg -->
            <div class="main-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                            <div class="footer-widget footer-widget--about">
                               <a href="{{ url('/') }}" class="footer-widget__logo">
    @if($logo && $logo->image_1)
        <img 
            src="{{ $logo->image_1->url }}" 
            width="123" 
            alt="{{ $logo->name ?? 'Company Logo' }}"
        >
    @else
        <img 
            src="{{ asset('assets/images/logo-light.png') }}" 
            width="123" 
            alt="Default Logo"
        >
    @endif
</a>

                                <p class="footer-widget__about-text">{!! $logo->description ?? 'Company description' !!}</p><!-- /.footer-widget__about-text -->
                               
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-4 col-lg-6 -->
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                            <div class="footer-widget footer-widget--links footer-widget--links-one">
                                <div class="footer-widget__top">
                                    <div class="footer-widget__title-box"></div><!-- /.footer-widget__title-box -->
                                    <h2 class="footer-widget__title">Explore</h2><!-- /.footer-widget__title -->
                                </div><!-- /.footer-widget__top -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/services">Our Services</a></li>
                                    <li><a href="/gallery">Our Gallery</a></li>
                                    <li><a href="/blog">Our Blog</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-2 col-lg-3 col-md-3 col-sm-6 -->
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="400ms">
                            <div class="footer-widget footer-widget--links footer-widget--links-two">
                                <div class="footer-widget__top">
                                    <div class="footer-widget__title-box"></div><!-- /.footer-widget__title-box -->
                                    <h2 class="footer-widget__title">Services</h2><!-- /.footer-widget__title -->
                                </div><!-- /.footer-widget__top -->
                                <ul class="list-unstyled footer-widget__links">
                                    @foreach(App\Models\Service::all() as $service)
                                    <li><a href="{{ route('services.show', $service->id) }}">{{ \Illuminate\Support\Str::limit($service->title, 25) }}</a></li>
                                    @endforeach
                                    
                                </ul><!-- /.list-unstyled footer-widget__links -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-3 col-md-4 col-sm-6 -->
                        <div class="col-xl-3 col-lg-6 col-md-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="600ms">
                            <div class="footer-widget footer-widget--contact">
                                <div class="footer-widget__top">
                                    <div class="footer-widget__title-box"></div><!-- /.footer-widget__title-box -->
                                    <h2 class="footer-widget__title">Get inTouch</h2><!-- /.footer-widget__title -->
                                </div><!-- /.footer-widget__top -->
                               <ul class="list-unstyled footer-widget__info">
    @if($contactdetail)
        <li>
            <a href="https://www.google.com/maps?q={{ urlencode($contactdetail->address) }}" target="_blank">
                {{ $contactdetail->address }}
            </a>
        </li>

        <li>
            <span class="icon-paper-plane"></span>
            <a href="mailto:{{ $contactdetail->email }}">
                {{ $contactdetail->email }}
            </a>
        </li>

        <li>
            <span class="icon-phone-call"></span>
            <a href="tel:{{ $contactdetail->number }}">
                {{ $contactdetail->number }}
            </a>
        </li>
    @endif
</ul>

                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-xl-3 col-lg-6 col-md-5 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__top -->
            <div class="main-footer__bottom">
                <div class="container">
                    <div class="main-footer__bottom__inner">
                        <div class="row gutter-y-30 align-items-center">
                            <div class="col-md-5 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="000ms">
                                <div class="main-footer__social floens-social">
                                    <a href="https://facebook.com/">
                                        <i class="icon-facebook" aria-hidden="true"></i>
                                        <span class="sr-only">Facebook</span>
                                    </a>
                                    <a href="https://twitter.com/">
                                        <i class="icon-twitter" aria-hidden="true"></i>
                                        <span class="sr-only">Twitter</span>
                                    </a>
                                    <a href="https://instagram.com/">
                                        <i class="icon-instagram" aria-hidden="true"></i>
                                        <span class="sr-only">Instagram</span>
                                    </a>
                                    <a href="https://youtube.com/">
                                        <i class="icon-youtube" aria-hidden="true"></i>
                                        <span class="sr-only">Youtube</span>
                                    </a>
                                </div><!-- /.main-footer__social -->
                            </div><!-- /.col-md-5 -->
                            <div class="col-md-7 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                                <div class="main-footer__bottom__copyright">
                                    <p class="main-footer__copyright">
                                        &copy; Copyright <span class="dynamic-year"></span> by Floens HTML Template.
                                    </p>
                                </div><!-- /.main-footer__bottom__copyright -->
                            </div><!-- /.col-md-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.main-footer__inner -->
                </div><!-- /.container -->
            </div><!-- /.main-footer__bottom -->
        </footer><!-- /.main-footer -->

    </div><!-- /.page-wrapper -->

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/logo-light.png" width="155" alt="logo-light" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+91{{ $contactInfo->phone }}">+91 {{ $contactInfo->phone }}</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://facebook.com/">
                    <i class="icon-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com/">
                    <i class="icon-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://instagram.com/">
                    <i class="icon-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="https://youtube.com/">
                    <i class="icon-youtube" aria-hidden="true"></i>
                    <span class="sr-only">Youtube</span>
                </a>
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="floens-btn">
                    <span class="icon-search"></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->
    <aside class="sidebar-one">
        <div class="sidebar-one__overlay sidebar-btn__toggler"></div><!-- /.siderbar-ovarlay -->
        <div class="sidebar-one__content">
            <span class="sidebar-one__close sidebar-btn__toggler"><i class="fa fa-times"></i></span>
            <div class="sidebar-one__logo sidebar-one__item">
                <a href="index.html" aria-label="logo image"><img src="assets/images/logo-light.png" width="123" alt="logo-dark" /></a>
            </div><!-- /.sidebar-one__logo -->
            <div class="sidebar-one__about sidebar-one__item">
                <p class="sidebar-one__about__text">Tiles company, also known as a tile manufacturer or distributor, specializes in the production and distri</p>
            </div><!-- /.sidebar-one__about -->
            <div class="sidebar-one__info sidebar-one__item">
                <h4 class="sidebar-one__title">Information</h4>
                <ul class="sidebar-one__info__list">
                    <li><span class="icon-location-2"></span>
                        <address>85 Ketch Harbour Road Bensal PA 19020</address>
                    </li>
                    <li><span class="icon-paper-plane"></span> <a href="mailto:needhelp@company.com">needhelp@company.com</a></li>
                    <li><span class="icon-phone-call"></span> <a href="tel:+9156980036420">+91 5698 0036 420</a></li>
                </ul><!-- /.sidebar-one__info__list -->
            </div><!-- /.sidebar-one__info -->
            <div class="sidebar-one__social floens-social sidebar-one__item">
                <a href="https://facebook.com/">
                    <i class="icon-facebook" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com/">
                    <i class="icon-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>
                <a href="https://instagram.com/">
                    <i class="icon-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
                <a href="https://youtube.com/">
                    <i class="icon-youtube" aria-hidden="true"></i>
                    <span class="sr-only">Youtube</span>
                </a>
            </div><!-- /sidebar-one__social -->
            <div class="sidebar-one__newsletter sidebar-one__item">
                <label class="sidebar-one__title" for="sidebar-email">Newsletter Subscribe</label>
                <form action="#" class="sidebar-one__newsletter__inner mc-form" data-url="MAILCHIMP_FORM_URL">
                    <input type="email" name="sidebar-email" id="sidebar-email" class="sidebar-one__newsletter__input" placeholder="Email Address">
                    <button type="submit" class="sidebar-one__newsletter__btn"><span class="icon-email" aria-hidden="true"></span></button>
                </form>
                <div class="mc-form__response"></div><!-- /.mc-form__response -->
            </div><!-- /.sidebar-one__form -->
        </div><!-- /.sidebar__content -->
    </aside><!-- /.sidebar-one -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
    </a>

  <script src="{{ asset('assets/vendors/jquery/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.js') }}"></script>
<script src="{{ asset('assets/vendors/swiper/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-lettering/jquery.lettering.min.js') }}"></script>
<script src="{{ asset('assets/vendors/slick/slick.min.js') }}"></script>

<!-- Template JS -->
<script src="{{ asset('assets/js/floens.js') }}"></script>

</body>


<!-- Mirrored from bracketweb.com/floens-html/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Dec 2025 13:12:08 GMT -->
</html>

