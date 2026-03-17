@section('bodyClass', 'project-details-page')
@section('headerClass', 'overlay-header')
<div>
    @if ($property->hero_image_id)
        <section class="details-hero-sec">
            <!-- Swiper -->
            <div class="swiper mySwiper">

                <div class="swiper-wrapper">

                    @if (!empty($property->hero_image_id))
                        @foreach ($property->hero_image_id as $hero_image_item)
                            <div class="swiper-slide">
                                <img src="{{ file_path($hero_image_item) }}">
                            </div>
                        @endforeach
                    @endif

                    {{-- <div class="swiper-slide"><img src="{{ asset('assets/images/2.webp') }}" alt="">

                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/images/3.jpg') }}" alt="">

                </div>
                <div class="swiper-slide"><img src="{{ asset('assets/images/4.jpg') }}" alt="">

                </div> --}}

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
                <div class="overlay">
                    <h1>{{ $property->title }}</h1>
                    <p>{{ $property->location }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                            <path
                                d="M6 8.44c-.02 5.1 5.17 9.18 5.39 9.35.18.14.4.21.61.21s.43-.07.61-.21c.22-.17 5.41-4.25 5.39-9.35C18 4.89 15.31 2 12 2S6 4.89 6 8.44m10 0c.01 3.19-2.74 6.08-4 7.24-1.26-1.15-4.01-4.04-4-7.24C8 5.99 9.79 4 12 4s4 1.99 4 4.44">
                            </path>
                            <path
                                d="M12 6a2 2 0 1 0 0 4 2 2 0 1 0 0-4m6.02 8.73c-.4.64-.84 1.23-1.27 1.76C18.88 16.97 20 17.68 20 18c0 .51-2.75 2-8 2s-8-1.49-8-2c0-.32 1.12-1.03 3.25-1.51-.43-.53-.86-1.12-1.27-1.76C3.66 15.37 2 16.44 2 18c0 2.75 5.18 4 10 4s10-1.25 10-4c0-1.56-1.67-2.63-3.98-3.27">
                            </path>
                        </svg>

                    </p>
                    <div class="btns">

                        <a href="{{ file_path($property->hero_video_id) }}" data-fancybox="hero-video"
                            class="play-btn"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                            </svg>
                        </a>


                        <a href="#project-overview" class="btn">View Project</a>
                    </div>
                </div>

            </div>
            <!-- Swiper JS -->
        </section>
    @endif
    <section class="project-details-section">
        <div class="wrapper">
            <div class="layout">
                <div class="content" id="project-overview">
                    <div class="project-overview">

                        <h2 class="section-title">Project Overview</h2>
                        <div class="feature-overview">
                            @if ($property->type)
                                <div class="item">
                                    <div class="value">
                                        <span class="name capitalize">{{ $property->type }}</span>
                                    </div>
                                    <p class="type-name">Property Type</p>
                                </div>
                            @endif
                            @if ($property->bedroom_count)
                                <div class="item">
                                    <div class="value">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="2 2 20 20">
                                                <path
                                                    d="M4 17h16v3h2v-9c0-1.1-.9-2-2-2V5c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1v4c-1.1 0-2 .9-2 2v9h2zM18 6v3h-5V6zM6 6h5v3H6zm-2 5h16v4H4z">
                                                </path>
                                            </svg>
                                        </span>

                                        <span class="name">{{ $property->bedroom_count }}</span>
                                    </div>
                                    <p class="type-name">Bedrooms</p>
                                </div>
                            @endif
                            @if ($property->bathroom_count)
                                <div class="item">
                                    <div class="value">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                                <path
                                                    d="M5 18h1v3h2v-3h8v3h2v-3h1c1.65 0 3-1.35 3-3v-5c0-.55-.45-1-1-1H4V6c0-1.1.9-2 2-2s2 .9 2 2h2c0-2.21-1.79-4-4-4S2 3.79 2 6v9c0 1.65 1.35 3 3 3m15-3c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1v-4h16z">
                                                </path>
                                            </svg>
                                        </span>

                                        <span class="name">{{ $property->bathroom_count }}</span>
                                    </div>
                                    <p class="type-name">Bathroom</p>
                                </div>
                            @endif
                            @if ($property->bathroom_count)
                                <div class="item">
                                    <div class="value">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1" fill="currentColor"
                                                viewBox="2 2 20 20">
                                                <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                                                <path
                                                    d="M6.5 12a1.5 1.5 0 1 0 0 3 1.5 1.5 0 1 0 0-3m11 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 1 0 0-3">
                                                </path>
                                                <path
                                                    d="m20.77 9.16-1.37-4.1a2.99 2.99 0 0 0-2.85-2.05H7.44a3 3 0 0 0-2.85 2.05l-1.37 4.1c-.72.3-1.23 1.02-1.23 1.84v5c0 .74.41 1.38 1 1.72V20c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-2h12v2c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-2.28a2 2 0 0 0 1-1.72v-5c0-.83-.51-1.54-1.23-1.84ZM7.44 5h9.12a1 1 0 0 1 .95.68L18.62 9H5.39L6.5 5.68A1 1 0 0 1 7.45 5ZM4 16v-5h16v5z">
                                                </path>
                                            </svg>
                                        </span>

                                        <span class="name">{{ $property->parking_count }}</span>
                                    </div>
                                    <p class="type-name">Parking</p>
                                </div>
                            @endif
                            @if ($property->area_measurement)
                                <div class="item">
                                    <div class="value">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1" fill="currentColor"
                                                viewBox="2 2 20 20">
                                                <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                                                <path
                                                    d="m13.75 11.71-1.31 1.59c1.22 1.65 2.06 3.59 2.4 5.71H5.12L17.77 3.64l-1.54-1.27-5.39 6.55a14.9 14.9 0 0 0-8.83-2.91v2c2.82 0 5.43.92 7.56 2.46l-7.33 8.9c-.25.3-.3.71-.13 1.06s.52.57.9.57h19v-2h-5.15c-.37-2.73-1.47-5.23-3.1-7.29Z">
                                                </path>
                                            </svg>
                                        </span>

                                        <span class="name">{{ $property->area_measurement }}</span>
                                    </div>
                                    <p class="type-name">Area Size</p>
                                </div>
                            @endif
                        </div>
                        <hr class="dividor">
                        <div class="overview-description">
                            {!! $property->description !!}
                        </div>
                    </div>
                    @if ($property->amenities)


                        <div class="features">
                            <h2 class="section-title">Features</h2>
                            <hr class="dividor">
                            <div class="feature-grid">
                                @foreach ($property->amenities as $amenity_item)
                                    <div class="item">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </span>
                                        <span class="name">{{ $amenity_item }}
                                        </span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                    @if ($property->additional_info)


                        <div class="additional-details">
                            <h2 class="section-title">Additional Details</h2>
                            <hr class="dividor">
                            <div class="grid-box">
                                @foreach ($property->additional_info as $additional_info_item)
                                    <div class="item">

                                        <span
                                            class="name">{{ isset($additional_info_item['name']) ? $additional_info_item['name'] : '' }}
                                        </span>
                                        <span class="value">
                                            {{ isset($additional_info_item['value']) ? $additional_info_item['value'] : '' }}
                                        </span>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    @endif
                    <div class="tour-gallery">
                        <h2 class="section-title">Gallery</h2>
                        <div class="gallery-container">
                            @if (!empty($property->gallery))
                                @foreach ($property->gallery as $gallery_item)
                                    <div class="gallery-item">
                                        <a data-fancybox="gallery" href="{{ file_path($gallery_item) }}"
                                            data-caption="">
                                            <img src="{{ file_path($gallery_item) }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @if ($property->videos)
                        <div class="video-gallery">
                            <h2 class="section-title">Videos</h2>
                            <hr class="dividor">
                            <div class="video-grid">
                                @foreach ($property->videos as $video_item)
                                    <div href="{{ file_path($video_item['video_id']) }}"
                                        data-fancybox="video-gallery" class="item"
                                        style="background-image: url({{ file_path($video_item['thumbnail_id']) }})">
                                        <div class="inner-box">
                                            <span class="play-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8">
                                                    </path>
                                                    <path d="m9 17 8-5-8-5z"></path>
                                                </svg>
                                            </span>
                                            <div class="footer-area">
                                                <h3>{{ $video_item['title'] }}</h3>
                                                <span><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    {{ gmdate('i:s', $video_item['duration']) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                    @if ($property->address)
                        <div class="address">
                            <h2 class="section-title">Address</h2>
                            <hr class="dividor">
                            <div class="grid-box">
                                @foreach ($property->address as $address_item)
                                    <div class="item">

                                        <span
                                            class="name">{{ isset($address_item['name']) ? $address_item['name'] : '' }}
                                        </span>
                                        <span class="value">
                                            {{ isset($address_item['value']) ? $address_item['value'] : '' }}
                                        </span>
                                    </div>
                                @endforeach

                            </div>

                            @if ($property->embaded_map)
                                <div class="map">
                                    <iframe src="{{ $property->embaded_map }}" width="100%" height="300"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <aside class="sidebar">
                    <div class="scrollable">
                        <div class="sticky">


                            <form action="#" wire:submit.prevent="submit" class="custom-form inquiry">
                                <h3 class="form-title">Get a Free Quote</h3>


                                <div class="form-group">
                                    <input wire:model="name" type="text" placeholder="Name">
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input wire:model="phone" type="text" placeholder="Phone">
                                    @error('phone')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input wire:model="email" type="text" placeholder="Email">
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <textarea wire:model="message" placeholder="Message"></textarea>
                                    @error('message')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" wire:loading.attr="disabled" class="submit-btn">

                                    <span wire:loading.remove wire:target="submit">
                                        Submit
                                    </span>

                                    <span wire:loading wire:target="submit">
                                        Submitting...
                                    </span>

                                </button>
                            </form>
                            <div class="cta-area">
                                <div class="col-multple">
                                    <a href="#" class="btn">

                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                                                <path fill-rule="evenodd"
                                                    d="M18.403 5.633A8.92 8.92 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a9 9 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.93 8.93 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.45 7.45 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.45 7.45 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.4 7.4 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73s-.354-.112-.504.112-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393s.149-.224.224-.374.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a10 10 0 0 0-.429-.008.83.83 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321 1.582 2.415 3.832 3.387c.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066s.187-.973.131-1.067-.207-.151-.43-.263"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                        </div>
                                        <div class="text">


                                            <p>WhatsApp</p>
                                        </div>
                                    </a>
                                    <a href="#" class="btn">

                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <!--Boxicons v3.0.8 https://boxicons.com | License  https://docs.boxicons.com/free-->
                                                <path
                                                    d="M12 3c-4.92 0-8.91 3.729-8.91 8.332 0 2.616 1.291 4.952 3.311 6.479V21l3.041-1.687c.811.228 1.668.35 2.559.35 4.92 0 8.91-3.73 8.91-8.331C20.91 6.729 16.92 3 12 3m.938 11.172-2.305-2.394-4.438 2.454 4.865-5.163 2.305 2.395 4.439-2.455z">
                                                </path>
                                            </svg>

                                        </div>
                                        <div class="text">


                                            <p>Messager</p>
                                        </div>
                                    </a>
                                </div>

                                <a href="#" class="btn">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </div>
                                    <div class="text">


                                        <p>CALL NOW</p>
                                    </div>
                                </a>


                            </div>
                        </div>
                        <!-- <div class="related-projects">
                                <h3 class="title">Related Projects</h3>
                                <hr class="dividor">
                                <div class="grid-box">
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/images/buildings/1.jpg" alt="related-projects-1">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/images/buildings/2.jpg" alt="related-projects-2">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/images/buildings/3.jpg" alt="related-projects-3">
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="assets/images/buildings/4.jpg" alt="related-projects-4">
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </aside>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        function videoGallery() {
            return {
                currentVideo: "assets/videos/Ads - 002_2.mp4",

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
    <!-- Initialize Swiper -->
    <script>
        addEventListener("DOMContentLoaded", () => {






                const heroSwiper = new Swiper(".mySwiper", {
                    spaceBetween: 30,
                    loop: true,
                    // centeredSlides: false, // 👈 এটা off করো
                    effect: 'fade', // Smooth transitions

                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev"
                    },
                });



            //fancy box


            Fancybox.bind('[data-fancybox="video-gallery"]', {
                // Your custom options for a specific gallery
            });
            Fancybox.bind('[data-fancybox="gallery"]', {
                // Your custom options for a specific gallery
            });
            Fancybox.bind('[data-fancybox="hero-video"]', {
                // Your custom options for a specific gallery
            });
        })
    </script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', data => {
                Swal.fire({
                    title: data[0].title,
                    text: data[0].message,
                    icon: data[0].type,
                });
            });
        });
    </script>
@endpush
