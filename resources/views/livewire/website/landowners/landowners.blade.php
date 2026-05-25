@section('bodyClass', 'landowner-page')
@section('meta_title', 'Our Land Owners')


@push('meta_data')
    <meta name="description"
        content="Star Unity Development Ltd. is committed to delivering high-quality residential and commercial properties with modern design, trusted construction, and exceptional value for our clients and partners.">
    <meta name="keywords"
        content="real estate development, property development, residential properties, commercial properties, modern design, trusted construction, exceptional value, Star Unity Development Ltd.">


    <!-- Indexing (VERY IMPORTANT) -->
    <meta name="robots" content="index, follow">
    <!-- Alternatives:
                       noindex, nofollow
                       index, nofollow
                       noindex, follow -->

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="Our Land Owners - Star Unity Development Ltd.">
    <meta property="og:description"
        content="Star Unity Development Ltd. is committed to delivering high-quality residential and commercial properties with modern design, trusted construction, and exceptional value for our clients and partners.">
    <meta property="og:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Star Unity Development Ltd.">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Our Land Owners - Star Unity Development Ltd.">
    <meta name="twitter:description"
        content="Star Unity Development Ltd. is committed to delivering high-quality residential and commercial properties with modern design, trusted construction, and exceptional value for our clients and partners.">
    <meta name="twitter:image" content="{{ asset('assets/logo/sud-logo-black.png') }}">
@endpush
@push('styles')
    <style>
        .testimonial-card .swiper-button-prev,
        .testimonial-card .swiper-button-next {
            top: 50%;
            transform: translateY(-50%);
            margin-top: 0 !important;
        }

        .testimonial-card .swiper-button-prev svg,
        .testimonial-card .swiper-button-next svg {
            width: 20px;
            height: 20px;
            stroke: white;
            color: white;
        }

        .nav-btn {
            width: 58px !important;
            height: 58px !important;
            border-radius: 9999px;
            background: #0a7806;
            color: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.14);
            --swiper-navigation-size: 18px;
        }

        .nav-btn::after {
            font-weight: 800;
        }

        .testimonialSwiper .swiper-pagination {
            bottom: 0 !important;
        }

        .testimonialSwiper .swiper-pagination-bullet {
            width: 34px;
            height: 4px;
            border-radius: 999px;
            background: #d4d4d8;
            opacity: 1;
        }

        .testimonialSwiper .swiper-pagination-bullet-active {
            background: #0a7806;
        }

        @media (min-width: 768px) {
            .testimonial-card .swiper-button-prev {
                left: -28px !important;
            }

            .testimonial-card .swiper-button-next {
                right: -28px !important;
            }
        }

        @media (max-width: 767px) {

            .testimonial-card .swiper-button-prev,
            .testimonial-card .swiper-button-next {
                top: auto;
                bottom: 16px;
                transform: none;
            }

            .testimonial-card .swiper-button-prev {
                left: 16px !important;
            }

            .testimonial-card .swiper-button-next {
                right: 16px !important;
            }
        }
    </style>
@endpush
<div>
    <section class="breadcrumb-section" style="background-image: url('assets/images/2.webp');">
        <div class="wrapper">
            <div class="breadcrumb-area">


                <h1 class="title">Our Land Owners</h1>

                <p class="description">We Make Your Dreams</p>
            </div>
        </div>
    </section>
    @livewire('website.partial.testimonials-section')
    <section class="details-sec section">
        <div class="wrapper">

            <div class="flex-box">
                <div class="text-box">
                    <div class="section-header">
                        <h2 class="section-title">Star Unity Development Ltd</h2>
                    </div>
                    <p>
                        Star Unity Development Ltd is a leading Bangladeshi real estate and construction company, established to enhance its customers' lives through reliable products and services. We have completed over 1200 projects and handed over more than 10,000 residential and commercial units in the last 50 years.
                        <br>
                        <br>
                        Why choose Star Unity Development Ltd?
                        <br>
                        <br>

                        <strong>• Reputation, Goodwill, and Past History</strong>
                        - One of the largest and oldest construction and real estate conglomerates in Bangladesh
                        - Completed more than 1200 well-known projects in Dhaka and abroad
                        - Handed over over 10,000 residential and commercial units
                        - Known for handing over projects in record-breaking time
                        <br>
                        <br>
                        <strong>• Reliability</strong>
                        - Credit rating is the ability of a business to fulfill its financial obligations
                        - Star Unity Development is one of the few developers rated AA+ by Credit Rating Agencies due to good business practices and prudent financial management
                        <br>
                        <br>
                        <strong>• Back-up Support</strong>
                        - Main strength: multiple concrete batching plants with a fleet of truck-mixers
                        - Concrete block plants and quality material manufacturing
                        - Impossible to control construction quality unless raw materials quality can be controlled
                        <br>
                        <br>
                        <strong>• Getting the Maximum Return for Your Land</strong>
                        - Luxury apartments always coveted and sell at a premium
                        - Units leased by Embassies after being checked and verified by foreign teams
                        <br>
                        <br>
                        <strong>• Quality of Work</strong>
                        - Never compromise on quality or safety
                        - Finishing is one of the best
                        - Computerized batching plants for all concreting
                        - Experienced engineering, design and construction teams
                        - Incorporates all design safety factors
                        <br>
                        <br>
                        <strong>• Appearance and Amenities</strong>
                        - Outstanding buildings with new concepts and features
                        - Double height entrances, high ceilings, hotel grade lobbies
                        - Infinity pools, state-of-the-art gyms, landscaped roofs and mood lighting
                        - Making visitors feel like walking into a 5-star hotel
                        <br>
                        <br>
                        <strong>• Experience</strong>
                        - Over 50 years of experience in construction and real estate
                        - Received National Environment Award 2020
                        - Daily Star & DHL "Enterprise of the Year 2000" Award recipient
                    </p>

                </div>
                <div class="img-box">
                    <img src="assets/images/buildings/1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="wrapper">
            <div class="tour-gallery">
                <h2 class="section-title">Gallery</h2>
                <div class="gallery-container">
                    <div class="gallery-item">
                        <a data-fancybox="gallery" href="#" data-caption="">
                            <img src="" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@push('scripts')
    <script>
        addEventListener("DOMContentLoaded", () => {
              Fancybox.bind('[data-fancybox="gallery"]', {
                // Your custom options for a specific gallery
            });
            new Swiper(".testimonialSwiper", {
                loop: true,
                speed: 700,
                spaceBetween: 24,
                grabCursor: true,
                keyboard: {
                    enabled: true,
                },
                pagination: {
                    el: ".testimonialSwiper .swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".testimonial-card .swiper-button-next",
                    prevEl: ".testimonial-card .swiper-button-prev",
                },
            });
        });
    </script>
@endpush
