@section('bodyClass', 'home-page')
@section('headerClass', 'overlay-header')
@section('meta_title', 'Home')


@push('meta_data')
@endpush
<div>
    <section class="hero-sec">

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slide_item)
                    <div class="swiper-slide"><img src="{{ file_path($slide_item->image_id) }}" alt="">
                        <div class="overlay ">
                            <div class="line"></div>
                            <p>Location - {{ $slide_item->sub_title }}</p>
                            <h2>{{ $slide_item->title }}</h2>
                            <p class="text-sm text-gray-300">{{ $slide_item->description }}
                            </p>
                            <a href="{{ $slide_item->link }}" class="btn">See
                                Details
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
            <!-- Thumbnail Slider -->
            <div class="swiper thumbSwiper mt-4">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slide_item)
                        <div class="swiper-slide"><img src="{{ file_path($slide_item->image_id) }}" alt="">
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Swiper JS -->
    </section>
    <section class="featured-projects section">
        <div class="wrapper">



            <div class="section-header">
                <h2 class="text-center font-bold text-2xl primary-color">SIGNATURE DEVELOPMENTS</h2>
                <p class="text-center text-gray-500">A showcase of our finest properties, combining visionary design,
                    premium craftsmanship, and functional spaces for contemporary living.</p>
            </div>
            <div class="grid-box">
                @foreach ($featured_properties as $featured_item)
                    <div class="item">
                        <img class="" src="{{ file_path($featured_item->property->featured_image_id) }}"
                            alt="">
                        <div class="overlay">
                            <div class="text-box">
                                <h3>{{ $featured_item->property->title }}</h3>
                                <p>{{ $featured_item->property->location }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
                {{-- <div class="item">
                        <img class="" src="{{asset('assets/images/buildings/2.jpg')}}" alt="">
                        <div class="overlay">
                            <div class="text-box">
                                <h3>Apon Shopno</h3>
                                <p>Bashundhara Riverview</p>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <img class="" src="{{asset('assets/images/buildings/3.jpg')}}" alt="">
                        <div class="overlay">
                            <div class="text-box">
                                <h3>Sky View Complex</h3>
                                <p>Bashundhara Riverview</p>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <img src="{{asset('assets/images/buildings/4.jpg')}}" alt="">
                        <div class="overlay">
                            <div class="text-box">
                                <h3>Apon Shopno</h3>
                                <p>Bashundhara Riverview</p>
                            </div>

                        </div>
                    </div> --}}
            </div>
        </div>
    </section>

    @if ($videos->count() > 0)


        <section class="video-sec section">

            <div class="wrapper">
                <div class="section-header">
                    <h2>DISCOVER YOUR DREAM PROPERTY</h2>
                    <p>Take a closer look at our exceptional developments through video highlights and virtual
                        walkthroughs.</p>
                </div>
                <div class="grid-box" id="video-sec-area" x-data="videoGallery()">

                    <div class="inner-grid-box">
                        @foreach ($videos as $video_item)
                            <div class="item" style="background-image: url({{ file_path($video_item->thumbnail) }})"
                                @click="changeVideo('{{ file_path($video_item->video_id) }}')">
                                <div wire:key="video-{{ $video_item->id }}" class="inner-box">
                                    <span class="play-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8">
                                            </path>
                                            <path d="m9 17 8-5-8-5z"></path>
                                        </svg>
                                    </span>
                                    <div class="footer-area">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ gmdate('i:s', $video_item->duration) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="player-box">
                        <video x-ref="player" class="player h-full w-full" controls autoplay muted loop>
                            <source :src="currentVideo" type="videos/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <!-- <div class="explore-btn-group">
                    <a href="#" class="btn">Explore
                        More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>

                    </a>
                </div> -->


            </div>

        </section>
    @endif

    <section style="background-image: url('{{ asset('assets/images/2.webp') }}')" class="featured-sec section">
        <div class="wrapper z-10 relative">
            <div class="section-header">
                <h2 class="text-center font-bold text-2xl text-white mb-4">WHY CHOOSE US
                </h2>
                <p class="text-center text-gray-200 ">Transforming everyday spaces into exceptional living environments.
                    With innovative design, trusted expertise, and uncompromising quality, we create properties that
                    inspire modern lifestyles and lasting value.</p>
            </div>
            <div class="grid-box">

                <div class="item">
                    <div>


                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24 " stroke-width="1"
                                stroke="currentColor" class="size-25">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>

                        </span>

                        <h3 class="text-xl ">Experience</h3>
                    </div>
                    <p>Years of industry expertise allow us to deliver thoughtfully designed properties that combine
                        comfort, functionality, and long-term value for homeowners and investors.</p>

                </div>
                <div class="item">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>


                    </span>
                    <h3>Credit Rating</h3>
                    <p>Our strong financial credibility and trusted partnerships ensure secure investments and reliable
                        project delivery for every client.</p>
                </div>
                <div class="item">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>


                    </span>
                    <h3>Trust</h3>
                    <p>Built on transparency and integrity, we prioritize lasting relationships with our clients through
                        dependable service and honest communication.</p>
                </div>
                <div class="item">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>


                    </span>
                    <h3>Quality</h3>
                    <p>We focus on premium materials, modern construction standards, and meticulous attention to detail
                        to ensure every property meets the highest level of quality.</p>
                </div>


            </div>
        </div>
    </section>
    @if ($partners)


        <section class="trust_partners-sec section">
            <div class="wrapper">

                <div class="grid-box">
                    @foreach ($partners as $partner_item)
                        <div class="item">
                            <img class="h-full object-cover" src="{{ file_path($partner_item->image_id) }}"
                                alt="">
                            <a href="{{ $partner_item->link }}" target="_blank" class="overlay">
                                <i class="bx bx-link bx-flashing text-4xl text-white"></i>
                                <span class="text-gray-50 secondary-font">Click For Details</span>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <section class="projects section">
        <div class="wrapper">
            <div class="section-header">
                <h2 class="">Recent Properties</h2>
                <p class="text-gray-600">We take pride in our work and ensure that every property is developed to the
                    highest standards of quality, safety and environmental responsibility.</p>
            </div>
            <div class="grid-box">
                @foreach ($properties as $property)
                    <a href="{{ route('properties.details', $property->slug) }}" class="item">
                        <div class="img-box">

                            <img class="" src="{{ file_path($property->featured_image_id) }}" alt="">
                        </div>
                        <div class="text-box">
                            <h3 class="text-2xl title-font">{{ $property->title }}</h3>
                            <p class="text-gray-600 text-sm secondary-font">{{ $property->location }}</p>
                        </div>
                    </a>
                @endforeach


            </div>
            <div class="explore-btn-group">
                <a href="{{ route('properties') }}" class="btn">Explore
                    More
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                    </svg>

                </a>
            </div>
        </div>
    </section>

    <section class="land_owner_reviews_sec section">
        <div class="wrapper">
            <!-- <div class="section-header">
                    <h2 class="">Land Owner <span>&</span> Client Reviews</h2>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Nostrum
                        harum at laboriosam porro iure nam ab eaque nihil facere assumenda!</p>
                </div> -->
            <div class="grid-box">
                <div class="landowner" style="background-image: url('{{ asset('assets/images/1.webp') }}');">
                    <h3>Land Owners</h3>
                    <p>Develop your land with a trusted partner and unlock its true potential.</p>
                    <a href="{{ route('landowners') }}" class="btn">Details</a>

                </div>
                <div class="client" style="background-image: url('{{ asset('assets/images/2.webp') }}');">

                    <h3> clients</h3>
                    <p>Explore client reviews and experiences with our properties and services.</p>
                    <a href="{{ route('clients') }}" class="btn">Details</a>
                </div>

            </div>
        </div>

    </section>
    <section x-data="{ open: false }" class="board_of_members_sec section">
        <div class="wrapper">
            <div class="section-header">
                <h2 class="">Board of Members</h2>
                <p class="text-gray-600">Meet the visionary leaders and industry experts who guide our company towards
                    excellence and innovation in real estate development.</p>
            </div>
            <div class="grid-box">

                <div class="member-card">
                    <img class="" src="{{ asset('assets/images/members/1.jpg') }}" alt="">
                    <div class="text">

                        <h3>Sarrowar Mohammad (sunny)</h3>
                        <p>Chairman of the Board</p>
                        <button type="button" @click="open = true" class="seemore cursor-pointer">See more... <i
                                class="bx bx-chevrons-right bx-fade-right"></i></button>
                    </div>
                </div>
                <div class="member-card">
                    <img class="" src="{{ asset('assets/images/members/2.jpg') }}" alt="">
                    <div class="text">
                        <h3>Sarrowar Mohammad (sunny)</h3>
                        <p>Chairman of the Board</p>
                        <button type="button" @click="open = true" class="seemore cursor-pointer">See more... <i
                                class="bx bx-chevrons-right bx-fade-right"></i></button>
                    </div>
                </div>
                <div class="member-card">
                    <img class="" src="{{ asset('assets/images/members/3.jpg') }}" alt="">
                    <div class="text">

                        <h3>Sarrowar Mohammad (sunny)</h3>
                        <p>Chairman of the Board</p>
                        <button type="button" @click="open = true" class="seemore cursor-pointer">See more... <i
                                class="bx bx-chevrons-right bx-fade-right"></i></button>
                    </div>
                </div>
                <div class="member-card">
                    <img class="" src="{{ asset('assets/images/members/4.jpg') }}" alt="">
                    <div class="text">

                        <h3>Sarrowar Mohammad (sunny)</h3>
                        <p>Chairman of the Board</p>
                        <button type="button" @click="open = true" class="seemore cursor-pointer">See more... <i
                                class="bx bx-chevrons-right bx-fade-right"></i></button>
                    </div>
                </div>

            </div>
        </div>


        <div x-cloak x-show="open" x-transition.opacity @click.self="open = false"
            @keydown.escape.window="open = false"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
            <div x-transition class="w-full max-w-4xl rounded-2xl bg-white p-6 shadow-xl">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold">Modal Title</h2>
                    <button @click="open = false">✕</button>
                </div>
                <div class="mt-4">
                    <div class="flex gap-6">
                        <div class="member-card">
                            <img  src="{{ asset('assets/images/members/2.jpg') }}" class=" object-cover rounded-sm" alt="">
                            <div class="text">
                                <h3>Sarrowar Mohammad (sunny)</h3>
                                <p>Chairman of the Board</p>
                            </div>

                        </div>
                        <div>
                            <h4 class="text-md font-medium">Sarrowar Mohammad (sunny) sir's words</h4>
                            <p class="text-sm text-gray-500">
                                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, eaque! Doloribus
                                voluptate consequatur deleniti, cumque quisquam magnam voluptate consequatur
                                deleniti,
                                cumque quisquam magnam"
                            </p>
                        </div>
                    </div>



                </div>
            </div>
        </div>


    </section>

</div>
@push('scripts')
    <script>
        function videoGallery() {
            return {
                currentVideo: "{{ file_path($videos?->first()?->video_id ?? '') }}",

                init() {
                    this.setVideo(this.currentVideo);
                },

                changeVideo(video) {
                    this.setVideo(video);
                },

                setVideo(video) {
                    this.currentVideo = video;

                    this.$nextTick(() => {
                        this.$refs.player.src = this.currentVideo;
                        this.$refs.player.load();
                        this.$refs.player.play();
                    });
                }
            }
        }
    </script>
@endpush
