@section('bodyClass', 'blogs-page')
@section('headerClass', 'overlay-header')
@section('meta_title', 'News & Blogs')


@push('meta_data')
    <meta name="description" content="Stay updated with the latest news and insightful blogs from Star Unity Development Ltd. Explore industry trends, real estate tips, and company updates to make informed decisions about your property investments.">
     <meta name="keywords" content="real estate news, property blogs, real estate trends, investment tips, Star Unity Development Ltd news, real estate insights, property market updates, real estate industry news">


    <!-- Indexing (VERY IMPORTANT) -->
    <meta name="robots" content="index, follow">
    <!-- Alternatives:
           noindex, nofollow
           index, nofollow
           noindex, follow -->

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="News & Blogs - Star Unity Development Ltd.">
    <meta property="og:description" content="Stay updated with the latest news and insightful blogs from Star Unity Development Ltd. Explore industry trends, real estate tips, and company updates to make informed decisions about your property investments.">
    <meta property="og:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Star Unity Development Ltd.">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="News & Blogs - Star Unity Development Ltd.">
    <meta name="twitter:description" content="Stay updated with the latest news and insightful blogs from Star Unity Development Ltd. Explore industry trends, real estate tips, and company updates to make informed decisions about your property investments.">
    <meta name="twitter:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    
@endpush
<div>
         <section class="breadcrumb-section" style="background-image: url('{{asset('assets/images/2.webp')}}');">
            <div class="wrapper">
                <div class="breadcrumb-area">


                    <h1 class="title">News & Blogs</h1>

                    <p class="description">your dreams can come true. we are here to help you.</p>
                </div>
            </div>
        </section>
        <section class="filter-section">
            <div class="wrapper">


                <div class="filter-inner">
                    <div class="filter-item">
                        {{-- <div class="visual_studio_item">
                            <!--toggle button-->

                            <input type="radio" name="tabs" id="tab1" checked>
                            <label for="tab1">All</label>

                            <input type="radio" name="tabs" id="tab2" checked>
                            <label for="tab2">Planing</label>

                            <input type="radio" name="tabs" id="tab3" checked>
                            <label for="tab3">Blog Post</label>

                            <input type="radio" name="tabs" id="tab4" checked>
                            <label for="tab4">Office Related</label>
                        </div> --}}
                    </div>
                    <div class="filter-item">
                        <label for="">Search</label>
                        <input wire:model.live="search" type="text" placeholder="type something...">
                    </div>
                </div>
            </div>
        </section>

        <section class="post-section">
            <div class="wrapper">
                <div class="post-box">
                    @if ($blogs && $blogs->count()>0)
                    @foreach ($blogs as $blog_item)



                        <a href="{{ route('blogs.details', $blog_item->id) }}" class="item">
                            <div class="img">
                                <img src="{{ file_path($blog_item->featured_image)}}"  alt="travel_guys">
                            </div>
                            <div class="text">
                                <p class="tt_p1">{{ $blog_item->updated_at->format('d') }}</p>
                                <p class="tt_p2">{{ $blog_item->updated_at->format('M Y') }}</p>
                                {{-- <a href="#"><button>Planning</button></a> --}}
                                <br>
                                <h5 class="w-full">{{ $blog_item->title }}</h5>
                            </div>
                        </a>
                            @endforeach
                       @endif

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
