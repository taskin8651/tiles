@extends('custom.master')

@section('content')

<section class="page-header">
    <div class="page-header__bg" style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');"></div>
    <div class="container">
        <h2 class="page-header__title">Blog Grid</h2>
        <ul class="floens-breadcrumb list-unstyled">
            <li><i class="icon-home"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><span>Blogs</span></li>
        </ul>
    </div>
</section>

<section class="blog-page section-space">
    <div class="container">
        <div class="row gutter-y-30">

            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="blog-card wow fadeInUp" data-wow-duration="1500ms">
                    
                    <div class="blog-card__image">
                        <img src="{{ $blog->image?->url ?? asset('assets/images/blog/blog-1-1.jpg') }}" alt="{{ $blog->name }}">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="blog-card__image__link">
                            <span class="sr-only">{{ $blog->name }}</span>
                        </a>
                    </div>

                    <div class="blog-card__date">
                        <span class="blog-card__date__day">{{ $blog->created_at->format('d') }}</span>
                        <span class="blog-card__date__month">{{ $blog->created_at->format('M') }}</span>
                    </div>

                    <div class="blog-card__content">
                        <h3 class="blog-card__title">
                            <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->name }}</a>
                        </h3>
                        <p class="blog-card__text">
                            {{ Str::limit($blog->short_description, 90) }}
                        </p>
                    </div>

                    <ul class="list-unstyled blog-card__meta">
                        <li><i class="icon-user"></i> by Admin</li>
                    </ul>

                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="col-12">
                {{ $blogs->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</section>

@endsection
