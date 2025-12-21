@extends('custom.master')

@section('content')

<section class="page-header">
    <div class="page-header__bg" style="background-image: url('assets/images/backgrounds/page-header-bg-1-1.png');"></div>
    <div class="container ">
        <ul class="floens-breadcrumb list-unstyled mt-5">
            <li><i class="icon-home"></i> <a href="/">Home</a></li>
            <li><span>Gallery</span></li>
        </ul>
    </div>
</section>

<section class="gallery-one section-space">
    <div class="container-fluid">
        <div class="text-center">
            <ul class="list-unstyled post-filter gallery-one__filter__list">
                <li class="active" data-filter=".filter-item"><span>All</span></li>
                @foreach($categories as $id => $title)
                    <li data-filter=".category-{{ $id }}"><span>{{ $title }}</span></li>
                @endforeach
            </ul>
        </div>

        <div class="row masonry-layout filter-layout">
            @foreach($galleries as $gallery)
                <div class="col-sm-6 col-xl-3 filter-item category-{{ $gallery->gallery_category_id }}">
                    <div class="gallery-one__card">
                        <img src="{{ $gallery->upload_file ? $gallery->upload_file->getUrl() : 'assets/images/gallery/default.jpg' }}" alt="{{ $gallery->title }}">
                        <div class="gallery-one__card__hover">
                            <a href="{{ $gallery->upload_file ? $gallery->upload_file->getUrl() : '#' }}" class="img-popup">
                                <span class="gallery-one__card__icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
