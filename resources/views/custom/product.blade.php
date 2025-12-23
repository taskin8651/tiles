@extends('custom.master')

@section('content')
<style>
    .product__badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: #c29a5c;
    color: #fff;
    padding: 6px 12px;
    font-size: 12px;
    font-weight: 600;
    border-radius: 4px;
    z-index: 2;
}

.product__item__text {
    font-size: 14px;
    color: #666;
    margin: 8px 0;
}

</style>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');"></div>
    <div class="container">
        <h2 class="page-header__title">Shop</h2>
        <ul class="floens-breadcrumb list-unstyled">
            <li><i class="icon-home"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><span>Shop</span></li>
        </ul>
    </div>
</section>

<section class="product-page section-space-bottom">
    <div class="container">
        <div class="row gutter-y-60">

            <!-- PRODUCTS -->
            <div class="col-xl-9 col-lg-8">

                <!-- TOP INFO -->
                <div class="product__info-top">
                    <div class="product__showing-text-box">
                        <p class="product__showing-text">
                            Showing 
                            {{ $products->firstItem() }}–{{ $products->lastItem() }} 
                            of {{ $products->total() }} Results
                        </p>
                    </div>
                </div>

                <!-- PRODUCT GRID -->
                <div class="row gutter-y-30">
                   @forelse($products as $product)
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="product__item wow fadeInUp" data-wow-duration="1500ms">

            <div class="product__item__image position-relative">

                {{-- TAG BADGE --}}
                @if($product->tag)
                    <span class="product__badge">
                        {{ $product->tag->name }}
                    </span>
                @endif

                <img 
                    src="{{ $product->image ? $product->image->url : asset('assets/images/no-image.png') }}"
                    alt="{{ $product->title }}">
            </div>

            <div class="product__item__content">

                <h4 class="product__item__title">
                    <a href="{{ route('products.show', $product->id) }}">
                        {{ $product->title }}
                    </a>
                </h4>

                {{-- SHORT DESCRIPTION --}}
                @if($product->short_description)
                    <p class="product__item__text">
                        {{ Str::limit($product->short_description, 68) }}
                    </p>
                @endif

                <!-- <div class="product__item__price">
                    ₹{{ number_format($product->price, 2) }} (per sq.ft)
                </div> -->

                <a href="javascript:void(0)" class="floens-btn product__item__link">
                    <span>Enquiry Now</span>
                    <i class="icon-cart"></i>
                </a>

            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <p>No products found.</p>
    </div>
@endforelse

                </div>

                <!-- PAGINATION -->
                <div class="col-12 mt-4">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-xl-3 col-lg-4">
               <aside class="product__sidebar">

    <!-- SEARCH -->
    <div class="product__search-box product__sidebar__item">
        <form method="GET" action="{{ route('products.index') }}" class="product__search">
            <input type="text" name="search" placeholder="Search items"
                   value="{{ request('search') }}">
            <button type="submit">
                <span class="icon-search"></span>
            </button>
        </form>
    </div>

    <!-- CATEGORIES -->
    <div class="product__categories product__sidebar__item">
        <h3 class="product__sidebar__title">Categories</h3>
        <ul class="list-unstyled">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('products.index', ['category' => $category->id]) }}"
                       class="{{ request('category') == $category->id ? 'active' : '' }}">
                        <span>{{ $category->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- TAGS -->
    <div class="product__categories product__sidebar__item">
        <h3 class="product__sidebar__title">Tags</h3>
        <ul class="list-unstyled">
            @foreach($tags as $tag)
                <li>
                    <a href="{{ route('products.index', ['tag' => $tag->id]) }}"
                       class="{{ request('tag') == $tag->id ? 'active' : '' }}">
                        <span>{{ $tag->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- SIZE FILTER -->
    <div class="product__categories product__sidebar__item">
        <h3 class="product__sidebar__title">Sizes</h3>
        <ul class="list-unstyled">
            @foreach($sizes as $size)
                <li>
                    <a href="{{ route('products.index', ['size' => $size->size]) }}"
                       class="{{ request('size') == $size->size ? 'active' : '' }}">
                        <span>{{ $size->size }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</aside>

            </div>

        </div>
    </div>
</section>

@endsection
