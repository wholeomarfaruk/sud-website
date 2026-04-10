@section('bodyClass','about-page')
@section('headerClass','overlay-header')
@section('meta_title', 'About Us')


@push('meta_data')
    <meta name="description" content="Learn about Star Unity Development Ltd., a leading Bangladeshi real estate company established in 2009. Discover our mission to provide high-quality housing solutions, our commitment to customer satisfaction, and our experienced team dedicated to delivering exceptional results in the real estate industry.">
     <meta name="keywords" content="Star Unity Development Ltd, about us, real estate company, Bangladeshi real estate, housing solutions, customer satisfaction, experienced team, real estate industry, property development, residential properties, commercial properties">
  

    <!-- Indexing (VERY IMPORTANT) -->
    <meta name="robots" content="index, follow">
    <!-- Alternatives:
           noindex, nofollow
           index, nofollow
           noindex, follow -->

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="About Us - Star Unity Development Ltd.">
    <meta property="og:description" content="Learn about Star Unity Development Ltd., a leading Bangladeshi real estate company established in 2009. Discover our mission to provide high-quality housing solutions, our commitment to customer satisfaction, and our experienced team dedicated to delivering exceptional results in the real estate industry.">
    <meta property="og:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Star Unity Development Ltd.">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="About Us - Star Unity Development Ltd.">
    <meta name="twitter:description" content="Learn about Star Unity Development Ltd., a leading Bangladeshi real estate company established in 2009. Discover our mission to provide high-quality housing solutions, our commitment to customer satisfaction, and our experienced team dedicated to delivering exceptional results in the real estate industry.">
    <meta name="twitter:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    
@endpush
<div>

    <section class="breadcrumb-section" style="background-image: url('assets/images/2.webp');">
        <div class="wrapper">
            <div class="breadcrumb-area">


                <h1 class="title">About Us</h1>

                <p class="description">We Make Your Dreams.</p>
            </div>
        </div>
    </section>
    <section class="count-sec section">
        <div class="wrapper">
            <div class="grid-box">
                <div class="item">

                        <span class="count">128</span>
                        <span class="label">Happy Clients</span>

                </div>
                <div class="item">

                        <span class="count">56</span>
                        <span class="label">Land Owners</span>

                </div>
                <div class="item">

                        <span class="count">7</span>
                        <span class="label">Years Experience</span>

                </div>
                <div class="item">

                        <span class="count">123</span>
                        <span class="label">Completed Projects</span>

                </div>
            </div>
        </div>
    </section>

    <section class="details-sec section">
        <div class="wrapper">

            <div class="flex-box">
                <div class="text-box">
                    <div class="section-header">
                        <h2 class="section-title">Star Unity Development</h2>
                    </div>
                    <p>
                        Star Unity Development is a leading Bangladeshi real estate company, established in 2009 to enhance its
                        customer’s lives through reliable products and services. We are committed to delivering high-quality
                        housing solutions that cater to the needs of our customers.
                        <br>
                        <br>
                        Our mission is to provide our customers with luxurious living spaces that are designed to provide
                        comfort, convenience, and a sense of community. We strive to create long-lasting relationships with
                        our customers by providing unparalleled customer service and ensuring that their needs are met at all
                        times.
                        <br>
                        <br>
                        Our team consists of experienced professionals who are dedicated to delivering exceptional results. We
                        take pride in our attention to detail and our commitment to excellence in all aspects of our business.
                        <br>
                        <br>
                        At Star Unity Development, we believe that everyone deserves to live in a beautiful home. That is why
                        we are dedicated to providing our customers with high-quality housing solutions that are designed to exceed
                        their expectations.
                    </p>

                </div>
                <div class="img-box">
                    <img src="assets/images/buildings/1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
 @livewire('website.partial.board-member-section')

</div>
