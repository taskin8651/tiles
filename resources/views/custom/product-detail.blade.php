@extends('custom.master')
@section('title', $product->title)
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.12.313/pdf_viewer.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.12.313/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.12.313/pdf_viewer.min.js"></script>


<style>
 .floating-download-btn {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 60px;
    height: 60px;
    background: #c29a5c;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    z-index: 9999;
    transition: all 0.3s ease;
}

.floating-download-btn:hover {
    background: #a88147;
    transform: scale(1.1);
    text-decoration: none;
}

/* Optional modal customization */
#pdfModal .modal-content {
    border-radius: 12px;
}

#pdfModal .modal-header {
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

#pdfModal .btn-light {
    background-color: rgba(255,255,255,0.9);
}

#pdfModal iframe {
    min-height: 600px;
}

</style>

  @if($product->document)
    <!-- Floating Button -->
    <a href="javascript:void(0);" 
       class="floating-download-btn" 
       data-bs-toggle="modal" 
       data-bs-target="#pdfModal"
       data-pdf="{{ $product->document->getUrl() }}"
       title="View Brochure">
        <i class="icon-download"></i>
    </a>

   <!-- PDF Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white py-3 px-4">
                <h5 class="modal-title mb-0">Brochure PDF</h5>
                <div class="ms-auto d-flex align-items-center">
                    <a href="{{ $product->document->getUrl() }}" 
                       class="btn btn-light btn-sm me-2" 
                       target="_blank"
                       download
                       title="Download PDF">
                        <i class="bi bi-download me-1"></i> Download
                    </a>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="{{ url('/pdf/'.$product->id) }}" 
                            width="100%" height="100%" 
                            style="border:none;" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Optional Footer -->
            <div class="modal-footer justify-content-center py-2">
                <small class="text-muted">Use the download button to save the PDF</small>
            </div>
        </div>
    </div>
</div>
@endif
<script>
document.addEventListener('DOMContentLoaded', function() {
    var pdfModal = document.getElementById('pdfModal');

    pdfModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var pdfUrl = button.getAttribute('data-pdf');
        var embed = pdfModal.querySelector('#pdfEmbed');
        embed.src = pdfUrl;

        // Update modal download button href dynamically
        var downloadBtn = pdfModal.querySelector('.modal-header a.btn-primary');
        if(downloadBtn) downloadBtn.href = pdfUrl;
    });

    pdfModal.addEventListener('hidden.bs.modal', function () {
        var embed = pdfModal.querySelector('#pdfEmbed');
        embed.src = ""; // Reset embed when modal closes
    });
});
</script>



<!-- PAGE HEADER -->
<section class="page-header">
    <div class="page-header__bg"
         style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');">
    </div>

    <div class="container py-5">
        <!-- <h2 class="page-header__title">{{ $product->title }}</h2> -->
        <ul class="floens-breadcrumb list-unstyled">
            <li><i class="icon-home"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('products.index') }}">Shop</a></li>
            <li><span>{{ $product->title }}</span></li>
        </ul>
    </div>
