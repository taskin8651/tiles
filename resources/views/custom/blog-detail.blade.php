@extends('custom.master')

@section('title', $blog->name)

@section('content')

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="page-header__bg"
         style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');">
    </div>

    <div class="container">

        <ul class="floens-breadcrumb list-unstyled mt-5">
            <li><i class="icon-home"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('blogs.index') }}">Blog</a></li>
            <li><span>{{ Str::limit($blog->name, 40) }}</span></li>
        </ul>
    </div>
</section>

<!-- BLOG DETAILS -->
<section class="blog-page section-space">
    <div class="container">
        <div class="row gutter-y-60">

            <!-- BLOG CONTENT -->
            <div class="col-lg-8">
                <div class="blog-details">

                    <div class="blog-card wow fadeInUp" data-wow-duration="1500ms">

                        <!-- MAIN IMAGE -->
                        @if($blog->image)
                        <div class="blog-card__image">
                            <img src="{{ $blog->image->url }}" alt="{{ $blog->name }}">

                            <div class="blog-card__date">
                                <span class="blog-card__date__day">{{ $blog->created_at->format('d') }}</span>
                                <span class="blog-card__date__month">{{ $blog->created_at->format('M') }}</span>
                            </div>
                        </div>
                        @endif

                        <!-- CONTENT -->
                        <div class="blog-card__content">

                            <ul class="list-unstyled blog-card__meta">
                                <li>
                                    <i class="icon-user"></i> by Admin
                                </li>
                                <li>
                                    <i class="icon-calendar"></i>
                                    {{ $blog->created_at->format('d M Y') }}
                                </li>
                            </ul>

                            <h3 class="blog-card__title">{{ $blog->name }}</h3>

                            <!-- SHORT DESCRIPTION -->
                            @if($blog->short_description)
                                <p class="blog-card__text blog-card__text--one">
                                    {{ $blog->short_description }}
                                </p>
                            @endif

                           

                            <!-- EXTRA IMAGES -->
                            <div class="blog-details__inner mt-4">
                                <div class="row gutter-y-30">

                                    @if($blog->image_2)
                                    <div class="col-md-6">
                                        <div class="blog-details__inner__image">
                                            <img src="{{ $blog->image_2->url }}" alt="Blog image">
                                        </div>
                                    </div>
                                    @endif

                                    @if($blog->image_3)
                                    <div class="col-md-6">
                                        <div class="blog-details__inner__image">
                                            <img src="{{ $blog->image_3->url }}" alt="Blog image">
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>

                             <!-- FULL DESCRIPTION -->
                            <div class="blog-card__text blog-card__text--two mt-4">
                                {!! $blog->description  !!}
                            </div>

                        </div>
                    </div>

                    <!-- SHARE -->
                    @php
                        $shareUrl = urlencode(url()->current());
                        $shareTitle = urlencode($blog->name);
                    @endphp

                    <div class="blog-details__meta mt-4">
                        <div class="blog-details__social">
                            <h4 class="blog-details__meta__title">Share:</h4>

                            <div class="details-social">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank">
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank">
                                    <i class="icon-linkedin"></i>
                                </a>
                                <a href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank">
                                    <i class="icon-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <aside class="widget-area">

                        <!-- LATEST BLOGS -->
                        <div class="sidebar__single sidebar__posts-wrapper">
                            <h4 class="sidebar__title">Latest Posts</h4>

                            <ul class="sidebar__posts list-unstyled">
                                @foreach(\App\Models\Blog::latest()->where('id','!=',$blog->id)->limit(3)->get() as $latest)
                                    <li class="sidebar__posts__item">
                                        <div class="sidebar__posts__image">
                                            <img src="{{ optional($latest->image)->thumbnail ?? asset('assets/images/blog/lp-placeholder.jpg') }}">
                                        </div>

                                        <div class="sidebar__posts__content">
                                            <p class="sidebar__posts__meta">
                                                <i class="icon-user"></i> Admin
                                            </p>
                                            <h4 class="sidebar__posts__title">
                                                <a href="{{ route('blogs.show', $latest->id) }}">
                                                    {{ Str::limit($latest->name, 45) }}
                                                </a>
                                            </h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </aside>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
