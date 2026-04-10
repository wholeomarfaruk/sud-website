@section('bodyClass','client-page')
@section('meta_title', 'Our Clients')


@push('meta_data')
  <meta name="description" content="Star Unity Development Ltd. is committed to delivering high-quality residential and commercial properties with modern design, trusted construction, and exceptional value for our clients and partners.">
  <meta name="keywords" content="real estate development, property development, residential properties, commercial properties, modern design, trusted construction, exceptional value, Star Unity Development Ltd.">


  <!-- Indexing (VERY IMPORTANT) -->
  <meta name="robots" content="index, follow">
  <!-- Alternatives:
       noindex, nofollow
       index, nofollow
       noindex, follow -->

  <!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}" />

  <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
  <meta property="og:title" content="Our Clients - Star Unity Development Ltd.">
<meta property="og:description" content="Star Unity Development Ltd. is committed to delivering high-quality residential and commercial properties with modern design, trusted construction, and exceptional value for our clients and partners.">
<meta property="og:image" content="{{ asset('assets/logo/sud-logo-black.png')}}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Star Unity Development Ltd.">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Our Clients - Star Unity Development Ltd.">
  <meta name="twitter:description" content="Star Unity Development Ltd. is committed to delivering high-quality residential and commercial properties with modern design, trusted construction, and exceptional value for our clients and partners.">
  <meta name="twitter:image" content="{{ asset('assets/logo/sud-logo-black.png')}}">
@endpush
<div>

        <section class="breadcrumb-section" style="background-image: url('assets/images/2.webp');">
            <div class="wrapper">
                <div class="breadcrumb-area">


                    <h1 class="title">Our Clients</h1>

                    <p class="description">your dreams can come true. we are here to help you.</p>
                </div>
            </div>
        </section>
        <section class="details-sec section">
            <div class="wrapper">

                <div class="flex-box">
                    <div class="text-box">
                        <div class="section-header">
                            <h2 class="section-title">Star Unity Development Ltd</h2>
                        </div>
                        <p>
                            Star Unity Development is a leading Bangladeshi conglomerate, established in 2009 to enhance
                            its customer’s lives through reliable products and services. It ventured into the real
                            estate sector of Bangladesh in 2015.
                            <br>
                            <br>
                            Why choose Edison Real Estate?
                            <br>
                            <br>

                            • Faster Execution of Projects
                            - Proper planning & usage of the latest technologies.
                            - Experienced, proven & skilled construction team.
                            - Prior handover before committed deadline.
                            <br>
                            • Elegant Design
                            - Contemporary vernacular architectures.
                            - Quality space design.
                            <br>
                            • Total Quality Control
                            <br>
                            <br>
                            • Living Standard Upgradation
                            - Sumptuous amenities
                            - Benchmark materials.
                            <br>
                            <br>
                            • Unparalleled Customer Service
                            <br>
                            <br>
                            • Dedicated after sales service / facility management
                            <br>
                            <br>
                            • Value for Money
                            - Luxury in reasonable worth
                            - across the promising locations of the capital
                            - property and value appreciate over course of time
                        </p>

                    </div>
                    <div class="img-box">
                        <img src="assets/images/buildings/1.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="video-section section">
            <div class="wrapper">
                <div class="video-gallery">

                    <h2 class="section-title">Reviews</h2>
                    <hr class="dividor">
                    <div class="video-grid">
                        <div href="assets/videos/Ads - 002_2.mp4" data-fancybox="video-gallery" class="item"
                            style="background-image: url(assets/videos/thumbnail.png)">
                            <div class="inner-box">
                                <span class="play-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8">
                                        </path>
                                        <path d="m9 17 8-5-8-5z"></path>
                                    </svg>
                                </span>
                                <div class="footer-area">
                                    <h3>Flat overview</h3>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        02:30</span>
                                </div>
                            </div>
                        </div>
                        <div href="assets/videos/Ads - 001.mp4" data-fancybox="video-gallery" class="item"
                            style="background-image: url(assets/videos/thumbnail-2.png)">
                            <div class="inner-box">
                                <span class="play-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8">
                                        </path>
                                        <path d="m9 17 8-5-8-5z"></path>
                                    </svg>
                                </span>
                                <div class="footer-area">
                                    <h3>Flat overview</h3>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        02:30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</div>

@push('scripts')


    <script>
        Fancybox.bind('[data-fancybox="video-gallery"]', {
            // Your custom options for a specific gallery
        });
    </script>
@endpush
