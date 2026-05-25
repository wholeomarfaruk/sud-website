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
        @livewire('website.partial.testimonials-section')

</div>

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
@push('scripts')
    <script>
        addEventListener("DOMContentLoaded", () => {
            new Swiper(".testimonialSwiper", {
                loop: true,
                speed: 700,
                spaceBetween: 24,
                grabCursor: true,
                keyboard: { enabled: true },
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
