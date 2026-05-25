<section class="relative flex items-center justify-center overflow-hidden px-4 py-10 sm:px-4 lg:px-8">
    <style>
        .testimonialSwiper .swiper-pagination {
            bottom: 0 !important;
            left: auto !important;
            right: 0 !important;
            width: auto !important;
            text-align: right;
            padding-right: 4px;
        }
        .testimonialSwiper .swiper-pagination-bullet {
            width: 34px;
            height: 4px;
            border-radius: 999px;
            background: #9ca3af;
            opacity: 1;
        }
        .testimonialSwiper .swiper-pagination-bullet-active {
            background: #0a7806;
        }
    </style>
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
                Reviews
            </h2>
            <p class="mt-3 text-base text-zinc-500 sm:text-lg">
                See what our land owners &amp; clients are saying.
            </p>
        </div>

        @if ($testimonials->count() > 0)
            <!-- Swiper -->
            <div class="swiper testimonialSwiper pb-16 md:pb-14">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <article class="grid items-center gap-12 lg:grid-cols-[340px_1fr]">
                                <div class="relative mx-auto h-[280px] w-[280px] sm:h-[300px] sm:w-[300px]">
                                    <span class="absolute left-3 top-8 h-36 w-36 rounded-full bg-[#0a7806]"></span>
                                    <span class="absolute left-10 top-0 h-56 w-56 rounded-full bg-[#0a7806]"></span>

                                    @if ($testimonial->image_id)
                                        <img src="{{ file_path($testimonial->image_id) }}"
                                            alt="{{ $testimonial->author_name }}"
                                            class="absolute bottom-0 left-[58px] h-[210px] w-[210px] rounded-full object-cover shadow-[0_20px_40px_rgba(0,0,0,0.18)] ring-8 ring-white/70 sm:left-[64px] sm:h-[220px] sm:w-[220px] bg-gray-200" />
                                    @else
                                        <div class="absolute bottom-0 left-[58px] h-[210px] w-[210px] rounded-full bg-gray-100 flex items-center justify-center shadow-[0_20px_40px_rgba(0,0,0,0.18)] ring-8 ring-white/70 sm:left-[64px] sm:h-[220px] sm:w-[220px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <div class="text-center lg:text-left">
                                    <p class="mx-auto max-w-[560px] text-lg italic leading-8 text-zinc-500 sm:text-xl lg:mx-0">
                                        "{{ $testimonial->content }}"
                                    </p>

                                    <h3 class="mt-8 text-3xl font-semibold tracking-[0.04em] text-[#0a7806] sm:text-4xl">
                                        {{ $testimonial->author_name }}
                                    </h3>
                                    @if ($testimonial->designation)
                                        <p class="mt-2 text-lg text-zinc-400">{{ $testimonial->designation }}</p>
                                    @endif

                                    @if ($testimonial->video_id)
                                        <a href="{{ file_path($testimonial->video_id) }}"
                                            x-data
                                            @click.prevent="Fancybox.show([{ src: $el.href, type: 'html5video' }])"
                                            class="mt-6 inline-flex items-center gap-2 rounded-full border border-[#0a7806] px-5 py-2 text-sm font-medium text-[#0a7806] hover:bg-[#0a7806] hover:text-white transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                            Watch Story
                                        </a>
                                    @endif
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Nav buttons -->
            <button class="swiper-button-prev nav-btn" aria-label="Previous testimonial"></button>
            <button class="swiper-button-next nav-btn" aria-label="Next testimonial"></button>
        @else
            <p class="text-center text-zinc-400 py-10">No reviews yet.</p>
        @endif
    </div>
</section>
