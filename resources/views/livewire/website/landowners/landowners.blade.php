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
    <section class="relative flex  items-center justify-center overflow-hidden px-4 py-8 sm:px-2 lg:px-4">
        <!-- subtle background decoration -->
        <div class="pointer-events-none absolute inset-0 opacity-10">
            <div class="absolute left-[8%] top-0 h-full w-px bg-white"></div>
            <div class="absolute right-[12%] top-0 h-full w-px bg-white"></div>
            <div class="absolute left-0 top-[18%] h-px w-full bg-white"></div>
        </div>

        <div
            class="testimonial-card relative w-full max-w-[1260px] overflow-visible rounded-[2px] bg-white px-6 py-10 shadow-[0_20px_60px_rgba(0,0,0,0.12)] sm:px-10 md:px-16 md:py-14">
            <!-- heading -->
            <div class="mb-12 text-center">
                <div class="mx-auto mb-4 h-[3px] w-10 rounded-full bg-[#0a7806]"></div>
                <h2 class="text-3xl font-semibold tracking-[0.16em] text-zinc-900 sm:text-4xl">
                    Land Owners Reviews
                </h2>
                <p class="mt-3 text-base text-zinc-500 sm:text-lg">
                    See what our land owners are saying.
                </p>
            </div>

            <!-- Swiper -->
            <div class="swiper testimonialSwiper pb-16 md:pb-14">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <article class="grid items-center gap-12 lg:grid-cols-[340px_1fr]">
                            <div class="relative mx-auto h-[280px] w-[280px] sm:h-[300px] sm:w-[300px]">
                                <span class="absolute left-3 top-8 h-36 w-36 rounded-full bg-[#0a7806]"></span>
                                <span class="absolute left-10 top-0 h-56 w-56 rounded-full bg-[#0a7806]"></span>

                                <img src="https://i.pravatar.cc/320?img=12" alt="Abdur Rahman"
                                    class="absolute bottom-0 left-[58px] h-[210px] w-[210px] rounded-full object-cover shadow-[0_20px_40px_rgba(0,0,0,0.18)] ring-8 ring-white/70 sm:left-[64px] sm:h-[220px] sm:w-[220px]" />
                            </div>

                            <div class="text-center lg:text-left">
                                <p
                                    class="mx-auto max-w-[560px] text-lg italic leading-8 text-zinc-500 sm:text-xl lg:mx-0">
                                    "Working with Star Unity Development transformed my land investment.
                                    Their professionalism and transparent process delivered exceptional returns."
                                </p>

                                <h3 class="mt-8 text-3xl font-semibold tracking-[0.04em] text-[#0a7806] sm:text-4xl">
                                    Abdur Rahman
                                </h3>
                                <p class="mt-2 text-lg text-zinc-400">Land owner</p>
                            </div>
                        </article>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <article class="grid items-center gap-12 lg:grid-cols-[340px_1fr]">
                            <div class="relative mx-auto h-[280px] w-[280px] sm:h-[300px] sm:w-[300px]">
                                <span class="absolute left-3 top-8 h-36 w-36 rounded-full bg-[#0a7806]"></span>
                                <span class="absolute left-10 top-0 h-56 w-56 rounded-full bg-[#0a7806]"></span>

                                <img src="https://i.pravatar.cc/320?img=32" alt="Sarah Ghosh"
                                    class="absolute bottom-0 left-[58px] h-[210px] w-[210px] rounded-full object-cover shadow-[0_20px_40px_rgba(0,0,0,0.18)] ring-8 ring-white/70 sm:left-[64px] sm:h-[220px] sm:w-[220px]" />
                            </div>

                            <div class="text-center lg:text-left">
                                <p
                                    class="mx-auto max-w-[560px] text-lg italic leading-8 text-zinc-500 sm:text-xl lg:mx-0">
                                    "The team understood our brand immediately and delivered a
                                    campaign that increased both engagement and conversions."
                                </p>

                                <h3 class="mt-8 text-3xl font-semibold tracking-[0.04em] text-[#0a7806] sm:text-4xl">
                                    Sarah Ghosh
                                </h3>
                                <p class="mt-2 text-lg text-zinc-400">Land owner</p>
                            </div>
                        </article>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <article class="grid items-center gap-12 lg:grid-cols-[340px_1fr]">
                            <div class="relative mx-auto h-[280px] w-[280px] sm:h-[300px] sm:w-[300px]">
                                <span class="absolute left-3 top-8 h-36 w-36 rounded-full bg-[#0a7806]"></span>
                                <span class="absolute left-10 top-0 h-56 w-56 rounded-full bg-[#0a7806]"></span>

                                <img src="https://i.pravatar.cc/320?img=56" alt="Saiful Islam"
                                    class="absolute bottom-0 left-[58px] h-[210px] w-[210px] rounded-full object-cover shadow-[0_20px_40px_rgba(0,0,0,0.18)] ring-8 ring-white/70 sm:left-[64px] sm:h-[220px] sm:w-[220px]" />
                            </div>

                            <div class="text-center lg:text-left">
                                <p
                                    class="mx-auto max-w-[560px] text-lg italic leading-8 text-zinc-500 sm:text-xl lg:mx-0">
                                    “Their expertise in property development exceeded our expectations.
                                    The team delivered exceptional results that maximized our land's potential.”
                                </p>

                                <h3 class="mt-8 text-3xl font-semibold tracking-[0.04em] text-[#0a7806] sm:text-4xl">
                                    Saiful Islam
                                </h3>
                                <p class="mt-2 text-lg text-zinc-400">Land owner</p>
                            </div>
                        </article>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide">
                        <article class="grid items-center gap-12 lg:grid-cols-[340px_1fr]">
                            <div class="relative mx-auto h-[280px] w-[280px] sm:h-[300px] sm:w-[300px]">
                                <span class="absolute left-3 top-8 h-36 w-36 rounded-full bg-[#0a7806]"></span>
                                <span class="absolute left-10 top-0 h-56 w-56 rounded-full bg-[#0a7806]"></span>

                                <img src="https://i.pravatar.cc/320?img=68" alt="Ismail Hossain"
                                    class="absolute bottom-0 left-[58px] h-[210px] w-[210px] rounded-full object-cover shadow-[0_20px_40px_rgba(0,0,0,0.18)] ring-8 ring-white/70 sm:left-[64px] sm:h-[220px] sm:w-[220px]" />
                            </div>

                            <div class="text-center lg:text-left">
                                <p
                                    class="mx-auto max-w-[560px] text-lg italic leading-8 text-zinc-500 sm:text-xl lg:mx-0">
                                    “Their process was smooth, transparent, and professional. They
                                    handled everything from paperwork to final settlement with great care.”
                                </p>

                                <h3 class="mt-8 text-3xl font-semibold tracking-[0.04em] text-[#0a7806] sm:text-4xl">
                                   Ismail Hossain
                                </h3>
                                <p class="mt-2 text-lg text-zinc-400">Land owner</p>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Nav buttons -->
            <button class="swiper-button-prev nav-btn" aria-label="Previous testimonial"></button>
            <button class="swiper-button-next nav-btn" aria-label="Next testimonial"></button>
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
