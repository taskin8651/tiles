@extends('custom.master')

@section('title', 'Contact Us')
@section('content')

       <section class="page-header">
    <div class="page-header__bg" 
         style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');">
    </div><!-- /.page-header__bg -->

    <div class="container">
        <h2 class="page-header__title">Contact Us</h2>
        <ul class="floens-breadcrumb list-unstyled">
            <li>
                <i class="icon-home"></i> 
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li><span>Contact Us</span></li>
        </ul><!-- /.floens-breadcrumb list-unstyled -->
    </div><!-- /.container -->
</section><!-- /.page-header -->


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

        <section class="contact-map">
            <div class="container-fluid">
                <div class="google-map google-map__contact">
                    <iframe title="template google map" src="{{ $contactInfo->url }}" class="map__contact" allowfullscreen></iframe>
                </div><!-- /.google-map -->
            </div><!-- /.container-fluid -->
        </section><!-- /.contact-map -->
        @endsection