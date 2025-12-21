@extends('custom.master')

@section('content')

{{-- PAGE HEADER --}}
<section class="page-header">
    <div class="page-header__bg"
         style="background-image: url('{{ asset('assets/images/backgrounds/page-header-bg-1-1.png') }}');">
    </div>

    <div class="container">
        <ul class="floens-breadcrumb list-unstyled mt-5">
            <li><i class="icon-home"></i> <a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('services.index') }}">Services</a></li>
            <li><span>{{ $service->title }}</span></li>
        </ul>
    </div>
</section>

{{-- SERVICE DETAILS --}}
<section class="service-details section-space">
    <div class="container">
        <div class="row gutter-y-30">

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                <div class="service-sidebar">

                    {{-- SERVICE LIST --}}
                    <div class="service-sidebar__single">
                        <ul class="list-unstyled service-sidebar__nav">
                            @foreach($services as $item)
                                <li class="{{ $item->id == $service->id ? 'active' : '' }}">
                                    <a href="{{ route('services.show', $item->id) }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- BROCHURE --}}
                    @if($service->brochure)
                        <div class="service-sidebar__single">
                            <div class="service-sidebar__company">
                                <a href="{{ $service->brochure->getUrl() }}"
                                   download
                                   class="service-sidebar__company__btn">
                                    <span class="icon-download"></span>
                                </a>
                                <h4 class="service-sidebar__company__title">
                                    Service Brochure
                                </h4>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            {{-- CONTENT --}}
            <div class="col-lg-8">
                <div class="service-details__content">

                    {{-- IMAGE --}}
                    @if($service->image)
                        <div class="service-details__thumbnail">
                            <img src="{{ $service->image->url }}"
                                 alt="{{ $service->title }}">
                        </div>
                    @endif

                    {{-- TITLE --}}
                    <h3 class="service-details__title">{{ $service->title }}</h3>

                    {{-- SHORT DESCRIPTION --}}
                    <p class="service-details__text">
                        {{ $service->short_description }}
                    </p>

                   

                    {{-- EXTRA IMAGE --}}
                    @if($service->image_1)
                        <div class="service-details__info mt-4">
                            <img src="{{ $service->image_1->url }}"
                                 alt="{{ $service->title }}"
                                 class="img-fluid">
                        </div>
                    @endif

                     {{-- FULL DESCRIPTION --}}
                    <div class="service-details__text-two">
                        {!! $service->description !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