</section>

 
        <section class="product-details section-space">
            <div class="container">
                <!-- /.product-details -->
                <div class="row gutter-y-50">
                    <!-- IMAGE GALLERY -->
            <div class="col-lg-6 wow fadeInLeft">

                <div class="product-details__img">

                    <!-- MAIN SLIDER -->
                    <div class="swiper product-details__gallery-top">
                        <div class="swiper-wrapper">

                            @foreach([$product->image, $product->image_1, $product->image_2, $product->image_3] as $img)
                                @if($img)
                                    <div class="swiper-slide">
                                        <img src="{{ $img->url }}"
                                             class="product-details__gallery-top__img"
                                             alt="{{ $product->title }}">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                    <!-- THUMB SLIDER -->
                    <div class="swiper product-details__gallery-thumb">
                        <div class="swiper-wrapper">

                            @foreach([$product->image, $product->image_1, $product->image_2, $product->image_3] as $img)
                                @if($img)
                                    <div class="swiper-slide product-details__gallery-thumb-slide">
                                        <img src="{{ $img->thumbnail ?? $img->url }}"
                                             class="product-details__gallery-thumb__img"
                                             alt="{{ $product->title }}">
                                    </div>
                                @endif
                            @endforeach
                            

                        </div>
                    </div>

                </div>
            </div>


                    <div class="col-lg-6 col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                        <div class="product-details__content">
                            <div class="product-details__top">
                                <div class="product-details__top__left">
                                    <h3 class="product-details__name">{{ $product->title }}</h3><!-- /.product-title -->
                                    <!-- <h4 class="product-details__price">₹{{ number_format($product->price, 2) }} <small class="product-details__price__small" style="font-size: 12px;">(per sq.ft)</small> </h4>/.product-price -->
                                </div><!-- /.product-details__price -->
                                  @if($product->video)
                            <a href="{{ $product->video->getUrl() }}" 
                               class="product-details__video video-button video-popup">
                                <span class="icon-play"></span>
                                <i class="video-button__ripple"></i>
                            </a>
                        @endif
                            </div>
                           
                            <div class="product-details__excerpt">
                                <p class="product-details__excerpt__text1">
                                    {{ $product->short_description }}
                                </p>
                            </div><!-- /.excerp-text -->
                            <div class="product-details__color">
                                <h3 class="product-details__content__title">Brand</h3>
                                <div class="product-details__color__box">
                                   {{ $product->brand_name }}
                                </div><!-- /.product-details__color__box -->
                            </div><!-- /.product-details__color -->


                            <div class="product-details__color">
                                <h3 class="product-details__content__title">Size</h3>
                                <div class="product-details__size__box">
                                    {{ $product->size }} (MM)
                                </div><!-- /.product-details__size__box -->
                            </div><!-- /.product-details__size -->

                            <div class="product-details__color">
                                <h3 class="product-details__content__title">Finish</h3>
                                <div class="product-details__size__box">
                                   {{ ucfirst($product->finish) }}
                                </div><!-- /.product-details__size__box -->
                            </div><!-- /.product-details__size -->

                            <div class="product-details__color">
                                <h3 class="product-details__content__title">Thickness</h3>
                                <div class="product-details__size__box">
                                   {{ $product->thickness }} (MM)
                                </div><!-- /.product-details__size__box -->
                            </div><!-- /.product-details__size -->


                            <div class="product-details__color">
                                <h3 class="product-details__content__title">Usage Area</h3>
                                <div class="product-details__size__box">
                                    {{ $product->usage_area }}
                                </div><!-- /.product-details__size__box -->
                            </div><!-- /.product-details__size -->

                            <div class="product-details__color">
                                <h3 class="product-details__content__title">Category</h3>
                                <div class="product-details__size__box">
                                    {{ $product->category->name }}
                                </div><!-- /.product-details__size__box -->
                            </div><!-- /.product-details__size -->

                            <div class="product-details__size">
                                <h3 class="product-details__content__title">Tags</h3>
                                <div class="product-details__size__box">
                                    {{ $product->tag->name }}
                                </div><!-- /.product-details__size__box -->
                            </div><!-- /.product-details__size -->


                           <!-- Enquiry Now Button -->
<div class="product-details__quantity">
    <a href="javascript:void(0)" class="btn floens-btn" data-bs-toggle="modal" data-bs-target="#enquiryModal">
    Enquiry Now <i class="icon-cart ms-1"></i>
</a>

                                @php
    $shareUrl = urlencode(url()->current());
    $shareTitle = urlencode($product->title ?? config('app.name'));
@endphp

