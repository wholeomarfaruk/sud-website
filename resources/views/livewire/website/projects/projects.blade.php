@section('bodyClass', 'projects-page')
@section('headerClass', 'overlay-header')
@section('meta_title', 'Properties')


@push('meta_data')
    <meta name="description" content="Explore our diverse range of properties at Star Unity Development Ltd. Discover modern residential and commercial spaces designed to meet your lifestyle and business needs. Find your dream property with us today.">
     <meta name="keywords" content="properties, real estate, residential properties, commercial properties, modern design, Star Unity Development Ltd properties, buy property, property investment">


    <!-- Indexing (VERY IMPORTANT) -->
    <meta name="robots" content="index, follow">
    <!-- Alternatives:
           noindex, nofollow
           index, nofollow
           noindex, follow -->

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="Properties - Star Unity Development Ltd.">
    <meta property="og:description" content="Explore our diverse range of properties at Star Unity Development Ltd. Discover modern residential and commercial spaces designed to meet your lifestyle and business needs. Find your dream property with us today.">
    <meta property="og:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Star Unity Development Ltd.">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Properties - Star Unity Development Ltd.">
    <meta name="twitter:description" content="Explore our diverse range of properties at Star Unity Development Ltd. Discover modern residential and commercial spaces designed to meet your lifestyle and business needs. Find your dream property with us today.">
    <meta name="twitter:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    
@endpush
<div>
           <section class="breadcrumb-section" style="background-image: url('{{asset('assets/images/2.webp')}}');">
            <div class="wrapper">
                <div class="breadcrumb-area">


                    <h1 class="title">Properties</h1>

                    <p class="description">We Make Your Dreams.</p>
                </div>
            </div>
        </section>
        <section class="projects_filter section">
            <div class="wrapper">
                <div>
                    <!-- <h3 class="filter-title">Search Projects</h3> -->
                    <div class="filter-inner">
                        <div class="filter-item">
                            <label for="">Location</label>
                            <select wire:model.live="location" id="">
                                <option value="">Select Location</option>
                                @foreach ($locations as $location_item)

                                <option value="{{ $location_item->id }}">{{ $location_item->name }}</option>

                                @endforeach


                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="">Type</label>
                            <select wire:model.live="type" id="">
                                <option value="">Select type</option>
                                 @foreach (\App\Enums\Project\ProjectType::cases() as $type_item)
                                <option value="{{ $type_item->value }}">{{ $type_item->value }}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="">Status</label>
                            <select wire:model.live="status" id="">
                                <option value="">Select status</option>
                                   @foreach (\App\Enums\Project\ProjectStatus::cases() as $status_item)
                                <option value="{{ $status_item->value }}">{{ $status_item->value }}</option>
                                @endforeach


                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="">Search</label>
                            <input wire:model.live="search" type="text" placeholder="type something...">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="projects-section ">
            <div class="wrapper">
                <div class="projects-grid">
                    @foreach ($properties as $property)


                    <a href="{{route('properties.details',$property->slug)}}" class="item">
                        <img src="{{file_path($property->featured_image_id)}}" alt="">
                        <span class="overlay-icon">
                            <i class="bx bx-link bx-flashing"></i>
                        </span>
                        <div class="overlay">
                            <h2>{{ $property->title }}</h2>
                            <p>{{ $property->location }}</p>
                        </div>
                    </a>
                     @endforeach

                </div>
                {{-- <div class="pagination">
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="#" class="pagination-link pagination-link-prev">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                                </svg>
                            Prev


                            </a>
                        </li>

                        <li class="pagination-item">
                            <a href="#" class="pagination-link pagination-link-active">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">3</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">...</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link">4</a>
                        </li>
                        <li class="pagination-item">
                            <a href="#" class="pagination-link pagination-link-next">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                </svg>




                            </a>
                        </li>
                    </ul>

                </div> --}}
            </div>
        </section>

</div>