<div class="product-details__socials">
    <h3 class="product-details__socials__title">Share:</h3>

    <div class="details-social">

        {{-- Facebook --}}
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
           target="_blank">
            <i class="icon-facebook"></i>
            <span class="sr-only">Facebook</span>
        </a>

        {{-- Twitter / X --}}
        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
           target="_blank">
            <i class="icon-twitter"></i>
            <span class="sr-only">Twitter</span>
        </a>

        {{-- LinkedIn --}}
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
           target="_blank">
            <i class="icon-linkedin"></i>
            <span class="sr-only">LinkedIn</span>
        </a>

        {{-- WhatsApp --}}
        <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}"
           target="_blank">
            <i class="icon-whatsapp"></i>
            <span class="sr-only">WhatsApp</span>
        </a>

        {{-- Telegram --}}
        <a href="https://t.me/share/url?url={{ $shareUrl }}&text={{ $shareTitle }}"
           target="_blank">
            <i class="icon-telegram"></i>
            <span class="sr-only">Telegram</span>
        </a>

        {{-- Email --}}
        <a href="mailto:?subject={{ $shareTitle }}&body={{ $shareUrl }}">
            <i class="icon-envelope"></i>
            <span class="sr-only">Email</span>
        </a>

    </div>
</div>

                            </div><!-- /.product-details__info -->
                           
                          


                           
                        </div>
                    </div>
                </div>
                <!-- /.product-details -->
            </div>
            <div class="product-details__description-wrapper">
                <div class="container">
                    <!-- /.product-description -->
                    <div class="product-details__description">
                        <h3 class="product-details__description__title">product Description</h3>
                        <div class="product-details__text__box wow fadeInUp" data-wow-delay="300ms">
                            <p class="product-details__description__text">
                                {!! nl2br(e($product->description)) !!}
                            </p>
                           
                        </div><!-- /.product-details__text__box -->
                    </div>
                    <!-- /.product-description -->
                </div><!-- /.container -->
            </div><!-- /.product-details__description__wrapper -->


           <!-- Enquiry Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 shadow-lg">
            <div class="modal-header bg-light border-bottom-0">
                <h5 class="modal-title fw-bold">Get In Touch With Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5" style="background: #fdf7f0; border-radius: 0 0 15px 15px;">
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="row g-4">

                        <!-- Name -->
                        <div class="col-12">
                            <input type="text" name="name" class="form-control form-control-lg rounded-3" placeholder="Your Name" value="{{ old('name') }}">
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <!-- Email -->
                        <div class="col-12">
                            <input type="email" name="email" class="form-control form-control-lg rounded-3" placeholder="Your Email" value="{{ old('email') }}">
                            @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="col-12">
                            <input type="text" name="number" class="form-control form-control-lg rounded-3" placeholder="Your Phone Number" value="{{ old('number') }}">
                            @error('number')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <!-- Full Address -->
                        <div class="col-12">
                            <input type="text" name="full_address" class="form-control form-control-lg rounded-3" placeholder="Your Full Address" value="{{ old('full_address') }}">
                            @error('full_address')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <!-- Product (Readonly) -->
                        <div class="col-12">
                            <input type="text" class="form-control form-control-lg rounded-3 bg-light" value="{{ $product->title }}" readonly>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <textarea name="message" class="form-control form-control-lg rounded-3" rows="5" placeholder="Write your message">{{ old('message') }}</textarea>
                            @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                            <button type="submit" class="btn floens-btn px-5 py-2 shadow-sm">
                                <span>Send Message</span>
                                <i class="icon-right-arrow ms-2"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional CSS -->
<style>
    .floens-btn {
        background-color: #c29a5c;
        color: #fff;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .floens-btn:hover {
        background-color: #a88147;
        transform: scale(1.05);
        color: #fff;
        text-decoration: none;
    }
    .modal-body input.form-control,
    .modal-body textarea.form-control {
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }
    .modal-body input.form-control:focus,
    .modal-body textarea.form-control:focus {
        border-color: #c29a5c;
        box-shadow: 0 0 8px rgba(194, 154, 92, 0.3);
    }
</style>


<!-- Trigger Button -->



            @endsection